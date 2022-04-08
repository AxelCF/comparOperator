<?php
include '../util/connection.php';
include '../util/autoload.php';
$manager = new Manager;
// var_dump($_POST['idOperator']);
if(isset($_POST['Nickname']) && isset($_POST['Comment']) && isset($_POST['Grades']) && isset($_POST['idOperator'])){
    $manager->createReview($_POST['Nickname'], $_POST['Comment'], $_POST['idOperator']);
    header('Location: ../review.php');
}   
