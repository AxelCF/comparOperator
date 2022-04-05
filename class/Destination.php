<?php
class Destination{

    private $id;
    private $location;
    private $price;
    private $tourOperatorId;
    private $image;

    function __construct($data){
        $this->hydrate($data);
    }

    function getId(){
        return $this->id;
    }

    function getLocation(){
        return $this->location;
    }

    function getPrice(){
        return $this->price;

    }
    function getImage(){
        return $this->image;
    }

    function getTourOperateurId(){
        return $this->tourOperatorId;
    }
    private function hydrate($data){
        $this->id = $data['id'] ?? null;
        $this->location = $data['location'];
        $this->price = $data['MIN(price)'];
        $this->tourOperatorId = $data['tour_operator_id'];
        $this->image = $data['image_url'];
    }
}

?>