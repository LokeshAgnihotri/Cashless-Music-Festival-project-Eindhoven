<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Load Composer's autoloader
require 'php mailer/vendor/autoload.php';
require 'includes/db.php';

// Fetch ticket details per ticket ID
if (isset($_GET['ticket'])) {
    $ticketID = $_GET['ticket'];

    $sqlTicketDetails = "SELECT * FROM tickets WHERE id='$ticketID'";
    $sqlTicketDetailsResults = $conn->query($sqlTicketDetails);

    if ($sqlTicketDetailsResults->num_rows > 0) {
        while ($row = $sqlTicketDetailsResults->fetch_assoc()) {
            $x = $row["price"];
            $y = 0.21 * $x;
            $z = $x + $y;
            $printTicketDetails = "Ticket type :  " . $row["title"] . "<br>" . "<br>" . "Ticket Price  before   Tax:  ------   " . $row["price"] . ".0" . "&euro;" . "<br>" .
                "Discount/Coupon: ------------- " . "00.0" . "&euro;" . "<br>" . "Belasting BTW: ---------------- " . $y . "&euro;" . "<br>" . "=========================== "
                . "<br>" . " Total cost: ----------------------- " . " " . "\t" . " " . " " . " " . " " . $z . "&euro;";

        }
    } else {
        $error = "0 results";
    }
}

$error = "";
$msg = "";

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

// check if the required fields are filled
    // if (empty($firstname) && empty($lastname) && empty($email) && empty($password) && empty($dob)) {
    //     $error .= "You did not fill out the required fields.";
    // }

    // Check is email already exsits in db
    $sqlEmailIsInDB = "SELECT * FROM users WHERE email='$email'";
    $emailInDBResult = $conn->query($sqlEmailIsInDB);

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if (empty($_POST["firstname"])) {
    //         $error = "First Name is required";
    //     } elseif (empty($_POST["lastname"])) {
    //         $error = "Last Name is required";
    //     } elseif (empty($_POST["email"])) {
    //         $error = "email is required";
    //     } elseif (empty($_POST["password"])) {
    //         $error = "password is required";
    //     } elseif (empty($_POST["dob"])) {
    //         $error = "Date of Birth is required";
    //     } elseif ($emailInDBResult->num_rows > 0) {
    //         $error = "This email address is already in use, Please provide another email";
    //     } else {
    //         $error = "Thank for the purchase! your purchase details will be successfully send
    //         to your email";
    //     }
    if ($emailInDBResult->num_rows > 0) {
        $error = "This email address is already in our database";

    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $barcode = rand();

        $sql = "INSERT INTO users (firstname, lastname, email, password, dob, barcode, rfid, ticket_id)
         VALUE('$firstname', '$lastname', '$email', '$password', '$dob', '$barcode', 'none', '$ticket_id')";

        if ($conn->query($sql) === true) {
            // Send e-mail to user

            // // Import PHPMailer classes into the global namespace
            // // These must be at the top of your script, not inside a function
            // use PHPMailer\PHPMailer\Exception;
            // use PHPMailer\PHPMailer\PHPMailer;
            //
            // // Load Composer's autoloader
            // require 'php mailer/vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
                $mail->isSMTP(); // Send using SMTP
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'olala.entertaintment@gmail.com'; // SMTP username
                $mail->Password = 'Wolf@2019'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587; // TCP port to connect to

                //Recipients

                $mail->setFrom('olala.entertaintment@gmail.com', 'Olala Entertaiment');
                $mail->addAddress($email, $firstname . $lastname); // Add a recipient

                $mail->addReplyTo('no-reply@olala.com', 'Information');

                // $body = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';
                $greatings = '<strong>Hello  ' . $lastname . ', </strong>';
                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Thank you for your purchase';
                $mail->Body = $greatings . '
                <p>
                Thank you for the purchase. The following is your important information. We advice you to keep
                them safe and secure because it is critical info.
                <table cellspacing="0" style="width: 800px; height: 90px;">
                <tr>
                    <th>Order#: </th><td>' . $barcode . '</td>
                </tr>
                <tr>
                    <th>E-mail: </th><td>' . $email . '</td>
                </tr>
                <tr>
                    <th>Password:</th><td>' . $password . '</td>
                </tr>
                </table>
                Please use your purchase order Nr while entering the gate for the first time <br><br>
                kind regard,<br>
                Wondimu Gabry Olala <br>
                Olala entertaintment head</p>';
                $mail->AltBody = ' <p> <strong> Hello </strong> <br> Thank you for the purchase </p>';

                $mail->send();
                $msg = 'Thank for the purchase! your purchase details will be send to your email';
            } catch (Exception $e) {
                $error = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            //  phpmailer ends here

        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olala Payment</title>
    <link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Arizonia" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="assets/css/checkout.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./assets/css/navbar.css">

</head>



<style>
#msg {
    visibility: hidden;
    min-width: 350px;
    background-color: #e8b0e8;
    color: white;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    right: 37.5%;
    top: 50px;
    font-size: 17px;
    margin-right: 50px;
    border-radius: 9px;
}

#msg.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.85s, fadeout 1.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {
        top: 0;
        opacity: 0;
    }

    to {
        top: 30px;
        opacity: 1;
    }
}

