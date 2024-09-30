<?php
//Check what server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4059119";
    $password = "p20050920!";
    $dbname = "s4059119";
}
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
