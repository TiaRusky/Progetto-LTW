$(document).ready(function(){
    /*
    $("#countdown").countdown360({
        radius      : 60.5,
        seconds     : 120,
        strokeWidth : 15,
        fillStyle   : '#222222',
        strokeStyle : '#eedf69',
        fontSize    : 50,
        fontColor   : '#eedf69',
        autostart: false,
        onComplete  : function () { console.log('completed') }
      }).start();
    */
   var $countdonw = $("#countdown").countdown360({
        radius      : 60.5,
        seconds     : 0,
        strokeWidth : 15,
        fillStyle   : '#222222',
        strokeStyle : '#eedf69',
        fontSize    : 50,
        fontColor   : '#eedf69',
        autostart   : true,
        onComplete  : function () { console.log('completed') }
    });

    
});