@keyframes fadein {
    from {
        top: 0;
        opacity: 0;
    }

    to {
        top: 30px;
        opacity: 1;
    }
}

@-webkit-keyframes fadeout {
    from {
        top: 30px;
        opacity: 1;
    }

    to {
        top: 0;
        opacity: 0;
    }
}

@keyframes fadeout {
    from {
        top: 30px;
        opacity: 1;
    }

    to {
        top: 0;
        opacity: 0;
    }
}
</style>

<body>
    <?php include 'includes/navbar.inc.php';?>

    <div class="flex-container" id="booktickets">
        <div class="row">

            <div class="signup day">
                <div class="dayContent">
                    <div class="title"> Payment method</div>
                    <p class="desc">
                        The submit will not be enable unless you choose a payment mehtod

                    </p>
                    <select class="payment_methods" id="payment_methods" style="width: 200px;height:30px;">
                        <inpute>
                            <option value="">Select Payment Option</option>
                        </inpute>
                        <option value="ideal">iDeal</option>
                        <option value="paypal">Paypal</option>
                        <option value="creditcard">CreditCard</option>
                        <option value="visacard">Visa Card</option>
                    </select><br> <br>

                    <select name="ideal_options" id="ideal_options" style="width: 200px;height:30px">>
                        <inpute>
                            <option value="ing">ING</option>
                        </inpute>
                        <option value="rabobank">Rabobank</option>
                        <option value="rabobank">ABN AMRO</option>
                        <option value="rabobank">SNS Bank</option>
                        <option value="rabobank">Fadi Bank</option>
                        <option value="rabobank">Gabry International Bank</option>
                        <option value="rabobank">Friesland Bank</option>
                        <option value="rabobank">Knab Bank</option>
                    </select> <br><br><br><br><br><br>

                </div><br><br>
            </div>

            <div class="day">
                <div class="dayContent">
                    <div class="title">Ticket info</div>
                    <p class="desc">
                        The following is Flupke ticket purchase detail information
                        <h3 style="color: #fff;">Sellected ticket particulars: </h3>
                        <?php if (isset($printTicketDetails)) {echo $printTicketDetails;}?>
                    </p>
                </div>
            </div>
        </div>
        <div class="day">
            <div class="dayContent">
                <div class="title">Personal details
                </div>
                <Please style="color:whitesmoke;font-style:italic">Please provide your personal details to book the
                    ticket</p>
                    <p class="form-message" id="err" type="hidden" style="padding-top:0px; color:red;">
                        <?php if (isset($error)) {echo $error;}?>
                    </p>
                    <p style="color:yellowgreen"> <?php if (isset($msg)) {echo $msg;}?></p>
                    <form id="registration_form" method="POST"
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <input type="hidden" name="ticketid" value="<?php echo $_GET['ticket'] ?>" />

                        <input value="" type="text" name="firstname" id="signup_fname" placeholder="First name"
                            class="textInput" required><br><br>


                        <input value="" type="text" name="lastname" id="signup_sname" placeholder="Last name"
                            class="textInput" required><br><br>


                        <input value="" type="text" name="email" id="signup_email" placeholder="Email address"
                            class="textInput" required><br><br>


                        <input value="" type="password" name="password" id="signup_password" placeholder="Password"
                            class="textInput" required><br><br>


                        <input type="text" onfocus="(this.type='date')" name="dob" id="signup_dob"
                            placeholder="Date of Birth" class="textInput" value="" required>

                        <!-- <p class="form-message" id ="msg"style="padding-top:20px; color:tomato"> <?php if (isset($error)) {echo $error;}?> </p> -->
                        <!-- <p class="form-message" id="msg" style="padding-top:20px; color:yellowgreen">
                            <?php if (isset($msg)) {echo $msg;}?> </p> -->

                        <p id="msg" type="hidden"> Thank for the purchase! your purchase details will be send to your email</p>

                        <p type="hidden" style="padding-top:0px; color: #e8b0e8;">To enable submit & place your order
                            please First select Payment method </p>

                        <input type="submit" name="submit" id="signup-btn" onclick="myFunction()"></input>
                    </form>



            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function() {
    $('#ideal_options').hide();
    $('#payment_methods').on('change', function() {
        $('#signup-btn').prop('disabled', !$(this).val());

        if (this.value == "ideal") {
            $('#ideal_options').show(1500);
        } else {
            $('#ideal_options').hide(1000);
        }
    }).trigger('change');
});


function myFunction() {
    var x = document.getElementById("msg");
    x.className = "show";
    setTimeout(function() {
        x.className = x.className.replace("show");
    }, 4000);
}

// function myFunction() {
//     var x = document.getElementById("err");
//     x.className = "show";
//     setTimeout(function() {
//         x.className = x.className.replace("show", "");
//     }, 3000);
// }
</script>

</html>