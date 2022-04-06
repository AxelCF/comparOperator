<?php
include '../util/connection.php';
include '../util/autoload.php';
$manager = new Manager;

if(isset($_POST['nameTo']) && isset($_POST['urlTo']) && isset($_POST['premium'])){
    $manager->createTourOperator($_POST['nameTo'], $_POST['urlTo'], $_POST['premium']);
    header('Location: ../adm.php');
}elseif (isset($_POST['nameTo']) && isset($_POST['urlTo'])) {
    $manager->createTourOperator($_POST['nameTo'], $_POST['urlTo'], $_POST['premium']=0);
    header('Location: ../adm.php');
}