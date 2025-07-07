//this file is used to choice between car for rent e car for sale and this block or display the right form

document.addEventListener('DOMContentLoaded', function() { 
    const carTypeSelect = document.getElementById('car-type');  //for choice of car type
    const conditionSelect = document.getElementById('condition-select'); //for car for sale
    const carDescriptionDiv = document.getElementById('car-description');  //for car for rent
    

    carTypeSelect.addEventListener('change', function() {
        if (this.value === 'car_for_sale') {
            conditionSelect.style.display = 'block';  //show the condition select for car for sale
            carDescriptionDiv.style.display = 'none'; //hide the car description for car for rent
           
        } else if (this.value === 'rental_car') {
            conditionSelect.style.display = 'none';
            carDescriptionDiv.style.display = 'block';
      
        } else {
            conditionSelect.style.display = 'none';
            carDescriptionDiv.style.display = 'none';
          
        }
    });
})