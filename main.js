$(document).ready(function() {
    
    $('.registr').click(function() {
        $('#log').animate({top:'-375px'},1000);
        $('#reg').animate({top:'0px'},1000);

        return false;
    
    });

    $('#log').submit(function() {
        var login = $('#Inputlogin').val();
        var password = $('#Inputpassword').val();
        var role = '2';


        var data = {
            login: login,
            pass: password,
            role: role,

        }

        data = JSON.stringify(data);
        console.log(data);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'auth.php', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) {
                return;
            }
            
            var response = JSON.parse(xhr.responseText);
            console.log(response); 

            if (xhr.status == 200) {
                $('.receiver').animate(
                    { top:'-85px',
                }
                ,1000);

                if (response != '' && response != '401') {

                    $('div.receiver').toggleClass("greenreceiver");
                    $('.receiver').html('<p>Уважаемый(-ая) '+ response + ' , Вы авторизованы и перенаправляетесь на Вашу страницу!</p>');
                   
                    setTimeout(function() {
                        $('.receiver').animate({top:'-250px'},1000);
                            setTimeout(function() {
                                $('div.receiver').removeClass("greenreceiver");
                            }, 1000); 
                    }, 3000);

                    setTimeout(function() {
                        document.location.href = "admin.php";
                    }, 4000);
                   

                } else if (response == '401') {

                    $('div.receiver').toggleClass("redreceiver");
                    $('.receiver').html('Неверный логин или пароль!');

                    setTimeout(function() {
                        $('.receiver').animate({top:'-250px'},1000);
                            setTimeout(function() {
                                $('div.receiver').removeClass("redreceiver");
                            }, 1000);
                    }, 3000);

                } else {
                    $('div.receiver').toggleClass("redreceiver");
                    $('.receiver').html('Заполните все поля!');

                    setTimeout(function() {
                        $('.receiver').animate({top:'-250px'},1000);
                            setTimeout(function() {
                                $('div.receiver').removeClass("redreceiver");
                            }, 1000);
                    }, 3000);
                }
            }
        }

        return false;
    });

    $('#reg').submit(function() {

        var login = $('#login').val();
        var pass_1 = $('#pass_1').val();
        var pass_2 = $('#pass_2').val();
        var role = '2';
        var mail = $('#mail').val();
        var phone = $('#phone').val();

        var data = {
            login: login,
            pass_1: pass_1,
            pass_2: pass_2,
            role: role,
            mail: mail,
            phone: phone,
        }

        data = JSON.stringify(data);
        console.log(data);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'registr.php', true);
        xhr.setRequestHeader('Content-type', 'application/json');
        xhr.send(data);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) {
                return;
            }
            
            var response = JSON.parse(xhr.responseText);
            console.log(xhr.responseText); 

            if (xhr.status == 200) {
                $('.receiver').animate(
                    { top:'-85px',
                }
                ,1000);

                if (response['login','pass_1','pass_2','role','mail','phone']) {

                    $('div.receiver').toggleClass("greenreceiver");
                    $('.receiver').html('<p>Пользователь ' + response['login'] + ' успешно зарегистрирован!</p>');
                    $('#log').animate({top:'0px'},1000);
                    $('#reg').animate({top:'-555px'},1000);
                   
                    setTimeout(function() {
                        $('.receiver').animate({top:'-250px'},1000);
                            setTimeout(function() {
                                $('div.receiver').removeClass("greenreceiver");
                            }, 1000);
                    }, 3000);

                } else {

                    $('.receiver').html('<p>' + response + '</p>');

                    setTimeout(function() {
                        $('.receiver').animate({top:'-250px'},1000);
                    }, 3000);

                }
            }
        }

        return false;
    });
});