<?php

if (isset($_POST["submit"])) {

    // Grab form data
    $uid = trim($_POST["uid"]);
    $pwd = trim($_POST["pwd"]);
    $pwdrepeat = trim($_POST["pwdrepeat"]);
    $email = trim($_POST["email"]);

    // Include classes
    require_once "../classes/dbh.classes.php";
    require_once "../classes/signup.classes.php";
    require_once "../classes/signup-contr.classes.php";

    // Create Signup Controller object
    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    // Run signup
    $signup->signupUser();

    // Redirect if successful
    header("Location: ../index.php?error=none");
    exit();

} else {

    // Prevent direct access
    header("Location: ../index.php");
    exit();

}