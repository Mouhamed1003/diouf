function sendMail() {

    var params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value,
    }
    alert("Message envoyé avec succès !");
    ;    
}

const serviceID = "service_9qvn8yg";
const templateID = "template_8xbkh1q";

emailjs
.send(serviceID, templateID, params)
.then((res) => {
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("message").value = "";
        console.log(res);
        alert("Message envoyé avec succès !");
})
.catch((err) => console.log(err));

