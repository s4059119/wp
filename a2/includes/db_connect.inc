<?php

$db_server = "talsprddb02.int.its.rmit.edu.au";
$db_username = "s4059119";
$db_password = "p20050920!";
$db_name = "pets";

$connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if (!$connection) {
    die("Could not connect: " . mysqli_connect_error());
}