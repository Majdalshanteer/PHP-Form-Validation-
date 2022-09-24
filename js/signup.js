const form = document.getElementById("sign-up");
const emailField = document.getElementById("email");
const phoneField = document.getElementById("phone");
const passField = document.getElementById("pass");
const nameField = document.getElementById("name");



form.addEventListener("submit", (e) => {

if (nameField.value == null || nameField.value == "") {
    document.getElementById("zero").textContent =
        "The name is required.";
    e.preventDefault();
}
else if (!nameField.value.match(
    /^[a-zA-Z]+ [a-zA-Z]+$/
)){ document.getElementById("zero").textContent =
"Please enter your full name (first & last name)";
e.preventDefault();
}
else{
    document.getElementById("zero").textContent = "";
}
if (emailField.value == null || emailField.value == "") {
    document.getElementById("one").textContent =
        "The email field is required.";
} else if (
    !emailField.value.match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )
) {
    document.getElementById("one").textContent =
        "The email must be a valid email address.";
    e.preventDefault();
} else {
    document.getElementById("one").textContent = "";
}
if (phoneField.value == "" || phoneField.value == null ) {
    document.getElementById("two").textContent =
        "The Mobile field is required.";
    e.preventDefault();
} else if (phoneField.value.length < 10) {
    document.getElementById("two").textContent =
        "The mobile must be 10 characters.";
    e.preventDefault();
} else {
    document.getElementById("two").textContent = "";
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
//match pass
function checkPassword() {
        var pass1 = document.getElementById('pass');
        var pass2 = document.getElementById('password2');
        var text2 = document.getElementById('pw2_check');
        var submitBtn=document.getElementById("submitBtn")

    
        if (pass1.value === pass2.value) {
            submitBtn.style.display = "block";
            text2.innerHTML = "match";

        }
        else {
            text2.innerHTML = "These passwords don't match"
        }
    }