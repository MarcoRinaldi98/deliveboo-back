import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);


function validateForm(form) {
    // Effettua la validazione dei campi del modulo
    var name = form.name.value;
    var surname = form.surname.value;
    var email = form.email.value;
    var password = form.password.value;
    var restaurant_name = form.restaurant_name.value;
    var address = form.address.value;
    var vat = form.vat.value;
    var phone = form.phone.value;
    var image = form.image.value;
    var description = form.description.value;
    var types = form.types.value;

        
    if (name.trim() === ''||surname.trim() === ''||email.trim()===''||password.trim()===''||
        restaurant_name.trim()===''||address.trim()===''||vat.trim()===''||phone.trim()===''||description.trim()==='') {
        alert("Il campo è obbligatorio.");
        return false;
    }
    
    // Validazione: testo
    if (!/^[a-zA-Z]+$/.test(name) || !/^[a-zA-Z]+$/.test(surname) ) {
        alert("Il campo deve contenere solo caratteri alfabetici.");
        return false;
    }
    
    // Validazione: lunghezza massima di 255 caratteri
    if (name.length > 255 || surname.length > 255|| email.length > 255) {
        alert("Il campo non può superare i 255 caratteri.");
        return false;
    }

    if (vat.length > 11) {
        alert("Il campo non può contenere più di 11 caratteri.");
        return false;
    }

    if (vat.length < 11) {
        alert("Il campo non può contenere meno di 11 caratteri.");
        return false;
    }
    
    if (phone.length < 10) {
        alert("Il campo non può contenere meno di 10 caratteri.");
        return false;
    }

    if (phone.length > 15) {
        alert("Il campo non può contenere più di 15 caratteri.");
        return false;
    }

    if (restaurant_name.length > 50||address.length > 50) {
        return "Il campo deve contenere al massimo 50 caratteri.";
    }

    if (typeof surname !== "string"||typeof surname !== "string"||typeof email !== "string"
        ||typeof restaurant_name !== "string"||typeof address !== "string"||typeof vat !== "string"
        ||typeof phone !== "string") {
        return "Il campo deve essere una stringa.";
    }
    
    // Verifica se il campo "email" è una stringa
    if (typeof email !== "string") {
        return "Il campo email deve essere una stringa.";
    }

    // Verifica il formato dell'email utilizzando una regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        return "Inserisci un indirizzo email valido.";
    }
    
              // Verifica se il campo "image" è un'immagine
    if (!/^image\//.test(image.type)) {
        return "Il campo immagine deve essere un file di immagine.";
    }
    
    // Verifica le estensioni consentite per il campo "image"
    var allowedExtensions = ["jpg", "jpeg", "png", "gif", "svg"];
    var fileExtension = image.name.split(".").pop().toLowerCase();
    if (!allowedExtensions.includes(fileExtension)) {
        return "Il campo immagine deve essere un file con estensione jpg, jpeg, png, gif o svg.";
    }

    if (isNaN(types) || types < 1 || types > 12) {
        return "Uno o più tipi selezionati non sono validi.";
    }
    
    // Verifica se il campo "confirmPassword" è obbligatorio
    if (!confirmPassword) {
        return "Il campo conferma password è obbligatorio.";
    }

    // Verifica se la password coincide con la conferma della password
    if (password !== confirmPassword) {
        return "La password e la conferma della password non corrispondono.";
    }
    
    // Se tutti i controlli di validazione passano, puoi inviare il modulo
    return true;
}
