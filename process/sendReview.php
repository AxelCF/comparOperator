<?php
include '../util/connection.php';
include '../util/autoload.php';
$manager = new Manager;
// var_dump($_POST['idOperator']);
if(isset($_POST['Nickname']) && isset($_POST['Comment']) && isset($_POST['idOperator'])
    && !empty($_POST['Nickname']) && !empty($_POST['Comment']) && !empty($_POST['idOperator'])){
    $manager->createReview($_POST['Nickname'], $_POST['Comment'], $_POST['idOperator']);
    header('Location: ../review.php?idOperator=' .$_POST['idOperator']);
}else{
    header('Location: ../review.php?idOperator=' .$_POST['idOperator']);
}