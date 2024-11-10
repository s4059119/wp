<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

 $query = "SELECT petid, petname, age, type, location, image FROM pets";
 $result = mysqli_query($conn, $query);
?>
