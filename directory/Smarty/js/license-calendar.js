$(document).ready(function() {

  $(function() {
    const minYear = new Date().getFullYear();

    $('input[name="exp"]').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minYear: minYear,
      maxYear: minYear + 20,
      minDate: moment().startOf('day'),
      
    }, function(expiration) {
      $('#exp').val(expiration.format('YYYY-MM-DD')); // Set the value of the hidden input field
    });
  });

});

               