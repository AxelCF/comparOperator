<?php

class Review{

    private $id;
    private $message;
    private $author;
    private $tourOperatorId;

    function __construct($data){
        
    }

    function getId(){

    }

    function getMessage(){
        
    }

    function getAuthor(){
        
    }

    function getTourOperatorId(){
        
    }
    private function hydrate($data){
        $this->id = $data['id'] ?? null;
        $this->message = $data['message'];
        $this->author = $data['author'];
        $this->tourOperatorId = $data['tourOperatorId'];
    }
}

?>