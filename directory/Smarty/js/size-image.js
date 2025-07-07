document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('uploadForm');
  const imageInput = document.getElementById('photo');

  form.addEventListener('submit', function(event) {
    const file = imageInput.files[0];
    if (file && file.size > 1.5 * 1024 * 1024) { // 1MB
      event.preventDefault(); //  blocca invio
      alert('L\'immagine deve essere inferiore a 1.5MB.');
      imageInput.value = ''; // reset del campo
    }
  });
});