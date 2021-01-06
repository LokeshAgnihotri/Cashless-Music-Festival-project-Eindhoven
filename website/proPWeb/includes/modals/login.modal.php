<?php
require_once '../session.php';
require_once '../dbconnect.php';

$error = "";

if (isset($_POST['login-btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $SQLQuery = "SELECT * FROM users WHERE email = :email";
        $statement = $conn->prepare($SQLQuery); //prepare connection
        $statement->execute(array(':email' => $email));

        while ($row = $statement->fetch()) {
            //get the following the data from database
            $_SESSION["user_is_logged_in"] = true;
            $id = $row['user_id'];
            $email = $row['email'];
            $hashed_password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];

// whether password and hast password (confirm password) are the same or not
            if (password_verify($password, $hashed_password)) {
                $_SESSION["user_is_logged_in"] = true;
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                echo "login succesully";
                header('location: ../../index.php');
            } else {
                $error = "Error: Invalid username or password";
            }
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage(); // print out the error msg
    }
}

?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Olala sign in</title>
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Arizonia" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="../../assets/css/logn.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/navbar.css">
</head>

<style>
.error-message {
    color: red;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

/* Add some content at the bottom of the video/page */
.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  min-height: 100%;
  right:0%;
  left:0%;
}
</style>

<body>


    <video  id="myVideo" autoplay="autoplay" id="video"  muted="" loop="">
        <source src="../../assets/img/video/Home_Video.mp4" type="video/mp4" />
    </video>

    <div class="content">
    <div class="signin">
        <!-- <form action="login.php" method="post"> -->
        <form name="form1" method="post" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2 style="color:#fff;">Log In</h2>

            <input type="text" name="email" id="signInEmail" placeholder="email" Required
                style="margin-top: 40px;" /><br /><br />
            <input type="password" name="password" id="signInPassword" placeholder="Password"
                Required /><br /><br /><br />
            <!-- <a href="index.php"><input type="button" onclick="submitLogin()" value="Log In" /></a><br /><br /> -->
            <input type="submit" name="login-btn" value="log in"></input> <br /><br />
            <div id="container">
                <a --href="forgottenpwd.modal.php"
                    style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Reset
                    password?</a>

                <?php if (isset($_GET["newpwd"])) {if ($_GET["newpwd"] == "passwordupdated") {echo '<p style="color:greenyellow">Check your e-mail please!</p>';}}

?>

                <a --href="../../reset-password.php"
                    style=" margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Forget
                    password</a>


            </div>


            <br>
            <p class="error-message">
                <?php if (isset($error)) {echo $error;}?>
                <p style="font-size:13px">

                    I->>>>> Go back to main page? <<<<<-I  <br/> <a href="../../index.php"
                        style="font-size:22px;font-family:'Play', sans-serif;">&nbsp;<strong><i> Click here </h5>
                            </i></strong></a>
                </p>
        </form>

    </div>
    </div>
</body>

</html>