<?php
class TourOperator{

    private $id;
    private $name;
    private $link;
    private $gradeCount;
    private $gradeTotal;
    private $isPremium;

    function __construct($data){
        $this->hydrate($data);

    }

    function getId(){
        return $this->id;
    }

    function getName(){
        return $this->name;
    }

    function getLink(){
        return $this->link;
    }

    function getGradecount(){
        return $this->gradeCount;
    }

    function getTotal(){
        return $this->gradeTotal;
    }

    // function getGrade(){
    //     return $this->grade;
    // }

    function getIsPremium(){
        return $this->isPremium;
    }
    function imageTour(){
        return $this->imageTour;
    }
    private function hydrate($data){
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->link = $data['link'];
        $this->gradeCount = $data['grade_count'];
        $this->gradeTotal = $data['grade_total'];
        $this->isPremium = $data['is_premium'];
        $this->imageTour = $data['image_tour'];
    }

}

?>