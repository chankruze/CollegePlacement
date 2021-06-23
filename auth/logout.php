<?php
// start session
session_start();
// destroy current session
session_destroy();
// remove session data (if still present)
if (isset($_SESSION["username"])) {
    unset($_SESSION["lastname"]);
}
if (isset($_SESSION["userid"])) {
    unset($_SESSION["userid"]);
}
if (isset($_SESSION["usertype"])) {
    unset($_SESSION["usertype"]);
}
// redirect back to home
header('refresh:0;url=../index.php');
