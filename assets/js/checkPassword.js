let firstPass = document.getElementById('password');
let verifyPass = document.getElementById('verifpass');

verifyPass.addEventListener('blur', (event)=>{
    if(firstPass.value === event.target.value) {
        //implémntez votre code
        alert("Les deux mots de passe saisies sont différents");
        alert("Merci de renouveler l'opération");
        return false;
    }
})