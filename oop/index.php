<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas OOP</title>
</head>

<body>
    <?php require_once("animal.php"); ?>
    <?php require_once("Frog.php"); ?>
    <?php require_once("Ape.php"); ?>
    <?php 
        echo "<br>";
        $sungokong = new Ape("kera sakti", 2, "no");
        echo "Name : ".$sungokong->name . "<br>";
        echo "Legs : ".$sungokong->legs . "<br>";
        echo "Cold Blooded : ".$sungokong->cold_blooded . "<br>";
        $sungokong->yell(); // "Auooo"


        echo "<br><br>";
        $kodok = new Frog("buduk", 4, "No");
        echo "Name : " . $kodok->name . "<br>";
        echo "Legs : ". $kodok->legs . "<br>";
        echo "Cold Blooded : ". $kodok->cold_blooded . "<br>";
        $kodok->jump() ; // "hop hop"
    ?>
</body>

</html>