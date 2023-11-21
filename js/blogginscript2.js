//get the elements as inputs
let emailInput = document.querySelector("#authorname");
let loginInput = document.querySelector("#email");
let passInput = document.querySelector("#password");

//the texts of error messages
let defaultMSg="";
let emailErrorMsg="x  Please enter a valid email";
let authornameErrorMsg="x  Enter a user name with less than 30 characters";
let passwordErrorMsg="x  Password should be at least 8 characters long";

//the elements to hold them
let emailError=document.createElement('p'); 
let authornameError=document.createElement('p');
let passwordError=document.createElement('p');

//to append the created elements
document.querySelectorAll(".email-group")[0].append(emailError);
document.querySelectorAll(".login-group")[0].append(authornameError);
document.querySelectorAll(".pass-group")[0].append(passwordError);

//to style the appended elements
emailError.setAttribute("class","warning");
authornameError.setAttribute("class","warning");
passwordError.setAttribute("class","warning");

//to validate the email 
function emailValidation(){
    let emailValue =  emailInput.value;
    let regexp=/\S+@\S+\.\S+/;

    if (!regexp.test(emailValue)){
        return emailErrorMsg;
    }
    else {
        return defaultMSg;
    }
}

//event listener when move away from email
emailInput.addEventListener("blur",()=>{ // arrow function
    let x = emailValidation();
    if(x == defaultMSg){
        emailError.textContent = defaultMSg;
    }
    else{
        emailError.textContent = emailErrorMsg;
        emailInput.style.borderColor = "red";
    }
});

//to validate the login
function loginValidation(){
    let loginValue =  loginInput.value;
    let regexp =/^\w{1,29}$/;
        
    if (!regexp.test(loginValue)){
        return authornameErrorMsg;
    }
    else {
        return defaultMSg;
    }
} 

//event listener when move away from login
loginInput.addEventListener("blur",()=>{ // arrow function
    let x = loginValidation();
    if(x == defaultMSg){
        authornameError.textContent = defaultMSg;
        loginInput.value = loginInput.value.toLowerCase()
    }
    else{
        authornameError.textContent = authornameErrorMsg;
        loginInput.style.borderColor = "red";
    }
});

//to validate the first input of password
function passValidation(){
    let passValue =  passInput.value;
    let regexp =/^\w{8,}$/;
        
    if (!regexp.test(passValue)){
        return passwordErrorMsg;
    }
    else {
        return defaultMSg;
    }
} 

//to validate every element in the form
function signUpValidate(){
    let valid = true;//global validation 

    let emailV = emailValidation();
    if(emailV !== defaultMSg){
        emailError.textContent = emailV;
        emailInput.style.borderColor = "red";
        valid = false;   
    }

    let loginV = loginValidation();
    if(loginV !== defaultMSg){
        authoernameError.textContent = loginV;
        loginInput.style.borderColor = "red";
        valid = false;   
    }
    else{
        loginInput.value = loginInput.value.toLowerCase()
    }
    
    let passV = passValidation();
    if(passV !== defaultMSg){
        passwordError.textContent = passV;
        passInput.style.borderColor = "red";
        valid = false;   
    }

    return valid;
};
