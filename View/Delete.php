<?php


include '../Controller/UserC.php';

session_start();


if(isset($_SESSION['email']))
{
    header('location:profile.php');
}

$userC = new UserC();
$userC->deleteUser($_GET["idUser"]);
header('Location:ListUsers.php');


?>