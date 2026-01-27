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
    
        // echo "Creating student: $name<br>";
    }

    public function __destruct() {
        echo "Student {$this->name} has left the system <br>";
    }

    public function getName(){
        return $this->name;
    }

    public function getNumber(){
        return $this->number;
    }

    public function __toString() {
        $format = "Student: %s (%s)";
        return sprintf($format, $this->name, $this->number);
    }   
}
?>