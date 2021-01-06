function inputIsValid() {
    let firstName = document.getElementById("signUpFirstName").value;
    let lastName = document.getElementById("signUpLastName").value;
    let password = document.getElementById("signUpPassword").value;
    // let confirmPassword = document.getElementById("signUpConfirmPassword").value;
    let email = document.getElementById("signUpEmail").value;
    let dob = document.getElementById("signUpDob").value;
    let message = document.getElementById("error-message");
    let wrapper = document.getElementById("err-wrapper");

    // validation start here
    if (firstName.length == 0) {
        wrapper.style.visibility = "visible";
        message.innerHTML = "Please enter your first name";
        return false;
    }

    if (lastName.length == 0) {
        wrapper.style.visibility = "visible";
        message.innerHTML = "Please enter your last name";
        return false;
    }

    if (hasNumber(firstName) || hasNumber(lastName)) {
        wrapper.style.visibility = "visible";
        message.innerHTML = "Your name can't contain numbers";
        return false;
    }

    if (!/(.+)@(.+){2,}\.(.+){2,}/.test(email)) {
        wrapper.style.visibility = "visible";
        message.innerHTML = "Please enter a valid email";
        return false;
    }

    if (password.length == 0 || confirmPassword.length == 0) {
        wrapper.style.visibility = "visible";
        message.innerHTML = "Please choose a password";
        return false;
    }

    if (password != confirmPassword) {
        wrapper.style.visibility = "visible";
        message.innerHTML = "Passwords do not match";
        return false;
    }

    // if (document.getElementById("terms-checkbox").checked != true) {
    //     wrapper.style.visibility = "visible";
    //     message.innerHTML = "Please accept the terms and conditions";
    //     return false;
    // }

    wrapper.style.visibility = "hidden";
    return true;
}
// validation ends here


// function signupUser() {
//     if (!inputIsValid()) {
//         return;
//     }

//     var firstnameField = $("#signUpFirstName").val();
//     var lastnameField = $("#signUpLastName").val();
//     var emailField = $("#signUpEmail").val();
//     var passwordField = $("#signUpPassword").val();
//     var dobField = $("#signUpDob").val();


//     $.ajax({
//         type: "POST",
//         url: "../../includes/auth/signup.php",
//         data:
//             "submitSignUp=1&email=" +
//             dobField + "dob" + emailField + "&password=" + passwordField +
//             "&first_name=" + firstnameField + "&last_name=" + lastnameField,
//         success: function (msg) {
//             console.log(msg);
//             if (msg == "ok") {
//                 '<div id="msg">Congratulations You Sign Up successfully!!</div>';
//                 window.location.href = "index.php";
//             } else {
//                 $(".statusMsg").html(
//                     '<span style="color:red;">Email / password not correct</span>'
//                 );
//             }
//         }
//     });
// }

function hasNumber(myString) {
    return /\d/.test(myString);
}

  // document.getElementById('sign-up-button').addEventListener('click', function () {
  //     checkInput();
  // });

  // let pass = document.getElementById('signUpPassword').value;
