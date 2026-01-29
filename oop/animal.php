<?php

/*
    Buatlah class Frog dan class Ape yang merupakan inheritance 
    dari class Animal. Masing-masing class dibuat ke dalam 
    satu file (Frog.php & Ape.php). Perhatikan 
    bahwa Ape (Kera) merupakan hewan berkaki 2, hingga dia tidak menurunkan sifat jumlah kaki 4. class Ape memiliki function yell() yang mengeprint “Auooo” dan class Frog memiliki function jump() yang akan mengeprint “hop hop”.

 

// index.php
$sungokong = new Ape("kera sakti");
$sungokong->yell() // "Auooo"

$kodok = new Frog("buduk");
$kodok->jump() ; // "hop hop"
*/

class Animal{
    public $name;
    public $legs;
    public $cold_blooded;

    public function __construct($name, $legs, $cold_blooded) {
        $this->name = $name;
        $this->legs = $legs;
        $this->cold_blooded = $cold_blooded;
    }
}



$sheep = new Animal("shaun", 4, "no");

echo "Name : ". $sheep->name . "<br>"; // "shaun"
echo "Legs : ". $sheep->legs . "<br>"; // 4
echo "Cold Blooded : ". $sheep->cold_blooded . "<br>"; // "no"


// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())
