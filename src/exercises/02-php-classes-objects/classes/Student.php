<?php

class student {
    protected $name;
    protected $number;

    public function __construct($name, $num){
        $this->name = $name;
        $this->number = $num;
        if ( empty($num)==true){
            throw new Exception("Student num cant be empty");
        }
        
    }

    public function getName(){
        return $this->name;
    }

    public function getNumber(){
        return $this->number;
    }
}   

?>