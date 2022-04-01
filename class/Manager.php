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
        $send = $this->bdd->query("INSERT INTO `review`(`message`, `author`, `tour_operator_id`) VALUES (?, ?, ?)");
    }
    
    function getReviewByOperatorId($operatorId){
        $get = $this->bdd->query("SELECT * FROM `review` WHERE `tour_operator_id` = '$operatorId'");

    }
    
    function getAllOperator(){
        $get = $this->bdd->query("SELECT 'name', 'link' FROM tour_operator");
    }

    function UpdateOperatorToPremium($operatorId){
        $get = $this->bdd->query("UPDATE 'tour_operator' SET `is_premium` = 1 WHERE `tour_operator_id` = '$operatorId'");
    }
    
    function createTourOperator(){
        $create = $this->bdd->query("INSERT INTO `tour_operator`(`name`, `link`, `grade_count`, `grade_total`, `is_premium`) VALUES  (?, ?, ?, ?, ?)");
    }
    
    function createDestination(){
        $create = $this->bdd->query("INSERT INTO `destination`(`location`, `price`, `tour_operator_id`) VALUES(?, ?, ?)");
    }
}

$req = new Manager();
$req->getAllDestination();
$req->getOperatorByDestination('Rome');
?>