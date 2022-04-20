let arrivalDate = document.getElementById('reservation_form_arrivalDate');
let departureDate = document.getElementById('reservation_form_departureDate');
let suite = document.getElementById('reservation_form_suite');

arrivalDate.addEventListener('blur',(event)=>{
    console.log(event.target.value)
})