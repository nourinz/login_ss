let form =document.querySelector("#form");

let username = document.querySelector("#username");
let usernameEr = document.querySelector(".username-er");
let password = document.querySelector("#password");
let passwordEr=document.querySelector(".password-er");
let check =document.querySelector(".check");

let checkUsername=false;
let checkPassword=false;

username.onblur =function(){
    if(username.value==""){
        usernameEr.style.display="block";
        usernameEr.innerHTML="user name can't be empty";
        username.style.borderColor="crimson";
    }
    else{
        usernameEr.style.display="none";
        username.style.borderColor="#088178";
        checkUsername=true;
    }
}
password.onblur =function(){
    if(password.value==""){
        passwordEr.style.display="block";
        passwordEr.innerHTML="Password can't be empty";
        password.style.borderColor="crimson";
    }
    else{
        passwordEr.style.display="none";
        password.style.borderColor="#088178";
        checkPassword=true;
    }
}

form.onsubmit=function(e){
    if(!(checkUsername&&checkPassword)){
        e.preventDefault();
        check.style.display="block"
    }
    
}