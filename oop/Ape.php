<?php 

/*
$kodok = new Frog("buduk");
$kodok->jump() ; // "hop hop"
*/

class Ape{
    public $name;
    public $legs;
    public $cold_blooded;
    
    public function __construct($name, $legs, $cold_blooded) {
        $this->legs = $legs;
        $this->name = $name;
        $this->cold_blooded = $cold_blooded;
    }

    public function yell(){
        $yell = "Auoooo";
        echo "yell : {$yell} \n" ;
    }
}
?>