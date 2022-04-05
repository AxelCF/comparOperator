<?php
var_dump('');

class Review{

    private $id;
    private $message;
    private $author;
    private $tourOperatorId;

    function __construct($data){
        $this->hydrate($data);
    }

    function getId(){
        return $this->id ;
    }

    function getMessage(){
        return $this->message;
    }

    function getAuthor(){
        return $this->author;
    }

    function getTourOperatorId(){
        return $this->tourOperatorId;
    }
    private function hydrate($data){
        $this->id = $data['id'] ?? null;
        $this->message = $data['message'];
        $this->author = $data['author'];
        $this->tourOperatorId = $data['tour_operator_id'];
    }
}

?>