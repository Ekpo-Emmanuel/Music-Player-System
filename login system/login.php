<?php

if(isset($_POST["submit"])) {

    $name = $_POST["email"];
    $password = $_POST["password"];

    require_once("config.php");
    require_once("functions1.php");

    if(emptyInputLogin($name, $password) !== FALSE) {
        header("location: login.php?error=emptyInput");
        exit();
    }

    loginUser($conn, $name, $password);
}
else 
{
    // header("location: login.php");
    // exit();
}

?>


<html>
    <head>
        <title>Music Player</title>
        <link rel="shortcut icon" href="../H_IMGAES/logo1.png" type="image/x-icon">
        <link rel="stylesheet" href="../css/login.css">
        <!-- jquery cdn  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- iconic.io  -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </head>
    <body>
    <div class="plai">
        <img src="../H_IMGAES/Horizontal-audio-slider-2.jpg" alt="">
    </div>
        <div class="container">
            <div class="logo">
                    <a href="../joinPage.php"><img src="../H_IMGAES/logo1.png" alt=""></a>
            </div>
                <hr>
            <!-- <div class="socials">
                    <a href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                        <span>Login with Facebook</span>
                    </a>
                    <a href="#">
                    <ion-icon name="logo-google"></ion-icon>
                        <span>Login with Google</span>
                    </a>  
            </div>
             <span class="or">OR</span> -->
            <form action="" method="POST">
            <?php 
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "emptyInput") {
                            echo "<span class='error'>Fill in all fields</span>";
                        } else if($_GET["error"] == "wrong_name") {
                            echo "<span class='error'>Incorrect Username or Password</span>";
                        }
                        else if($_GET["error"] == "wrong_password") {
                            echo "<span class='error'>Incorrect Username or Password</span>";
                        }
                    }
                
                ?>
                <!-- <span class="error_r"></span> -->
                <input type="text" placeholder="Name/Email"  name="email" value="<?php if(isset($_POST["email"])) {echo $_POST["email"];} ?>" >
                <input type="text" placeholder="password"  name="password"  value="<?php if(isset($_POST["email"])) {echo $_POST["password"];} ?>">
                <div class="signed">
                    <input type="checkbox">
                    <span>keep me signed in</span>
                </div>
                <input type="submit" value="Login" name="submit">
                <p>Do not have an account?<a href="register.php"> Register</a></p>
            </form>
        </div>
    </body>
</html>