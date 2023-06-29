import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])





const deleteButtons = document.querySelectorAll('.form_delete_post button[type="submit"]');


deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();

        const modal = document.getElementById('confirmModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const confirmDeleteBtn = modal.querySelector('.btn.btn-danger')

        confirmDeleteBtn.addEventListener('click', () => {
            button.parentElement.submit();
        });
    })
});

const btnDelete = document.getElementById('btn-delete');

    if(btnDelete){
        btnDelete.addEventListener('click', function () {
            const formDelete = document.getElementById('form-delete');
            formDelete.submit();
        })}


let Newform = document.getElementById('register');
if(Newform){

    Newform.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm(Newform)) {
            Newform.submit();
        } else {
            return false;
        }
    });
}



function validateForm(form) {

    // Effettua la validazione dei campi del modulo
    let name = form.name.value;
    let surname = form.surname.value;
    let email = form.email.value;
    let password = form.password.value;
    let confirmPassword = form.password_confirmation.value;
    let restaurant_name = form.restaurant_name.value;
    let address = form.address.value;
    let vat = form.vat.value;
    let phone = form.phone.value;
    let image = form.image.value;
    let types = Array.from(form.querySelectorAll('input[name^="types"]:checked')).map(checkbox => checkbox.value);

    if (name.trim() === '' || surname.trim() === '' || email.trim() === '' || password.trim() === '' ||
    restaurant_name.trim() === '' || address.trim() === '' || vat.trim() === '' || phone.trim() === '') {
        let errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo è obbligatorio.";
        });
        return false;
    }

    
    // Validazione: testo
    if (!/^[a-zA-Z]+$/i.test(name) || !/^[a-zA-Z]+$/i.test(surname)) {
            let errorMessages = document.querySelectorAll('.error-name');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo nome e cognome devono contenere solo caratteri alfabetici.";
        });
        return false;
    }
    
    // Validazione: lunghezza massima di 255 caratteri
    if (name.length > 255 || surname.length > 255 || email.length > 255) {
        let errorMessages = document.querySelectorAll('.error-text');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo non può superare i 255 caratteri.";
        });
        return false;
    }
    
    if(vat.length < 11 || vat.length > 11){
        document.getElementById('error-vat').textContent = "Deve avere almeno 11 caratteri.";
        return false;
    }

    if (phone.length < 10) {
        let errorMessages = document.querySelectorAll('.error-phone-min');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo telefono non può contenere meno di 10 caratteri.";
        });
        return false;
    }

    if (phone.length > 15) {
        let errorMessages = document.querySelectorAll('.error-phone-max');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo telefono non può contenere più di 15 caratteri.";
        });
        return false;
    }
    
    if (restaurant_name.length > 50 || address.length > 50) {
        let errorMessages = document.querySelectorAll('.error-length');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo deve contenere al massimo 50 caratteri.";
        });
        return false;
    }
    
    if (typeof name !== "string" || typeof surname !== "string" || typeof email !== "string" ||
        typeof restaurant_name !== "string" || typeof address !== "string" || typeof vat !== "string" ||
        typeof phone !== "string") {
        let errorMessages = document.querySelectorAll('.error-string');
            errorMessages.forEach(function(element) {
            element.textContent = "Il campo deve essere una stringa.";
        });
        return false;
    }

    // Verifica il formato dell'email utilizzando una regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('error-email').textContent = "Inserisci un email valida con la @ (ex.test@test.it).";
        return false
    }
    
    

    if (types.length == 0) {
        document.getElementById('error-type').textContent = "Inserire almeno un tipo.";
        return false;
    }
    
    let validTypes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    
    for (let i = 0; i < types.length; i++) {
        if (!validTypes.includes(parseInt(types[i]))) {
            document.querySelector('.error-types').textContent = "Uno o più tipi selezionati non sono validi.";
            return false;
        }
    }
    
    // Verifica se il campo "confirmPassword" è obbligatorio
    if (!confirmPassword) {
        document.getElementById('error-verify').textContent = "Uno o più tipi selezionati non sono validi.";
        return false;
    }

    // Verifica se la password coincide con la conferma della password
    if (password !== confirmPassword) {
        let errorMessages = document.querySelectorAll('.error-password');
            errorMessages.forEach(function(element) {
            element.textContent = "La password e la conferma della password non corrispondono.";
        });
        return false;
    }
    
    // Se tutti i controlli di validazione passano, puoi inviare il modulo
    return true;
}
