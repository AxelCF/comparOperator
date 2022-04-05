<?php
session_start();
//Connexion à la base de donnees
include 'pdo.php';
if(isset($_POST['submit'])){

//Insertion de message à l'aide d'une requête préparée
$req = $bdd->prepare("INSERT INTO message (message, idutilisateur) VALUES(?,?)");
$req->execute(array($_POST['message']));

header('Location: ../index.php');
}else{
    echo 'error';
}
