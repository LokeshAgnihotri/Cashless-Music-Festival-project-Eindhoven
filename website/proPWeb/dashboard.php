<!-- <?php

// include_once 'includes/session.php';

//?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    //<?php if (!isset($_SESSION['email'])):
    // header("location: includes/modals/logout.php");?>
						     header("location: index.php");?>
							<?php else: ?>

    <?php endif?>

    <?php echo "<h1> Welcome " . $_SESSION['firstname'] . " To Dashboard </h1>" ?>

    <h2><a href="index.php">Logout</a></h2>

</body>
</html> -->



<?php
if (isset($_POST)) {
    echo "hello " . $_POST['email'];
}

?>
<!DOCTYPE html>
<html>

<?php include 'includes/header.inc.php';?>

<body>
    <?php include 'includes/nav.inc.php';?>
    <div style="height: 65vh; padding-top: 3%" class="container">
        <button type="button" class="btn btn-red" data-toggle="modal" data-target="#signUpModal">Sign up</button>
        <button type="button" class="btn btn-red" data-toggle="modal" data-target="#signInModal">Sign in</button>

        <?php include 'includes/modals/login.modal.php';?>
        <?php include 'includes/modals/signup.modal.php';?>
    </div>
    <?php include 'includes/footer.inc.php';?>
</body>

</html>