<?php
include '../util/connection.php';
include '../util/autoload.php';
$manager = new Manager;

if(isset($_POST['operatorid'])){
    $manager->UpdateOperatorToPremium($_POST['operatorid']);
    header('Location: ../adm.php');
}