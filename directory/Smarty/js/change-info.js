document.addEventListener('DOMContentLoaded', function() {
    const emailForm = document.getElementById('emailForm');


    window.unlockEmail = function () {
        if (emailForm) {
            emailForm.style.display = 'none';
                 

        }
    };
});