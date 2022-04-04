<?php

class Touroperateur{

    private $id;
    private $name;
    private $link;
    private $gradeCount;
    private $gradeTotal;
    private $isPremium;

    function __construct($data){

    }

    function getId(){
        return $this->id;
    }

    function getName(){

    }

    function getLink(){

    }

    function getGradecount(){

    }

    function getTotal(){

    }

    function getGrade(){

    }

    function getIsPremium(){

    }
    private function hydrate($data){
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->link = $data['link'];
        $this->gradeCount = $data['gradeCount'];
        $this->gradeTotal = $data['gradeTotal'];
        $this->isPremium = $data['isPremium'];
    }

}



?>