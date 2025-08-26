<?php 

$connex = mysqli_connect('localhost','root', 'admin1234', 'project', 3306);

if(mysqli_connect_error()){
    echo "Erreur de connexion " . mysqli_connect_error();
    exit();
}

// echo "ok";
mysqli_set_charset($connex, "utf8");
?>
