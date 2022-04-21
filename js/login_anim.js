function change_su_si() {
    var si = document.getElementById('fsi');
    var su = document.getElementById('fsu');
    var hello = document.getElementById('h');
    var welc = document.getElementById('w');

    si.style.display = "none";
    su.style.display = "block";
    hello.style.display = "none";
    welc.style.display = "block";
    console.log("Change singin->signup");
}

function change_si_su() {
    var si = document.getElementById('fsi');
    var su = document.getElementById('fsu');
    var hello = document.getElementById('h');
    var welc = document.getElementById('w');

    si.style.display = "block";
    su.style.display = "none";
    hello.style.display = "block";
    welc.style.display = "none";
    console.log("Change singup->signin");
}