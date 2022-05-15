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
			else{					//In questa scheda non ci sono esercizi per questo gruppo muscolare
				window.location.replace("index.php?err=noExc");
			}
		}
	});

  //Creazione del timer
  //Con queste impostazioni il timer viene avviato in automatico con un countdown di 0s
  //Questo mi permette di rendere visibile il timer fin da subito
    var $countdown = $("#countdown").countdown360({
        radius      : 60.5,
        seconds     : 0,
        strokeWidth : 15,
        fillStyle   : '#222222',
        strokeStyle : '#eedf69',
        fontSize    : 50,
        fontColor   : '#eedf69',
        autostart   : true,
        onComplete  : function () { timeOver(); }	//La funzione da chiamare allo scadere del timer
    });

    //Gestione dell'avvio del recupero
    $recoveryBtn.on("click",function(){
        //Devo controllare che il timer non sia già attivo
        if($countdown.getTimeRemaining() <= 0){
            $countdown.stop();
			$countdown.settings.seconds = recupero;		//Ogni volta stoppo e resetto il timer
			$countdown.start();							
        }
        
    });

    //Funzione da chiamare quando il timer termina
  	function timeOver(){
		if ($bar.children(".is-current").length > 0) {    //Ogni volta che termina il timer passo alla serie successiva
			$bar.children(".is-current").removeClass("is-current").addClass("is-complete").next().addClass("is-current");
		} 
		else {
			$bar.children().first().addClass("is-current");		//Questo else non si verifica mai
    	}
		done++;									//Inizio recupero = serie terminata
		if(done == numSerie){					//Finito l'esercizio
			count++;							//Aumento il numero di esercizi portati a termine
			if(count == esercizi.length-1){
				alert("Allenamento terminato");	
			}
			
			else{												//Bisogna passare al prossimo esercizio
				numSerie = esercizi[count+1].numserie;			//Aggiorno le info relative all'esercizio corrente
				descrizione = esercizi[count+1].descrizione;
				nome = esercizi[count+1].nome;
				done = 0;										//Resetto il numero di serie eseguite
				setPage(nome,descrizione,numSerie,count+1);		//Preparo nuovamente la pagina per il nuovo esercizio
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
		
		//Creo nuovamente la progressbar
		for(let i = 0;i<numSerie;i++){
			let currentReps = reps[i].split(":")[1];	//#Ripetizioni per la i-esima serie
			var $newItem = $('<li class="ProgressBar-step"> \
							<svg class="ProgressBar-icon"><use xlink:href="#checkmark-bold"/></svg> \
							<span class="ProgressBar-stepLabel">'+currentReps+'</span>\
							</li>');
			if(i == 0)$newItem.addClass("is-current");	//Parto con il focus sulla prima serie
			$bar.append($newItem).hide().fadeIn(400);	
		}
	}

});
