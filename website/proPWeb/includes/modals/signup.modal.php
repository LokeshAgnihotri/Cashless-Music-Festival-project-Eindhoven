<?php

$error = "";

// If form is submitted
if (isset($_POST['submit'])) {
    // function generateBarCode($length)
    // {
    //     $token = "";
    //     $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    //     $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    //     $codeAlphabet .= "0123456789";
    //     $max = strlen($codeAlphabet);

    //     for ($i = 0; $i < $length; $i++) {
    //         $token .= $codeAlphabet[random_int(0, $max - 1)];
    //     }

    //     return $token;
    // }

    // Get input values
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];

    // Validation

    require '../db.php';

    // Check is email already exsits in db
    $sqlEmailIsInDB = "SELECT * FROM users WHERE email='$email'";
    $emailInDBResult = $conn->query($sqlEmailIsInDB);
    if ($emailInDBResult->num_rows > 0) {
        $error = "This email address is already in our database";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $barcode = rand();

        $sql = "INSERT INTO users (firstname, lastname, email, password, dob, barcode, rfid)
         VALUE('$firstname', '$lastname', '$email', '$password', '$dob', '$barcode', '')";

        if ($conn->query($sql) === true) {
            // Send e-mail to user
            $to = $email;
            $subject = 'Welcome';

            $htmlContent = '
            <h4>Thank you for signing up</h4>
            <table cellspacing="0" style="width: 300px; height: 200px;">
                <tr>
                    <th>E-mail:</th><td>' . $email . '</td>
                </tr>
                <tr>
                    <th>Password:</th><td>' . $password . '</td>
                </tr>
                <tr>
                    <th>Barcode:</th><td>' . $barcode . '</td>
                </tr>
            </table>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: Obaid<obaid@obaid.com>' . "\r\n";

            // Send email
            if (mail($to, $subject, $htmlContent, $headers)) {
                header('Location: cong.modal.php');
            } else {
                $error .= "Mail cannot sent now, try again";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up</title>
    <link href="../../assets/css/sgnup.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>

.form-message{
   font-family:arial;
   font-size: 16px;
   font-weight:600;
   text-align: center;
}
.form-error{
   color:red;
}
.form-success{
   color:green;
}
.input-error{
 box-shadow: 0 0 5px red;
}
</style>


<body>
  <!-- <form action="signup.php" method="post"> -->

 <div class="signup">
        <form id="registration_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2 style="color: #fff;">Sign Up</h2>


            <input type="text"  name="firstname"  id="signup_fname" placeholder="First name" class="textInput" ><br><br>


            <input type="text" name="lastname" id="signup_sname" placeholder="Last name" class="textInput"  ><br><br>


            <input type="text"  name="email" id="signup_email" placeholder="Email address" class="textInput" ><br><br>


            <input type="password" name="password"  id="signup_password" placeholder="Password"  class="textInput"  ><br><br>


            <input type="date"   name="dob" id="signup_dob" placeholder="date of birth" class="textInput" value="<?php echo date('Y-m-d'); ?>" ><br><br>


            <input type="submit" name="submit" id="Signup-submit"></input> <br/><br>
            <p class="form-message">

            <?php
if (isset($error)) {
    echo $error;
}
?>
 </p>


            Already have account? <a href="login.modal.php"
                style="text-decoration: none; font-family: 'Play', sans-serif;">&nbsp;Log In</a>

       <!-- <script src="assets/js/signup.js"></script> -->
    </form>
</div>

<!-- ajax -->
<script>
    // $(document).ready(function(){
    //     $("form").submit(function(event){
    //         event.preventDefault();

    //         var firstname= $("#signup_fname").val();
    //         var lastname= $("#signup_sname").val();
    //         var email= $("#signup_email").val();
    //         var password= $("#signup_password").val();
    //         var dob = $("#signup_dob").val();
    //         var submit= $("#signup_submit").val();

    //         $(".form-message").load("validation.php", {
    //             firstname: firstname,
    //             lastname: lastname,
    //             email: email,
    //             password: password,
    //             dob: dob,
    //             submit: submit
    //         });
    //     });
    // });
</script>
</body>

</html>