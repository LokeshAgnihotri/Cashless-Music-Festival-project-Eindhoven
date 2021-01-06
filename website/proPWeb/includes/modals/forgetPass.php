

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Olala reset password</title>
    <link href="assets/css/forgetPassword.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">


</head>

  <body>
    <div class="forget">

        <form method= "POST" action="includes/reset-request.inc.php">

            <h2  style="color:#fff;">Reset password</h2>

            <h5 style="font-size:12px; color:aliceblue;">Enter email here that you used
             on your account.We send link on  your email to reset your password.</h5>


            <input type="text" name="email" placeholder="Enter your email" autocomplete="off"/><br /><br />

            <input type="button" name="reset-request-submit" value="Recieve new password by email" onclick="myFunction()" /><br /><br /><br /><br />

            <a href="index.php" style="text-decoration:none;">Go back to Home page</a><br /><br />

            <div id="msg"> <?php echo $error ?></div>


         </form>
                <?php if (isset($GET["reset"])) {if ($_GET["reset"] == "success") {echo '<p class= "signupsuccess"> check your email</p>';}}?>



         </div>
            </body>
            <script>




                function myFunction() {
                    var x = document.getElementById("msg");
                    x.className = "show";
                    setTimeout(function () {
                        x.className = x.className.replace("show", "");
                    }, 3000);
                }
            </script>
            </html>
