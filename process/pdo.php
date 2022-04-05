<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('erreur : '.$e->getMessage());
}