$(document).ready(function(){
    //Tutti i link per eliminare schede
    $deleteItem = $(".delete-item");

    $deleteItem.on("click",function(e){
        //Devo prelevare la scheda che si vuole eliminare (il nome)
        var nomeScheda = $(e.target).closest(".card-header").find(".card-title").text();
        
    });
});