<?php             //connection to the database
$server = 'db';         //servername
$username = 'root';     //username
$password = 'csym019';       //password
$schema = 'GoodFoodRecipes';    //The name of the database
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>