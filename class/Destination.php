<?php

class Destination{

    private $id;
    private $location;
    private $price;
    private $tourOperatorId;

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

    function getTourOperateurId(){
        return $this->tourOperatorId;
    }
    private function hydrate($data){
        $this->id = $data['id'] ?? null;
        $this->location = $data['location'];
        $this->price = $data['price'];
        $this->tourOperatorId = $data['tour_operator_id'];
    }
}

?>