$(document).ready(function(){
    var $container = $(".container");
    var $checkbox = $("#chk");
    var $closebtn = $(".closebtn");
    var $error = $(".error");

    $error.hide().fadeIn(500);

    $checkbox.on("change",function(){
        $(this).is(":checked")?$container.css("height","700px"):$container.css("height","550px");
    });

    $closebtn.on("click",function(){
        $(this).parent().fadeOut(500,function(){
            $error.remove();
        });
    });
});
