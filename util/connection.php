<?php
try
    {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=comparo_simple', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    catch(Exception $e)
    {
        var_dump($e);
        die('Erreur : '.$e->getMessage());
    }

    
?>