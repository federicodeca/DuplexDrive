document.addEventListener("DOMContentLoaded", function () {
  const creditFields = document.getElementById("credit-fields");
  const paypalFields = document.getElementById("paypal-fields");
  const paymentMethods = document.querySelectorAll("input[name='paymentMethod']");
  const methodSelect = document.getElementById("card-select");
  const submitBtnLeft = document.getElementById("selected-button");

  const manualInputs = ['cc-name', 'cc-number', 'cc-expiration', 'cc-cvv'];

  // Disabilita il form di sinistra se non ci sono carte salvate
  if (!methodSelect || methodSelect.options.length < 1) {
    if (methodSelect) methodSelect.disabled = true;
    if (submitBtnLeft) submitBtnLeft.disabled = true;
  }

  function toggleManualFields() {
  const selectedMethod = document.querySelector("input[name='paymentMethod']:checked")?.id;
  const usingCard = selectedMethod === "credit" || selectedMethod === "debit";

  // Disabilita i campi manuali solo se:
  // 1. È selezionato un metodo carta
  // 2. È presente una carta salvata
  // 3. E il bottone sinistro è visibile (cioè l’utente sta usando il form sinistro)

  const hasSavedCard = methodSelect && methodSelect.options.length > 0;
  const isFormSinistroAttivo = document.activeElement === submitBtnLeft;

  const shouldDisable = usingCard && hasSavedCard && isFormSinistroAttivo;

  manualInputs.forEach(id => {
    const input = document.getElementById(id);
    if (input) input.disabled = shouldDisable;
  });
}

  function togglePaymentFields() {
    const selected = document.querySelector("input[name='paymentMethod']:checked")?.id;
    if (selected === "paypal") {
      creditFields.style.display = "none";
      paypalFields.style.display = "block";
    } else {
      creditFields.style.display = "block";
      paypalFields.style.display = "none";
    }

    toggleManualFields();
  }

  paymentMethods.forEach(el => {
    el.addEventListener("change", togglePaymentFields);
  });

  if (methodSelect) {
    methodSelect.addEventListener("change", toggleManualFields);
  }

  // Inizializza al primo caricamento
  togglePaymentFields();
  toggleManualFields();
});
