let form =document.querySelector("#form");

let username = document.querySelector("#username");
let usernameEr = document.querySelector(".username-er");
let email = document.querySelector("#email");
let emailEr=document.querySelector(".email-er");
let password = document.querySelector("#password");
let passwordEr=document.querySelector(".password-er");
let password2 = document.querySelector("#password2");
let password2Er=document.querySelector(".password2-er");
let check =document.querySelector(".check");

let validEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let checkUsername=false;
let checkEmail=false;
let checkPassword=false;
let checkPassword2=false;

username.onblur =function(){
    if(username.value==""){
        usernameEr.style.display="block";
        usernameEr.innerHTML="user name can't be empty";
        username.style.borderColor="crimson";
    }else if(username.value.length < 5){
        usernameEr.style.display="block";
        usernameEr.innerHTML="The username must be at least five characters";
        username.style.borderColor="crimson";
    }else{
        usernameEr.style.display="none";
        username.style.borderColor="#088178";
        checkUsername=true;
    }
}
email.onblur =function(){
    if(email.value==""){
        emailEr.style.display="block";
        emailEr.innerHTML="E_mail can't be empty";
        email.style.borderColor="crimson";
    }else if(!(email.value.match(validEmail))){
        emailEr.style.display="block";
        emailEr.innerHTML="Please enter valid E_mail";
        email.style.borderColor="crimson";
    }else{
        emailEr.style.display="none";
        email.style.borderColor="#088178";
        checkEmail=true;
    }
}
password.onblur =function(){
    if(password.value==""){
        passwordEr.style.display="block";
        passwordEr.innerHTML="Password can't be empty";
        password.style.borderColor="crimson";
    }else if(password.value.length<8){
        passwordEr.style.display="block";
        passwordEr.innerHTML="The password must be at least 8 charecters";
        password.style.borderColor="crimson";
    }else{
        passwordEr.style.display="none";
        password.style.borderColor="#088178";
        checkPassword=true;
    }
}
password2.onblur =function(){
    if(password2.value==""){
        password2Er.style.display="block";
        password2Er.innerHTML="Confirm Password can't be empty";
        password2.style.borderColor="crimson";
    }else if(password2.value!==password2.value){
        password2Er.style.display="block";
        password2Er.innerHTML="Password not match";
        password2.style.borderColor="crimson";
    }else{
        password2Er.style.display="none";
        password2.style.borderColor="#088178";
        checkPassword2=true;
    }
}

form.onsubmit=function(e){
    if(!(checkUsername&&checkEmail&&checkPassword&&checkPassword2)){
        e.preventDefault();
        check.style.display="block"
    }
    
}