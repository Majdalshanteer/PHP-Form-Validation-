// let emailInput= document.getElementById("mail")
      
// let  passwordInput=document.getElementById("password")

// function validate() {

//  if( document.myForm.EMail.value == ""||document.myForm.EMail.value ==null) {

// document.getElementById("one").innerHTML= " The email field is required.";
// return false;
// }
// else if(  !document.myForm.EMail.value.match(
//     /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
// )){
//     document.getElementById("one").innerHTML="The email must be a valid email address.";
//     return false;
// }
// else{
//     document.getElementById("one").innerHTML= "";
// }


// // when you write number& pass in wrong way

// if(  document.myForm.password.value ==""|| document.myForm.password.value ==null){
// document.getElementById("three").innerHTML= " The password field is required.";
// return false;
// }

// // when you write number& pass in wrong way

// else if(document.myForm.password.value.length <8  ){
// document.getElementById("three").innerHTML= " The password must be at least 8 characters."
// return false;

// }
// else if (
//     !document.myForm.password.value.match(
//         ("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}")
//     )
// ) {
//     document.getElementById("three").textContent =
//         "The password must be contain (upper case, lower case, numbers, special character, no spaces ) ";
//         return false;
// }
// }
const form = document.getElementById("sign-up");
const emailField = document.getElementById("email");
const passField = document.getElementById("pass");




form.addEventListener("submit", (e) => {


if (emailField.value == null || emailField.value == "") {
    document.getElementById("one").textContent =
        "The email field is required.";
        e.preventDefault();
} else if (
    !emailField.value.match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )
)
 {
    document.getElementById("one").textContent =
        "The email must be a valid email address.";
    e.preventDefault();
} else {
    document.getElementById("one").textContent = "";
}


if (passField.value == "" || passField.value == null) {
    document.getElementById("three").textContent =
        "The password field is required.";
    e.preventDefault();
} else if (passField.value.length < 8) {
    document.getElementById("three").textContent =
        "The password must be at least 8 characters.";
    e.preventDefault();
}
else if (
    !passField.value.match(
        ("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}")
    )
) {
    document.getElementById("three").textContent =
        "The password must be contain (upper case, lower case, numbers, special character, no spaces ) ";
    e.preventDefault();
}


else {
    document.getElementById("three").textContent = "";
}




})


