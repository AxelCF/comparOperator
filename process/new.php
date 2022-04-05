<?php

session_start();
include 'pdo.php';
$req = $bdd->prepare('INSERT INTO utilisateur (pseudo, password, email) VALUES(?, ?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['password'], $_POST['email']));

$_SESSION['email']= $_POST['email'];
$_SESSION['pseudo']= $_POST['pseudo'];

header('Location: ../index.php');



?>