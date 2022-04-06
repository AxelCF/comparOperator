<?php
class Manager{

    private $bdd;
    private $review;
    public $destination;
    public $operator;

    function __construct(){
        include __DIR__ . '/../util/connection.php';
        $this->bdd = $bdd;
    }

    function getAllDestination(){
        $result = $this->bdd->query('SELECT id, location, MIN(price), tour_operator_id, image_url FROM destination GROUP BY location ORDER BY MIN(price) ASC');
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $allDestination = [];
        foreach($result as $rlt){
            array_push($allDestination, new Destination($rlt));
        }
        // echo '<pre>';
        // var_dump($allDestination);
        // echo '</pre>';
        return $allDestination;
        
    }

    function getOperatorByDestination($destinationId){
        
        $result = $this->bdd->query("SELECT * FROM tour_operator INNER JOIN destination ON tour_operator.id=destination.tour_operator_id WHERE destination.id='$destinationId'");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        // return $allOperator;
        // var_dump($allOperator);
    }
        function getOperatorsByLocation($location){
        $result = $this->bdd->query("SELECT * FROM tour_operator INNER JOIN destination ON tour_operator.id=destination.tour_operator_id WHERE destination.location='$location'");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $allOperator = [];
        foreach($result as $rlt){
            array_push($allOperator, new TourOperator($rlt));
        }
        return $allOperator;
        // var_dump($allOperator);
    }
//    function getImageByLocation($location){
  //      $result = $this->bdd->query("SELECT * FROM destination WHERE destination.location='$location'") ;
 
    //}
   
    function createReview(){
        $send = $this->bdd->query("INSERT INTO `review`(`message`, `author`, `tour_operator_id`) VALUES (?, ?, ?)");
    }
    
    function getReviewByOperatorId($operatorId){
        $get = $this->bdd->query("SELECT * FROM `review` WHERE `tour_operator_id` = '$operatorId'");

    }
    
    function getAllOperator(){
        $result = $this->bdd->query("SELECT * FROM tour_operator");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $allOperator = [];
        foreach($result as $rlt){
            array_push($allOperator, new TourOperator($rlt));
        }
        // echo '<pre>';
        // var_dump($allDestination);
        // echo '</pre>';
        return $allOperator;
    }

    function UpdateOperatorToPremium($operatorId){
        $get = $this->bdd->prepare("UPDATE tour_operator SET is_premium=1 WHERE id = '$operatorId'");
        $get->execute();
    }
    
    function createTourOperator($name, $url, $isPremium){
        $create = $this->bdd->prepare("INSERT INTO `tour_operator`(`name`, `link`, `is_premium`) VALUES  (?,?,?)");
        $create->execute([$name, $url, $isPremium]);
    }
    function updateOperator($location, $price, $operatorId){
        $update = $this->bdd->prepare("INSERT INTO `destination`(`location`, `price`, `tour_operator_id`) VALUES(?, ?, ?) ");
        $update->execute([$location, $price, $operatorId]);
    }
    
    function createDestination(){
        $create = $this->bdd->query("INSERT INTO `destination`(`location`, `price`, `tour_operator_id`) VALUES(?, ?, ?)");
    }

}

$req = new Manager();
// $req->getAllDestination();
$req->getOperatorByDestination(4);
