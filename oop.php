<?php
    class Car{  //class
        public $brand;  //attribute

        public function __construct($brand){    //constructor
            $this -> brand = $brand;
        }

        public function display(){
            echo $this -> brand;
        }
    }

    $car = new Car("Ferrari");  //object
    $car -> display();  //method call
?>
