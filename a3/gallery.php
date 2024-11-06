<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

// Fetch all distinct types from the pets table
$type_sql = "SELECT DISTINCT type FROM pets";
$type_result = mysqli_query($conn, $type_sql);

// Fetch all pets for display or based on selected type
$selected_type = isset($_GET['type']) ? $_GET['type'] : '';
$pet_sql = "SELECT petid, petname, image, caption FROM pets"; // Changed 'name' to 'petname'
if ($selected_type) {
    $pet_sql .= " WHERE type = ?";
    $stmt = $conn->prepare($pet_sql);
    $stmt->bind_param("s", $selected_type);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = mysqli_query($conn, $pet_sql);
}
?>

<section class="main-section-4">
    <div class="container">
        <div class="textContent4">
            <h3>Pets Victoria has a lot to offer!</h3>
            <p>For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
        </div>
