<?php
session_start(); // Ensure the session is started
include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

$id = $_GET['id'];
$sql = "SELECT * FROM pets WHERE petid = $id";
$result = $conn->query($sql);

$row = mysqli_fetch_array($result);
