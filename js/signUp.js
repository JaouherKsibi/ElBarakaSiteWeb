signUpForm.addEventListener("input",()=>{
    if(nom.value.length>0 && prenom.value.length>0 && numtel.value.length>0 && email.value.length>0 && psw.value.length>0 && pswRepeat.value.length>0){
        sign.removeAttribute("disabled");
    }
    else{
        sign.setAttribute("disabled","disabled");
    }
});
var inputs =document.querySelectorAll("input");

function cancel(){
    nom1.value="";
    prenom1.value="";
    numtel1.value="";
    email1.value="";
    num_cin.value="";
    psw1.value="";
    pswRepeat.value="";
    sign1.setAttribute("disabled","disabled");
}

