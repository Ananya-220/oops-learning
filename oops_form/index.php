<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="index-login">

    <div class="wrapper">

        <!-- Signup Form -->
        <div class="index-login-signup">

            <h4>SIGN UP</h4>
            <p>Create a new account.</p>

            <form action="includes/signup.inc.php" method="post">

                <input type="text" name="uid" placeholder="Username" required>

                <input type="password" name="pwd" placeholder="Password" required>

                <input type="password" name="pwdrepeat" placeholder="Repeat Password" required>

                <input type="email" name="email" placeholder="Email" required>

                <button type="submit" name="submit">SIGN UP</button>

            </form>

            <?php

            if (isset($_GET["error"])) {

                switch ($_GET["error"]) {

                    case "emptyinput":
                        echo "<p>Please fill in all fields.</p>";
                        break;

                    case "username":
                        echo "<p>Choose a valid username.</p>";
                        break;

                    case "email":
                        echo "<p>Enter a valid email address.</p>";
                        break;

                    case "passwordmatch":
                        echo "<p>Passwords do not match.</p>";
                        break;

                    case "useroremailtaken":
                        echo "<p>Username or email already exists.</p>";
                        break;

                    case "stmtfailed":
                        echo "<p>Something went wrong. Please try again.</p>";
                        break;

                    case "none":
                        echo "<p>Signup successful!</p>";
                        break;
                }
            }

            ?>

        </div>

        <!-- Login Form -->

        <div class="index-login-login">

            <h4>LOGIN</h4>

            <p>Login to your account.</p>

            <form action="includes/login.inc.php" method="post">

                <input type="text" name="uid" placeholder="Username">

                <input type="password" name="pwd" placeholder="Password">

                <button type="submit" name="submit">LOGIN</button>

            </form>

        </div>

    </div>

</section>

</body>
</html>