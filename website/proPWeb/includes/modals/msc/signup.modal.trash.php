
<?php

require_once '../auth/signup.php';

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link href="../../assets/css/sgnup.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<style>



.container input
{
	padding: 5px;
	margin-bottom: 30px;
	width: 55%;
	box-sizing: border-box;
	box-shadow: none;
	outline: none;
	border:none;
	border-bottom: 2px solid #999;
}

.error_form
{
	top: 2px;
	color: rgb(216, 15, 15);
    font-size: 15px;
    font-family: Helvetica;
}
span #fname_error_message.erro{
    margin-top: 3px;
    margin-bottom: 3px;
    padding-top:90px;
}

</style>


<script>
</script>
<body>
  <!-- <form action="signup.php" method="post"> -->


 <div class="signup">
        <!-- <form id="registration_form" method="POST" action="  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
        <form id="registration_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <h2 style="color: #fff;">Sign Up</h2>


            <input type="text"  name="firstname"  id="signup_fname" placeholder="First name" class="textInput" ><br><br>

            <!-- <span class="error_form" id="fname_error_message"></span> -->
            <input type="text" name="lastname" id="signup_sname" placeholder="Last name" class="textInput"  ><br><br>

            <!-- <span class="error_form" id="sname_error_message"></span> -->
            <!-- <input type="password"  id="signUpConfirmPassword" name="pass-repeat" placeholder="Confirm Password"  class="textInput" ><br><br> -->


            <input type="text"  name="email" id="signup_email" placeholder="Email address" class="textInput" ><br><br>

            <!-- <span class="error_form" id="email_error_message"></span> -->
            <input type="password" name="password"  id="signup_password" placeholder="Password"  class="textInput"  ><br><br>

            <!-- <span class="error_form" id="password_error_message"></span> -->

            <input type="date"   name="dob" id="signup-dob" placeholder="date of birth" class="textInput" ><br><br>

            <!-- <span class="error_form" id="dob_error_message"></span> -->
            <!-- <input type="submit" name="signup-btn" class="btn"  value="Signup"> <br><br> -->
            <!-- <input type="submit" name="validate" class="btn"  value="Signup"><br><br> -->
            <input type="submit" name="signup-submit" id=" Signup-submit"></input> <br/><br>
            <p class="form-message"> </p>


            Already have account? <a href="login.modal.php"
                style="text-decoration: none; font-family: 'Play', sans-serif;">&nbsp;Log In</a>

       <script src="assets/js/signup.js"></script>
    </form>
</div>
</body>

</html>

<script type="validation.js"></script>
<script src="../../assets/js/validation.js"></script>
<script src="../../assets/js/sign-up.js"></script>





<script type="text/javascript">
      $(function () {

         $("#fname_error_message").hide();
         $("#sname_error_message").hide();
         $("#email_error_message").hide();
         $("#password_error_message").hide();
        //  $("#retype_password_error_message").hide();
         $("#dob_error_message").hide();

         var error_fname = false;
         var error_sname = false;
         var error_email = false;
         var error_password = false;
        //  var error_retype_password = false;

         $("#form_fname").focusout(function () {
            check_fname();
         });
         $("#form_sname").focusout(function () {
            check_sname();
         });
         $("#form_email").focusout(function () {
            check_email();
         });
         $("#form_password").focusout(function () {
            check_password();
         });
         $("#form_retype_password").focusout(function () {
            check_retype_password();
         });

         function check_fname() {
            var pattern = /^[a-zA-Z]*$/;
            var firstname = $("#form_fname").val();
            if (pattern.test(firstname) && firstname !== '') {
               $("#fname_error_message").hide();
               $("#form_fname").css("border-bottom", "2px solid #34F458");
            } else {
               $("#fname_error_message").html("Should contain only Characters");
               $("#fname_error_message").show();
               $("#form_fname").css("border-bottom", "2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_sname() {
            var pattern = /^[a-zA-Z]*$/;
            var lastname = $("#form_sname").val()
            if (pattern.test(lastname) && lastname !== '') {
               $("#sname_error_message").hide();
               $("#form_sname").css("border-bottom", "2px solid #34F458");
            } else {
               $("#sname_error_message").html("Should contain only Characters");
               $("#sname_error_message").show();
               $("#form_sname").css("border-bottom", "2px solid #F90A0A");
               error_fname = true;
            }
         }

         function check_password() {
            var password_length = $("#form_password").val().length;
            if (password_length < 8) {
               $("#password_error_message").html("Atleast 8 Characters");
               $("#password_error_message").show();
               $("#form_password").css("border-bottom", "2px solid #F90A0A");
               error_password = true;
            } else {
               $("#password_error_message").hide();
               $("#form_password").css("border-bottom", "2px solid #34F458");
            }
         }

        //  function check_retype_password() {
        //     var password = $("#form_password").val();
        //     var retype_password = $("#form_retype_password").val();
        //     if (password !== retype_password) {
        //        $("#retype_password_error_message").html("Passwords Did not Matched");
        //        $("#retype_password_error_message").show();
        //        $("#form_retype_password").css("border-bottom", "2px solid #F90A0A");
        //        error_retype_password = true;
        //     } else {
        //        $("#retype_password_error_message").hide();
        //        $("#form_retype_password").css("border-bottom", "2px solid #34F458");
        //     }
        //  }

         function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var email = $("#form_email").val();
            if (pattern.test(email) && email !== '') {
               $("#email_error_message").hide();
               $("#form_email").css("border-bottom", "2px solid #34F458");
            } else {
               $("#email_error_message").html("Invalid Email");
               $("#email_error_message").show();
               $("#form_email").css("border-bottom", "2px solid #F90A0A");
               error_email = true;
            }
         }

         $("#registration_form").submit(function () {
            error_fname = false;
            error_sname = false;
            error_email = false;
            error_password = false;
            // error_retype_password = false;


            check_fname();
            check_sname();
            check_email();
            check_password();
            // check_retype_password();


            if (error_fname === false && error_sname === false && error_email === false &&
               error_password === false) {
               alert("Registration Successfull");
               return true;
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }

         });
      });
   </script>
