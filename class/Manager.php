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
            $rlt['price'] = $rlt['MIN(price)'];
            array_push($allDestination, new Destination($rlt));
        }
        // echo '<pre>';
        // var_dump($allDestination);
        // echo '</pre>';
        return $allDestination;
        
    }
    function getImageDestination($iddesination){
        $result = $this->bdd->query('SELECT image_url FROM destination WHERE location = "$iddesination"');
        $result = $result->fetch();
        return new Destination($result);
        
    }

    function getOperatorByDestination($destinationId){
        
        $result = $this->bdd->query("SELECT * FROM tour_operator INNER JOIN destination ON tour_operator.id=destination.tour_operator_id WHERE destination.id='$destinationId'");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);

        // return $allOperator;
        // var_dump($allOperator);
    }
        function getDestinationByLocation($location){
        $result = $this->bdd->query("SELECT * FROM destination INNER JOIN tour_operator ON tour_operator.id=destination.tour_operator_id WHERE destination.location='$location'");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $allOperator = [];
        foreach($result as $rlt){
            $destination = new Destination($rlt);
            $tourOperator = new TourOperator($rlt);
            $destination->setTourOperator($tourOperator);
            array_push($allOperator, $destination);
        }
        return $allOperator;
        // var_dump($allOperator);
    }
//    function getImageByLocation($location){
  //      $result = $this->bdd->query("SELECT * FROM destination WHERE destination.location='$location'") ;
 
    //}
   
    function createReview($auteur, $msg, $TOid){
        $send = $this->bdd->prepare("INSERT INTO `review`(`message`, `author`, `tour_operator_id`) VALUES (?, ?, ?)");
        $send->execute([$msg, $auteur, $TOid]);
    }
    
    function getReviewByOperatorId($operatorId){
        $result = $this->bdd->query("SELECT * FROM review WHERE tour_operator_id = '$operatorId'");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $allOperator = [];
        foreach($result as $rlt){
            array_push($allOperator, new Review($rlt));
        }
        return $allOperator;

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

    function areAllOperatorPremium(){
        $premium = $this->bdd->query("SELECT * FROM tour_operator WHERE is_premium=0");
        $premium = $premium->fetch();
        return $premium;
    }

}

$req = new Manager();
// $req->getAllDestination();
$req->getOperatorByDestination(4);
