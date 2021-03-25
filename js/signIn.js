/*const nom=document.querySelector("input");

const prenom= document.getElementById('psw');
const sign =document.getElementById('sb');
const ccl =document.getElementById('cncl');
formLoginIn.addEventListener("input",()=>{
    if(nom.value!=""&&prenom.value!=""){
    sign.removeAttribute("disabled");
    }
    else{
        sign.disabled=true;;
    }
});*/
formLoginIn.addEventListener('input',()=>{
    if(uname.value.length>0 && psw.value.length>0){
        sb.removeAttribute("disabled");
    }
    if(uname.value.length==0 || psw.value.length==0){
        sb.setAttribute("disabled","disabled");
    }
})
const nom1= document.getElementById('uname');
const prenom1= document.getElementById('psw');

function cancel(){
    nom1.value="";
    prenom1.value="";
    sb.setAttribute("disabled","disabled");
}
