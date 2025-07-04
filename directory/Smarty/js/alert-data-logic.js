// This script validates the date inputs to ensure the start date is not after the end date

document.addEventListener('DOMContentLoaded', () => { // Ensure the DOM is fully loaded before running the script
  const start = document.getElementById('start_date');
  const end = document.getElementById('end_date');

  function resetAndAlert() { //called when the start date is after the end date
    alert('La data di inizio non può essere successiva alla data di fine.');
    start.value = ''; // Reset the start date input
    end.value = '';  // Reset the end date input
    start.focus(); // Reset the start date to focus on it
  }

  function validate() {
    if (!start.value || !end.value) return; // If either date is not set, do nothing
    const startDate = new Date(start.value);
    const endDate = new Date(end.value);
    if (startDate > endDate) resetAndAlert();
  }

  start.addEventListener('change', validate); // Validate when the start date changes
  end.addEventListener('change', validate);
});

