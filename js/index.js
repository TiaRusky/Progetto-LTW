$(document).ready(function() {
    //Menu hambuger
    $navbar = $(".navbar-toggler");

    //Modal per scegliere gruppo muscolare da allenare
    $modalTrain = $("#modalTrain");

    //Bottoni train
    $trainBtn = $(".train-btn");
    $groupBtn = $(".group-btn");

    //Le varie zone della modal
    var $flexDorsali = $(".flex-dorsali");
    var $flexTricipiti = $(".flex-tricipiti");
    var $flexPetto = $(".flex-petto");
    var $flexBicipiti = $(".flex-bicipiti");
    var $flexGambe = $(".flex-gambe");
    var $flexSpalle = $(".flex-spalle")

    //Bottone di ricerca
    var $searchBtn = $("#search-btn");
    var $searchIn = $("#search-in");

    //Tutti i link per eliminare schede
    $deleteItem = $(".delete-item");
    $modalDelete = $("#modalDelete");   //La modal che chiede conferma dell'eliminazione
    $deleteBtn = $("#delete-btn");      //Bottone di conferma della modal di eliminazione

    //Tutti i link per visualizzare una scheda
    $viewItem = $(".view-item");

    //Bottone di chiusura messaggio di errore
    var $closebtn = $(".closebtn");

    //Div per l'animazione di caricamento
    var $loadingDiv = $(".lds-dual-ring");

    /*******************************/
    //Gestione eliminazione scheda
    /*******************************/
    //Questa funzione modifica il titolo della modal chiamata per confermare l'eliminazione
    $deleteItem.on("click", function(e) {
        var nomeScheda = $(e.target).closest(".card-header").find(".card-title").text();    //Prelevo il nome della scheda
        $modalDelete.find(".modal-title").text(nomeScheda);
    });

    //Eliminazione effettiva della scheda
    $deleteBtn.on("click",function(e){
        var nomeScheda = $(e.target).closest(".modal").find(".modal-title").text();
        $.ajax({
            url: "deleteForm.php",
            type: "POST",
            data: { "nome": nomeScheda },
            success: function(result) {         //Scheda eliminata dal db
                if (result) {
                    $(".card-header:contains("+nomeScheda+")").closest(".card").remove();  //Elimino dal dom la scheda
                    $modalDelete.modal('hide');        //Nascondo la modal di confermaEliminazione
                }
            }
        });
    });

    /************************************************/
    //Chiamata al db per la visualizzazione di una scheda
    /************************************************/
    $viewItem.on("click", function(e) {
        //Pulisco la modal
        $(".flex-gruppo .card").remove();
        //Rendo visibili i div con il caricamento
        $loadingDiv.show();
        //Ricavo il nome della scheda
        var nomeScheda = $(e.target).closest(".card-header").find(".card-title").text();
        $("#modalSchedaLabel").text(nomeScheda);
        $.ajax({
            url: "getExc.php",
            type: "POST",
            data: { "nome": nomeScheda },
            success: function(result) {
                if (result != "err") {
                    var esercizi = JSON.parse(result);
                    var length = esercizi.length;

                    //console.log(esercizi);

                    var nome;
                    var gruppoM;
                    var numSerie;
                    var numOrdine;
                    var descrizione;
                    var ripetizioni;
                    var recupero;

                    for (let i = 0; i < length; i++) {
                        //Prelevo i dati dell'esercizio
                        nome = esercizi[i].nome;
                        gruppoM = esercizi[i].gruppom;
                        numSerie = esercizi[i].numserie;
                        numOrdine = esercizi[i].numordine;
                        descrizione = esercizi[i].descrizione;
                        ripetizioni = esercizi[i].reps;
                        recupero = esercizi[i].recupero;

                        //console.log(nome, gruppoM, numSerie, numOrdine, descrizione, ripetizioni, recupero);

                        var $card = $('<div class="card exc"> \
                            <div class="card-body"> \
                            <h5 class="card-title">' + nome + '</h5>\
                            <ul class="list-group list-group-flush">\
                            <li class="list-group-item">\
                            <label> Num. Serie: </label>\
                            <label class="num-serie">' + numSerie + '\
                            <button type="button" class="info-button num-reps-button" data-bs-container="body" data-bs-toggle="popover" \
                            data-bs-placement="top" data-bs-content="' + ripetizioni + '" data-bs-trigger="focus">\
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16"> \
                            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>\
                            </svg></button></label></li><li class="list-group-item"><label>Num. esecuzione: </label> \
                            <label class="num-esecuzione">' + numOrdine + '</label></li><li class="list-group-item"> \
                            <label>Recupero(s): </label><label class="recupero">' + recupero + '</label>\
                            </li><li class="list-group-item"><label>Descrizione:</label><label class="descrizione">' + descrizione + '</label>\
                            </li></ul></div></div>');

                        $card.find("[data-bs-toggle]").popover(); //Rendo il popover interagibile

                        switch (gruppoM) {
                            case "dorsali":
                                $flexDorsali.prepend($card);
                                break;
                            case "tricipiti":
                                $flexTricipiti.prepend($card);
                                break;
                            case "petto":
                                $flexPetto.prepend($card);
                                break;
                            case "bicipiti":
                                $flexBicipiti.prepend($card);
                                break;
                            case "gambe":
                                $flexGambe.prepend($card);
                                break;
                            case "spalle":
                                $flexSpalle.prepend($card);
                                break;
                        }
                    }
                    $loadingDiv.hide();     //Una volta scaricati gli esercizi nascondo il caricamento
                }
            }
        });

    });

    /***************************/
    /*Gestione della searchBar*/
    /***************************/
    $navbar.on("click",function(){
        $searchIn.removeClass("error-box"); 
    });

    $searchIn.on("focus",function(){
        $searchIn.removeClass("error-box");         //Ogni volta che cerco qualcosa rimuovo la classe error
    });                                             //a cui ?? assocaita l'animazione

    $searchBtn.on("click", function(e) {
        e.preventDefault();
        var input = $searchIn.val().toLowerCase();
        var $item = $("#" + input);
        if ($item.length == 0) {                    //Non esiste una scheda con quel nome
            $searchIn.addClass("error-box");
        } else {                                    //Esiste la scheda
            $("body, html").animate({
                scrollTop: $item.offset().top,
            }, 800);
            
        }

        $searchIn.val("");
    });

    //Gestione dei pulsanti train
    $trainBtn.on("click",function(e){
        var nomeScheda = $(e.target).closest(".card").find(".card-title").text();
        $modalTrain.find(".modal-title").text(nomeScheda);
    });

    //Reinderizzamento verso la pagina di allenamento dopo aver scelto il gruppo
    $groupBtn.on("click",function(e){
        var nomeScheda = $modalTrain.find(".modal-title").text();
        var gruppoM = $(e.target).closest("button").attr("id").slice(4);
        window.location.replace("train.php?nomeScheda="+nomeScheda+"&gruppoM="+gruppoM);
    });

    //Chiusura del messaggio di errore
    $closebtn.on("click",function(){
        $(this).parent().fadeOut(500,function(){
            $error.remove();
        });
    });
    
});