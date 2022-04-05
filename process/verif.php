<?php

session_start();

include 'pdo.php';
// On suppose que $pseudo contient le pseudo du nouvel inscrit sécurisé (avec htmlspecialchars, strip_tags, etc.) et $bdd la connexion PDO à ta base de données
$pseudoDejaPris = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = ?');
$pseudoDejaPris->execute(array($_POST['pseudo']));
$pseudoDejaPris = $pseudoDejaPris->fetchColumn(); // Ici, soit le pseudo est déjà pris et $pseudoDejaPris contient 1 (du "SELECT 1"), soit il est libre et $pseudoDejaPris contient false
// Il n'y a donc plus qu'à tester la variable et afficher une erreur si le pseudo est déjà pris
if (!$pseudoDejaPris) {
    

    $req = $bdd->prepare('INSERT INTO utilisateur (pseudo, password, email) VALUES(?, ?, ?)');
    $req->execute(array($_POST['pseudo'], $_POST['password'], $_POST['email']));

    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pseudo'] = $_POST['pseudo'];

    header('Location: ../index.php');
} else {
    echo "Ce pseudo est déjà utilisé... ";
    echo "Veuillez sélectionner un autre pseudo <br/>";
    echo "Retour à la page d'" ?><a href="../inscription.php">inscription</a><?php
}
?>