<?php
$servername = 'localhost';
$username = 'root';
$pw = '';
$dbname = 'reunion_island';

$conn = new mysqli($servername, $username, $pw);

if($conn->connect_error){
    echo 'erreur connexion';
}else{
    $conn->select_db($dbname);
}


