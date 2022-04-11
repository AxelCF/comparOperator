<?php
try
    {
        $bdd = new PDO('sqlite:'.__DIR__.'/../db.sqlite3');
    }
    catch(Exception $e)
    {
        var_dump($e);
        die('Erreur : '.$e->getMessage());
    } 
?>