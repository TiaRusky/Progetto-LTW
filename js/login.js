$(document).ready(function(){
    var $container = $(".container");
    var $checkbox = $("#chk");
    
    $checkbox.on("change",function(){
        $(this).is(":checked")?$container.css("height","700px"):$container.css("height","550px");
    });
});
