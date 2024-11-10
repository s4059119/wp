<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

 $query = "SELECT petid, petname, age, type, location, image FROM pets";
 $result = mysqli_query($conn, $query);
?>

<section class="main-section-2">
        <div class="container">
            <div class="textContent2">
                <h3>Discover Pets Victoria</h3>
                <p>Pets Victoria is a dedicated pet adoption organisation based in Victoria, Austraia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organisation offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.</p>
            </div>
            <img src="images/pets.jpeg" alt="pets" class="pets">