<?php
//Check what server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "petsvictoria";
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4059119";
    $password = "helloworld";
    $dbname = "s4059119";
}