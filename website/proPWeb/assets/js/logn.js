function submitLogin() {
    var emailField = $("#signInEmail").val();
    var passwordField = $("#signInPassword").val();

    $.ajax({
        type: "POST",
        url: "login.php",
        data: "submitLogin=1&email=" + emailField + "&password=" + passwordField,
        success: function (msg) {
            console.log(msg);
            if (msg == "ok") {
                window.location.href = "index.php";
            } else {
                $(".statusMsg").html(
                    '<span style="color:red;">Email / password not correct</span>'
                );
            }
        }
    });
}
