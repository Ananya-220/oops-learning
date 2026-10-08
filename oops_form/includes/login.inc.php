<?php

if (isset($_POST["submit"])) {

    $uid = trim($_POST["uid"]);
    $pwd = trim($_POST["pwd"]);

    require_once "../classes/dbh.classes.php";
    require_once "../classes/login.classes.php";
    require_once "../classes/login-contr.classes.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    header("location: ../index.php?error=none");
    exit();

} else {

    header("location: ../index.php");
    exit();

}