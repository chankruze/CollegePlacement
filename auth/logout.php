<?php
session_start();
session_destroy();
// Removing session data
if (isset($_SESSION["username"])) {
    unset($_SESSION["lastname"]);
}
if (isset($_SESSION["userid"])) {
    unset($_SESSION["userid"]);
}
if (isset($_SESSION["usertype"])) {
    unset($_SESSION["usertype"]);
}
header('refresh:0;url=../index.php');
