<?php

////Local Datenbank
//$servername = "localhost";
//$username = "dev";
//$password = "dev";
//$dbname = "test";

//Live Datenbank
$servername  = "";
$dbname   = "";
$username  = "";
$password   = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM kontakte';
$result = $conn->query($sql);

