$(document).ready(function(){
    var $container = $(".container");
    var $checkbox = $("#chk");
    
    $checkbox.on("change",function(){
        $(this).is(":checked")?$container.animate({height:"700px"}):$container.animate({height:"600px"});
    });
});
