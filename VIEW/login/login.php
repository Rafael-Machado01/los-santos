<?php
include_once __DIR__ . "/../../DAL/User.php";
include_once __DIR__ . "/../../MODEL/User.php";

$login = $_POST["user"];
$password = $_POST["password"];
$md5 = md5($password);

if ($login == "" || $password == "") {
  header("location: ../index.php");
}
$dalUser = new \DAL\User();
$user = $dalUser->SelectByUser($login);

if ($md5 == $user->getPassword()) {
  session_start();
  $_SESSION["login"] = $login;
  header("location: ../home.php");
} else {
  header("location: ../index.php");
}
?>
