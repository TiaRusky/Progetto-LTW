$(document).ready(function() {
    //Bottone per avviare il recupero
    var $recoveryBtn = $("#btn-recovery");

    //Barra di progresso
    var $bar = $(".progressBar");

    //Creazione del timer
    var $countdown = $("#countdown").countdown360({
        radius: 60.5,
        seconds: 0,
        strokeWidth: 15,
        fillStyle: '#222222',
        strokeStyle: '#eedf69',
        fontSize: 50,
        fontColor: '#eedf69',
        autostart: true,
        onComplete: function() { timeOver(); }
    });

    //Gestione dell'avvio del recupero
    $recoveryBtn.on("click", function() {
        //Devo controllare che il timer non sia già stato attivato
        if ($countdown.getTimeRemaining() <= 0) {
            $countdown.addSeconds(5);
        }

    });

    //Funzione da chiamare quando il timer termina
    function timeOver() {
        if ($bar.children(".is-current").length > 0) {

            $bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
        } else {
            alert($bar.children().find("ProgressBar-stepLabel").text());
            $bar.children().first().addClass("is-current");
        }
    }

    $("#advance").on("click", function() {
        var $bar = $(".ProgressBar");
        if ($bar.children(".is-current").length > 0) {
            $bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
        } else {
            $bar.children().first().addClass("is-current");
        }
    });

});

/*$("#advance").on("click", function() {
  var $bar = $(".ProgressBar");
  if ($bar.children(".is-current").length > 0) {
    $bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
  } else {
    $bar.children().first().addClass("is-current");
  }
});

$("#previous").on("click", function() {
  var $bar = $(".ProgressBar");
  if ($bar.children(".is-current").length > 0) {
    $bar.children(".is-current").removeClass("is-current").prev().removeClass("is-complete").addClass("is-current");
  } else {
    $bar.children(".is-complete").last().removeClass("is-complete").addClass("is-current");
  }
});*/