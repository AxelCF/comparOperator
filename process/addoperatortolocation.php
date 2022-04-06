<?php
include '../util/connection.php';
include '../util/autoload.php';
$manager = new Manager;
var_dump($_POST['price']);
if(isset($_POST['locations']) && isset($_POST['price']) && isset($_POST['nameOperator'])){
    $manager->updateOperator($_POST['locations'], $_POST['price'], $_POST['nameOperator']);
    header('Location: ../adm.php');
}