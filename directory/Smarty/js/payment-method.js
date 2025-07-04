
document.addEventListener("DOMContentLoaded", function () {
const creditFields = document.getElementById("credit-fields");
const paypalFields = document.getElementById("paypal-fields");
const paymentMethods = document.querySelectorAll("input[name='paymentMethod']");
const methodSelect = document.getElementById("card-select");

// Seleziona il bottone
const submitBtn = document.getElementById("selected-button");

// Disabilita il bottone se non ci sono opzioni salvate
if (!methodSelect || methodSelect.options.length <= 1) {
    submitBtn.disabled = true;
}

function togglePaymentFields() {
    const selected = document.querySelector("input[name='paymentMethod']:checked").id;
    if (selected === "paypal") {
    creditFields.style.display = "none";
    paypalFields.style.display = "block";
    } else {
    creditFields.style.display = "block";
    paypalFields.style.display = "none";
    }
}

paymentMethods.forEach(el => el.addEventListener("change", togglePaymentFields));
togglePaymentFields();

// Controllo iniziale per i campi manuali carta
if (document.getElementById('card-select')) {
    toggleManualFields(document.getElementById('card-select'));
}
});

function toggleManualFields(select) {
const disabled = select.value !== "";
document.getElementById('cc-name').disabled = disabled;
document.getElementById('cc-number').disabled = disabled;
document.getElementById('cc-expiration').disabled = disabled;
document.getElementById('cc-cvv').disabled = disabled;
}
