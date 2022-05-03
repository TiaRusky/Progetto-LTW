$(document).ready(function (){
    
    var $elementoNumeroSerie = $('.numSerie');

    $elementoNumeroSerie.on("change",function(e){
        
        var $numSerie = $elementoNumeroSerie.val(); //Prendo il numero di serie
        
        var $descElement = $(e.target).parent().next();    //Prelevo il div in cui inserire il numero di ripetizioni per ogni serie
        $descElement.html("");      //Lo pulisco
        for(let i=1;i<=$numSerie;i++){
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
