// SELECTING ALL TEXT ELEMENTS
var firstname = document.forms['vform']['firstname'];
var lastname = document.forms['vform']['lastname'];
var email = document.forms['vform']['email'];
var password = document.forms['vform']['password'];
var dob = document.forms['vform']['dob'];
// var password_confirm = document.forms['vform']['password_confirm'];

// SELECTING ALL ERROR DISPLAY ELEMENTS
var firstname_error = document.getElementById('firstname_error');
var lastname_error = document.getElementById('lastname_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');
var dob_error = document.getElementById('dob_error');
// SETTING ALL EVENT LISTENERS
firstname.addEventListener('blur', firstNameVerify, true);
lastname.addEventListener('blur', lastNameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
dob.addEventListener('blur', dobVerify, true);
// validation function
function Validate() {
    // validate username
    if (firstname.value == "") {
        firstname.style.border = "1px solid red";
        document.getElementById('firstname_div').style.color = "red";
        firstname_error.textContent = "firstname is required";
        firstname.focus();
        return false;
    }
    // validate username
    if (firstname.value.length < 3) {
        firstname.style.border = "1px solid red";
        document.getElementById('firstname_div').style.color = "red";
        name_error.textContent = "Username must be at least 3 characters";
        firstname.focus();
        return false;
    }
    if (lastname.value == "") {
        lastname.style.border = "1px solid red";
        document.getElementById('lastname_div').style.color = "red";
        lastname_error.textContent = "lastname is required";
        lastname.focus();
        return false;
    }
    // validate username
    if (lastname.value.length < 3) {
        lastname.style.border = "1px solid red";
        document.getElementById('lastname_div').style.color = "red";
        lastname_error.textContent = "lastname must be at least 3 characters";
        firstname.focus();
        return false;
    }
    // validate email
    if (email.value == "") {
        email.style.border = "1px solid red";
        document.getElementById('email_div').style.color = "red";
        email_error.textContent = "Email is required";
        email.focus();
        return false;
    }
    // validate password
    if (password.value == "") {
        password.style.border = "1px solid red";
        document.getElementById('password_div').style.color = "red";
        password_confirm.style.border = "1px solid red";
        password_error.textContent = "Password is required";
        password.focus();
        return false;
    }
    // check if the two passwords match this will be Implemented later on
    if (password.value != password_confirm.value) {
        password.style.border = "1px solid red";
        document.getElementById('pass_confirm_div').style.color = "red";
        password_confirm.style.border = "1px solid red";
        password_error.innerHTML = "The two passwords do not match";
        return false;
    }
}

// event handler functions
function firstNameVerify() {
    if (firstname.value != "") {
        firstname.style.border = "1px solid #5e6e66";
        document.getElementById('firstname_div').style.color = "#5e6e66";
        firstname_error.innerHTML = "";
        return true;
    }
}
function lastNameVerify() {
    if (lastname.value != "") {
        lastname.style.border = "1px solid #5e6e66";
        document.getElementById('lastname_div').style.color = "#5e6e66";
        lastname_error.innerHTML = "";
        return true;
    }
}
function emailVerify() {
    if (email.value != "") {
        email.style.border = "1px solid #5e6e66";
        document.getElementById('email_div').style.color = "#5e6e66";
        email_error.innerHTML = "";
        return true;
    }
}
function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        // document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        document.getElementById('password_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
    if (password.value === password_confirm.value) {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
}
function dobVerify() {
    if (dob.value != "") {
        dob.style.border = "1px solid #5e6e66";
        document.getElementById('dob_div').style.color = "#5e6e66";
        dob_error.innerHTML = "";
        return true;

    }
}