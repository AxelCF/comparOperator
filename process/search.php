<?php
include '../util/connection.php';
include '../util/autoload.php';
$search = $_POST['Search'];
    // var_dump($search);
    // die;
$sql = "SELECT * FROM destination WHERE location LIKE '%".$search."%'";
$result = $bdd->query($sql);
$rlt = $result->fetch();

if ($rlt) {
    header('Location: ../page.php?id='.$rlt['id'].'&location='.$rlt['location'].'');

}else{
    header('Location: ../index.php');
}

