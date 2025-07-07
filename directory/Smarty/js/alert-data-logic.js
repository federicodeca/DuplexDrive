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
  function alertPastDate(){
    alert('il periodo inserito è nel passato.');
    start.value = ''; // Reset the start date input
    end.value = '';  // Reset the end date input
    start.focus(); // Reset the start date to focus on it
  }

  function resetAndAlertExisting() {
    alert('Le date inserite non esistono.');
    start.value = ''; // Reset the start date input
    end.value = '';  // Reset the end date input
    start.focus(); // Reset the start date to focus on it
  }

 function validate() {
  if (!start.value || !end.value) return;

  const [startDay, startMonth, startYear] = start.value.trim().split('-').map(Number);
  const [endDay, endMonth, endYear] = end.value.trim().split('-').map(Number);

  const now = new Date();
  const startDate = new Date(startYear, startMonth - 1, startDay);
  const endDate = new Date(endYear, endMonth - 1, endDay);

  // azzera ore/minuti/secondi per confronto solo su data
  now.setHours(0, 0, 0, 0);

  if (startDate < now || endDate < now) {
    alertPastDate(); // date nel passato
    return;
  }

  if (startDate >= endDate) {
    resetAndAlert(); // data di inizio dopo o uguale a data di fine
  }
}
  function isExisting() {
    if (!start.value || !end.value) return;
    const startDateParts = start.value.trim().split('-');
    const endDateParts = end.value.trim().split('-');

    // Parse parts: [dd, mm, yyyy]
    const [startDay, startMonth, startYear] = startDateParts.map(Number);
    const [endDay, endMonth, endYear] = endDateParts.map(Number);


    const startDate = new Date(startYear, startMonth - 1, startDay); // date in js jan=0 dec=11
    const endDate = new Date(endYear, endMonth - 1, endDay);

    const isStartValid = startDate.getFullYear() === startYear &&
                         startDate.getMonth() === startMonth - 1 &&
                         startDate.getDate() === startDay;

    const isEndValid = endDate.getFullYear() === endYear &&
                       endDate.getMonth() === endMonth - 1 &&
                       endDate.getDate() === endDay;

    if (!isStartValid || !isEndValid) {
      resetAndAlertExisting();
    }
  }

  start.addEventListener('change', isExisting);
  end.addEventListener('change', isExisting); // Check if the dates already exist

  start.addEventListener('change', validate); // Validate when the start date changes
  end.addEventListener('change', validate);
});

