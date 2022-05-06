$(document).ready(function (){

    //Buttone per salvare la scheda
    var $addFormButton = $("#submit-conferma");

    //Le varie form da cui posso inserire esercizi
    var $formDorsali = $("#form-dorsali");
    var $formTricipiti = $("#form-tricipiti");
    var $formPetto = $("#form-petto");
    var $formBicipiti = $("#form-bicipiti");
    var $formGambe = $("#form-gambe");
    var $formSpalle = $("#form-spalle");

    //Le varie flexbox di esercizi
    var $flexDorsali = $(".flex-dorsali");
    var $flexTricipiti = $(".flex-tricipiti");
    var $flexPetto = $(".flex-petto");
    var $flexBicipiti = $(".flex-bicipiti");
    var $flexGambe = $(".flex-gambe");
    var $flexSpalle = $(".flex-spalle");


    //Gestione del popover
    $('[data-bs-toggle="popover"]').popover();

    /*Aggiunta degli esercizi*/
    function newExcHandler($form,$flex,e){
        e.preventDefault();
        var gruppoMuscolare = $form.attr("id").slice(5);
        var nomeEsercizio = $form.find(".form-select").val();
        var numSerie = $form.find(".numSerie").val();
        var ripetizioni="";
        var $reps = $form.find(".numero-ripetizioni-element input"); // Sono numSerie in totale

        $reps.each(function(index){
            ripetizioni+=(index+1).toString()+"°:"+$(this).val()+";";
        });
        
        var recupero = $form.find(".recupero").val();
        var numEsecuzione = $form.find(".num-ordine").val();
        var descrizione = $form.find(".desc-element input").val();
        
        var $card = $('<div class="card exc"> \
                <div class="card-body"> \
                <h5 class="card-title">'+nomeEsercizio+'</h5>\
                <ul class="list-group list-group-flush">\
                <li class="list-group-item">\
                <label> Num. Serie: </label>\
                <label class="num-serie">'+numSerie+'\
                <button type="button" class="info-button num-reps-button" data-bs-container="body" data-bs-toggle="popover" \
                data-bs-placement="top" data-bs-content="'+ripetizioni+'" data-bs-trigger="click">\
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16"> \
                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>\
                </svg></button></label></li><li class="list-group-item"><label>Num. esecuzione: </label> \
                <label class="num-esecuzione">'+numEsecuzione+'</label></li><li class="list-group-item"> \
                <label>Recupero (s):</label><label class="recupero">'+recupero+'</label>\
                </li><li class="list-group-item"><label>Descrizione:</label><label class="descrizione">'+descrizione+'</label>\
                </li></ul></div></div>');
        
        $card.find("[data-bs-toggle]").popover();   //Rendo il popover interagibile
        $flex.append($card);                        //Aggiunga la card nella flex apposita
        $form.closest(".modal").modal('toggle');    //Chiudo la modal
    }

    $formDorsali.on("submit",function(e){
        newExcHandler($formDorsali,$flexDorsali,e);
    });

    $formTricipiti.on("submit",function(e){
        newExcHandler($formTricipiti,$flexTricipiti,e);
    });

    $formPetto.on("submit",function(e){
        newExcHandler($formPetto,$flexPetto,e);
    });

    $formBicipiti.on("submit",function(e){
        newExcHandler($formBicipiti,$flexBicipiti,e);
    });

    $formGambe.on("submit",function(e){
        newExcHandler($formGambe,$flexGambe,e);
    });

    $formSpalle.on("submit",function(e){
        newExcHandler($formSpalle,$flexSpalle,e);
    });

    /***************************/
    /*Salvataggio della scheda*/
    /***************************/
    $addFormButton.on("click",function(e){
        e.preventDefault();         //Annullo l'invo della form
        var $esercizi = $(".exc");  //Raccolgo gli esercizi

        if($esercizi.length == 0){      //Se non ci sono esercizi non creo la scheda
            $("#modalCreaScheda").modal('toggle');
            alert("La scheda non è stata creata poiché non sono stati inseriti esercizi");
        }

        else{
            //Costruire un array di oggetti da passare alla funzione php
            //Ogni oggetto sarà l'esercizio con le varie informazioni;


            //Dati scheda
            var $formScheda = $("#modalCreaScheda");
            var nomeScheda = $formScheda.find("#form-name").val();
            var descrizioneScheda = $formScheda.find("#form-description").val();
            
            //Gestione esercizi
            var input = new Array();
            var gruppoMuscolare;
            var nomeEsercizio;
            var numSerie;
            var ripetizioni;
            var recupero;
            var numEsecuzione;
            var descrizione;
            $esercizi.each(function(){
                var $this = $(this);    //Seleziono l'esercizio corrente
                gruppoMuscolare = $this.closest(".flex-gruppo").attr("id");
                nomeEsercizio = $this.find(".card-title").text();
                numSerie = $this.find(".num-serie").text();
                ripetizioni = $this.find(".num-reps-button").attr("data-bs-content");
                numEsecuzione = $this.find(".num-esecuzione").text();
                recupero = $this.find(".recupero").text();

                var esercizio = {           //Costruisco un JSON da aggiungere all'array 
                    gruppoM: gruppoMuscolare,
                    nomeEser: nomeEsercizio,
                    numS : numSerie,
                    rip : ripetizioni,
                    numEse : numEsecuzione,
                    rec : recupero
                };
                
                input.push(esercizio);
            });
            //Passo i dati a php che si occuperà di parlare con il db

        }
    });

    /***********/
    /*Gestione numero ripetizioni di ogni serie*/
    /***********/
    var $elementoNumeroSerie = $('.numSerie');
    $elementoNumeroSerie.on("change",function(e){
        
        var numSerie = $(e.target).val(); //Prendo il numero di serie
        
        var $descElement = $(e.target).parent().next();    //Prelevo il div in cui inserire il numero di ripetizioni per ogni serie
        $descElement.html("");      //Lo pulisco
        for(let i=1;i<=numSerie;i++){
            var $newElement = $("<label for='numRipetizioni'"+i.toString()+">Num. ripetizioni serie "+i+"</label> <input type='number' name='numRipetizioni'"+i.toString()+" value='1' max='20' min='1' required>");
            $descElement.append($newElement);                                                                           
        }
        
    });

    /*Resetto le form quando le chiudo*/
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $(this).find('form .numero-ripetizioni-element').html("<label for='numRipetizioni'>Numero ripetizioni serie</label><input type='number' name='numRipetizioni' value='1' max='20' min='1' required>")
    });
});
