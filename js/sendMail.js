function sendEmail() {
    //    event.preventDefault();

    var mail = document.contactus.inputEmail.value;
    var obj = document.contactus.inputObject.value;
    var msg = document.contactus.inputMsg.value;

    console.log(mail);
    console.log(obj);
    console.log(msg);

    window.open('mailto:techfit.web@gmail.com?from=' + mail + '&subject=' + obj + '&body=' + msg);

    //window.alert('Mail inviata!');

    document.contactus.inputEmail.value = '';
    document.contactus.inputObject.value = '';
    document.contactus.inputMsg.value = '';
}