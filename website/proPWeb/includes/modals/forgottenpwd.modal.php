<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link href="../../../assets/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="../../../assets/css/forgetPassword.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">

        <style>
    #msg {
        visibility: hidden;
        min-width: 350px;
        background-color:  #e8b0e8;
        color: white;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        right: 37.5%;
        top: 50px;
        font-size: 17px;
        margin-right:50px;
        border-radius: 9px;
    }

            #msg.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
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
    </head>

    <body>
        <div class="reset">

            <form>
                <h2 style="color:#fff;">Reset password</h2>
                <!-- <input type="password" name="username" placeholder="Old password" /><br /><br /> -->
                <input type="password" name="username" placeholder="New password" /><br /><br />
                <input type="password" name="username" placeholder="Confirm new password" /><br /><br />
                <input type="button" value="Save" onclick="myFunction()" /><br /><br />
                <a href="login.modal.php" style="text-decoration:none;">Go back to sign in page</a><br /><br />
                <div id="msg">Your password changed successfully!!</div>
                <script>
                    function myFunction() {
                        var x = document.getElementById("msg");
                        x.className = "show";
                        setTimeout(function () {  x.className = x.className.replace("show", "");}, 3000);
                    }
                </script>
            </form>
        </div>
    </body>
</html>
