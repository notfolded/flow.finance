<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// $conn = new mysqli('localhost','root','','','flow'); 

if($conn->connect_error){

    die("[ERROR: Could not connect]" . $conn->connect_error);

}


?>