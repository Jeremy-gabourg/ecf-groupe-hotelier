let firstPass = document.getElementById('registration_form_plainPassword');
let verifyPass = document.getElementById('verifpass');

verifyPass.addEventListener('blur', (event)=>{
    if(firstPass.value !== null && verifyPass !== null && firstPass.value !== verifyPass.value) {
        //implémntez votre code
        alert("Les deux mots de passe saisies sont différents. Merci de renouveler l'opération");
        return false;
    }
})