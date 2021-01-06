<?php
// if (isset($_POST['submit'])) {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob = $_POST['dob'];
// $barcode = $_POST["barcode"];
// $rfid = $_post["rfid"];
// $submit = $_POST['submit'];

$errorEmpty = false;
$errorEmail = false;

function generateBarCode($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet);

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max - 1)];
    }

    return $token;
}

if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($dob)) {
    echo "<span class='form-error'> Please fill all the fields! </span>";
    $errorEmpty = true;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<span class='form-error'> Please write a valid email address! </span>";
    $errorEmail = true;
} else {
    $errorEmpty = false;
    // Insert data into db
    $password = password_hash($password, PASSWORD_DEFAULT);
    $barcode = generateBarCode(20);

    // echo "<span>kar meta ale</span>";

    // try {
    // require_once '../dbconnect.php';

    $servername = "studmysql01.fhict.local";
    $username = "dbi395367";
    $password = "Fontys@123!";
    $dbname = "dbi395367";
    $dsn = "mysql:dbname=$dbname;host=$servername";

    // try {
    $conn = new PDO($dsn, $username, $password); // connecting to database
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error handeling
    // echo "connection is made successfully";

    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage(); // catching the error
    // }

    // Insert user to db
    $SQLInsert = "INSERT INTO users (firstname, lastname, email,  password, dob, barcode,rfid)
         VALUE( :firstname, :lastname, :email, :password, :dob, :barcode, :rfid)";

    $statement = $conn->prepare($SQLInsert);
    $statement->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email,
        ':password' => $password, ':dob' => $dob, ':barcode' => $barcode, ':rfid' => null));

    if ($statement->rowCount() == 1) {
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
        $headers .= 'From: Obaid<obaid@example.com>' . "\r\n";

        // Send email
        if (mail($to, $subject, $htmlContent, $headers)) {
            // Show message to user
            echo "<span class='form-sucess'>Congratulatoins! Your account has been created and the barcode is sent to provided e-mail successfully</span>";
        } else {
            echo "<span class='form-error'>User is created but e-mail not sent</span>";
        }
    }

    // } catch (PDOException $e) {
    //     echo "Error: " . $e->getMessage();
    // }
}
?>

<script>
    $("#signup_fname, #signup_sname, #signup_email, #signup_password, #signup_dob").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";

    if(errorEmpty == true ){
        $("#signup_fname, #signup_sname, #signup_email, #signup_password, #signup_dob").addClass("input-error");
    }
    if(errorEmail == true ){
        $("#signup_email").addClass("input-error");
    }
    if(errorEmpty == false && errorEmail ==false){
        $("#signup_fname, #signup_sname, #signup_email, #signup_password, #signup_dob").val("");
    }
</script>