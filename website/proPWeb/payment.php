<?php

require 'includes/db.php';

// Fetch ticket details per ticket ID
if (isset($_GET['ticket'])) {
    $ticketID = $_GET['ticket'];

    $sqlTicketDetails = "SELECT * FROM tickets WHERE id='$ticketID'";
    $sqlTicketDetailsResults = $conn->query($sqlTicketDetails);

    if ($sqlTicketDetailsResults->num_rows > 0) {
        while ($row = $sqlTicketDetailsResults->fetch_assoc()) {
            $printTicketDetails = $row["title"] . " &euro;" . $row["price"] . "<br>";
        }
    } else {
        echo "0 results";
    }
}

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
    $ticket_id = $_POST['ticketid'];

    // Check is email already exsits in db
    $sqlEmailIsInDB = "SELECT * FROM users WHERE email='$email'";
    $emailInDBResult = $conn->query($sqlEmailIsInDB);
    if ($emailInDBResult->num_rows > 0) {
        $error = "This email address is already in our database";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $barcode = rand();

        $sql = "INSERT INTO users (firstname, lastname, email, password, dob, barcode, rfid, ticket_id)
         VALUE('$firstname', '$lastname', '$email', '$password', '$dob', '$barcode', 'none', '$ticket_id')";

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
                header('Location: thankyou.php');
            } else {
                $error .= "Mail cannot sent now, try again";
            }
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Book a ticket - Payment</title>
    <link href="assets/css/sgnup.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<style>
/* .payment_methods inpute option{
    padding: 0 10px;
} */

/* .col-content{
   padding-left: 30px;
} */
#col-one{
    padding-left: 60px;
    margin-right: 80px;
}
</style>


<body>

 <div class="signup sign-up-container">
 <div class="row">
 <h1>Book a ticket</h1>
 <p>Please provide your personal details to book the ticket</p>
 <div class="cloumn-container">
    <div class="column">
<div class="col-content" id="col-one">

<h2 style="color: #fff;">Payment Methods</h2>

    <select class="payment_methods"id="payment_methods" style="width: 200px;height:30px;">
        <inpute><option value="">Select Payment Option</option></inpute>
        <option value="ideal">iDeal</option>
        <option value="paypal">Paypal</option>
        <option value="creditcard">CreditCard</option>
        <option value="visacard">Visa Card</option>
     </select>
    <br> <br>

    <select name="ideal_options" id="ideal_options" style="width: 200px;height:30px">>
        <inpute> <option value="ing">ING</option></inpute>
        <option value="rabobank">Rabobank</option>
        <option value="rabobank">ABN AMRO</option>
        <option value="rabobank">SNS Bank</option>
        <option value="rabobank">Fadi Bank</option>
        <option value="rabobank">Gabry International Bank</option>
        <option value="rabobank">Friesland Bank</option>
        <option value="rabobank">Knab Bank</option>
     </select>
    <br><br><br><br><br><br>

    <h2 style="color: #fff;">sellected ticket: </h2>  <?php if (isset($printTicketDetails)) {echo $printTicketDetails;}
?>
</div>
</div>

    <div class="column" id= "col-2" >
    <div class="col-content">

    <form id="registration_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2 style="color: #fff;">Personal details</h2>

            <input type="hidden" name="ticketid" value="<?php echo $_GET['ticket'] ?>" />

            <input value="Emal" type="text"  name="firstname"  id="signup_fname" placeholder="First name" class="textInput" ><br><br>


            <input value="Shah" type="text" name="lastname" id="signup_sname" placeholder="Last name" class="textInput"  ><br><br>


            <input value="emalshah@gmail.com" type="text"  name="email" id="signup_email" placeholder="Email address" class="textInput" ><br><br>


            <input value="xxxx" type="password" name="password"  id="signup_password" placeholder="Password"  class="textInput"  ><br><br>


            <input type="date"   name="dob" id="signup_dob" placeholder="date of birth" class="textInput" value="<?php echo date('Y-m-d'); ?>" ><br><br>



</div>
</div>
    <br>
</div>
</div>
<p class="form-message" style="padding-top:20px;">
            <?php
if (isset($error)) {
    echo $error;
}
?>
 </p>

    <input type="submit" name="submit" id="signup-btn"></input> <br/><br>
    </form>
    <br>

</div>

<!-- ajax -->
<script>
    $(document).ready(function(){
        $('#ideal_options').hide();
        $('#payment_methods').on('change', function() {
            $('#signup-btn').prop('disabled', !$(this).val());

            if (this.value == "ideal") {
                $('#ideal_options').show(1500);
            } else {
                $('#ideal_options').hide(1000);
            }
        }).trigger('change');
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
    });
</script>
</body>

</html>