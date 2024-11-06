<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

// Fetch all distinct types from the pets table
$type_sql = "SELECT DISTINCT type FROM pets";
$type_result = mysqli_query($conn, $type_sql);
