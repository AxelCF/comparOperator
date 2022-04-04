<?php
include './partials/header.php';
include './util/connection.php';
include './util/autoload.php';
$manager = new Manager;
$rltOperator = $manager->getOperatorByDestination($_GET['id']);
?>