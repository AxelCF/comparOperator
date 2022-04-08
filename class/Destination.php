<?php
class Destination{

    private $id;
    private $location;
    private $price;
    private $tourOperatorId;
    private $tourOperator;
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
        $this->price = $data['price'];
        $this->tourOperatorId = $data['tour_operator_id'];
        $this->image = $data['image_url'];
    }

    public function getTourOperator() {
        return $this->tourOperator; 
    }

    public function setTourOperator($tourOperator) {
        $this->tourOperator = $tourOperator;
    }
}

?>