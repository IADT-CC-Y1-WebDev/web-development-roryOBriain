<?php

class student {
    protected $name;
    protected $number;

    private static $count = 0;

    private static $students = [];

    public function __construct($name, $num){
        $this->name = $name;
        $this->number = $num;
        if ( empty($num)==true){
            throw new Exception("Student num cant be empty");
        }
    
        // echo "Creating student: $name<br>";
        self::$count++;
        self::$students[$num] = $this;
    }

    public function __destruct() {
        echo "Student {$this->name} has been destroyed <br>";
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
    public static function getCount(){
        return count(self::$students);
    }

    public static function findAll(){
        return self::$students;
    }

    public static function findByNumber($num){
        return self::$students[$num] ?? null;
    }

    public function leave(){
        unset(self::$students[$this->number]);
    }
}
?>