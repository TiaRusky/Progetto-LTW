function sendEmail() {
    event.preventDefault();

    var mail = document.contactus.inputEmail.value;
    var obj = document.contactus.inputObject.value;
    var msg = document.contactus.inputMsg.value;

    window.open('mailto:c.schiavella@gmail.com?from=mail&subject=obj&body=msg');

    window.alert('Mail inviata!');

    document.contactus.inputEmail.value = '';
    document.contactus.inputObject.value = '';
    document.contactus.inputMsg.value = '';
}