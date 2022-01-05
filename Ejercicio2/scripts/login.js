$('.message1 a').click(function(){
    $("#title").text("Login");
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });

 $('.message2 a').click(function(){
    $("#title").text("Crear Usuario");
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });