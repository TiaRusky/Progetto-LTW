$(document).ready(function(){
    //Tutti i link per eliminare schede
    $deleteItem = $(".delete-item");

    $deleteItem.on("click",function(e){
        //Devo prelevare la scheda che si vuole eliminare (il nome)
        var nomeScheda = $(e.target).closest(".card-header").find(".card-title").text();
        $.ajax({
            url : "deleteForm.php",
            type: "POST",
            data: {"nome":nomeScheda},
            success : function(result){
                if(result){
                    $(e.target).closest(".card").remove();
                }
            }
        });
    });
});