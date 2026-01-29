<?php 

/*
$kodok = new Frog("buduk");
$kodok->jump() ; // "hop hop"
*/

class Frog{
    public $name;
    public $legs;
    public $cold_blooded;
    
    public function __construct($name, $legs, $cold_blooded) {
        $this->legs = $legs;
        $this->name = $name;
        $this->cold_blooded = $cold_blooded;
    }

    public function jump(){
        $jump = "Hop Hop";
        echo "Jump : {$jump} \n";
    }
}
?>