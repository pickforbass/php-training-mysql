<?php
session_start();

include "serverconn.php";
global $conn;

$_SESSION['username'] = $_POST['username'];
$pw = $_POST['password'];

$testname = 'SELECT username, firstname, password FROM user where username="' . $_SESSION['username'] . '"';

//check username
if ($conn->query($testname)){
    $result = $conn->query($testname);
    while($row = $result->fetch_assoc()){
        //check password
        if ($pw == $row['password']){
            $_SESSION['firstname'] = $row['firstname'];
            header('location: read.php');
        }else{
            echo "pb de mdp";
        }

    }
}else{
    echo "pb de username";
}



