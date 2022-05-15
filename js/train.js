$(document).ready(function(){
	//Ricavo nome della scheda e gruppo muscolare
	const urlParams = new URLSearchParams(window.location.search);
  	const nomeScheda = urlParams.get('nomeScheda');
	const gruppoM = urlParams.get("gruppoM");
	var numSerie = -1;			//Per evitare problemi di asincronia iniziali
	var nome;
	var descrizione;			//Parte tutto da -1 perchè avviato il timer all'inizio partendo con 0s
	var done = -1;				//serie portate a termine
	var count = -1; 			//Esercizi portati a termini
	var recupero;

	//Info sull'esercizio
	var $excName = $("#exc-name");
	var $excDesc = $("#exc-desc");
	
	//Bottone per avviare il recupero
	var $recoveryBtn = $("#btn-recovery");

	//Barra di progresso
	var $bar = $(".progressBar");

	var esercizi;
  	//Come prima cosa recupero gli esercizi
  	$.ajax({
    	url: "getExcTrain.php",
    	type: "POST",
		data: { "nome": nomeScheda, "gruppoM":gruppoM},
		success: function(result) {
			if (result != "err") {
				esercizi = JSON.parse(result);
				//Preparo la barra per il primo esercizio
				numSerie = esercizi[0].numserie;
				descrizione = esercizi[0].descrizione;
				nome = esercizi[0].nome;
				setPage(nome,descrizione,numSerie,0);
			}
			else{
				//Non ci sono esercizi!!! Da gestire questa situazione
			}
		}
	});

  //Creazione del timer
    var $countdown = $("#countdown").countdown360({
        radius      : 60.5,
        seconds     : 0,
        strokeWidth : 15,
        fillStyle   : '#222222',
        strokeStyle : '#eedf69',
        fontSize    : 50,
        fontColor   : '#eedf69',
        autostart   : true,
        onComplete  : function () { timeOver(); }
    });

    //Gestione dell'avvio del recupero
    $recoveryBtn.on("click",function(){
        //Devo controllare che il timer non sia già stato attivato
        if($countdown.getTimeRemaining() <= 0){
			//$countdown.settings.seconds = 0;
            $countdown.stop();
			$countdown.settings.seconds = recupero;
			$countdown.start();
        }
        
    });

    //Funzione da chiamare quando il timer termina
  	function timeOver(){
		if ($bar.children(".is-current").length > 0) {    	//questo if non si verifica mai
			$bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
		} 
		else {
			$bar.children().first().addClass("is-current");
    	}
		done++;									//Inizio recupero = serie terminata
		if(done == numSerie){					//Finito l'esercizio
			count++;							//Aumento il numero di esercizi portati a termine
			if(count == esercizi.length-1){
				alert("Allenamento terminato");	
			}
			
			else{						//Bisogna passare al prossimo esercizio
				numSerie = esercizi[count+1].numserie;
				descrizione = esercizi[count+1].descrizione;
				nome = esercizi[count+1].nome;
				done = 0;				//Resetto il numero di serie eseguite
				setPage(nome,descrizione,numSerie,count+1);
			}
		}
  	}

	//Funzione da chiamare ogni volta che termina un esercizio
	function setPage(nome,descrizione,numSerie,index){
		//Setto le informazioni dell'esercizio
		$excName.text(nome).hide().fadeIn(400);
		$excDesc.text(descrizione).hide().fadeIn(400);
		let reps = esercizi[index].reps.split(";");	//Recupero le ripetizioni dell'esercizio per ogni serie
		recupero = esercizi[index].recupero;
		$bar.find(".ProgressBar-step").remove();		//Ripulisco la progress bar

		for(let i = 0;i<numSerie;i++){
			let currentReps = reps[i].split(":")[1];	//#Ripetizioni per la i-esima serie
			var $newItem = $('<li class="ProgressBar-step"> \
							<svg class="ProgressBar-icon"><use xlink:href="#checkmark-bold"/></svg> \
							<span class="ProgressBar-stepLabel">'+currentReps+'</span>\
							</li>');
			if(i == 0)$newItem.addClass("is-current");
			$bar.append($newItem).hide().fadeIn(400);	//Parto con il focus sulla prima serie
		}
	}

});
