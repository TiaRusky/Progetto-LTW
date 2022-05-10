function searchItem() {
    var item = document.search.searchInput.value;
    var prova = document.getElementById(item.toLowerCase());

    if (prova == null) {
        window.alert("Ciò che cerchi non esiste!");
        return;
    }

    console.log(item.toLowerCase());
    console.log(prova);
}