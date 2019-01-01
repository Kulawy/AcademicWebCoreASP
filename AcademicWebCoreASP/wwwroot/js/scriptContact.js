var buttonSend = document.getElementById("sendMsg");
var myForm = document.getElementsByClassName("contactForm")

function sendMail() {
    
    buttonSend.addEventListener("click", showAlert, false);
}

function showAlert(){
    window.alert("Massage has send");
}



window.addEventListener("load", sendMail, false);