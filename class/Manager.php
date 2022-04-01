<?php

class Manager{

    private $bdd;
    private $review;
    public $destination;
    public $operator;

    function __construct(){
        include '../util/connection.php';
        $this->bdd = $bdd;
    }

    function getAllDestination(){
        $result = $this->bdd->query('SELECT * FROM destination');
        $result = $result->fetchAll();
        
        var_dump($result);
    }

    function getOperatorByDestination($destination){
        
        $result = $this->bdd->query("SELECT location FROM destination WHERE location = '$destination'");
        $result = $result->fetchAll();
        var_dump($result);

        
    }
    
    function createReview(){
        $send = $this->bdd->query("INSERT INTO reveiw(`message`) VALUES (?)");
    }
    
    function getReviewByOperatorId(){
        
    }
    
    function getAllOperator(){
        
    }

    function UpdateOperatorToPremium(){
        
    }
    
    function createTourOperator(){
        
    }
    
    function createDestination(){
        
    }
}

$req = new Manager();
$req->getAllDestination();
$req->getOperatorByDestination('Rome');
?>