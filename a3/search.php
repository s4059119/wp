<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");
?>

<main class="container">
    <h3>Search for a Pet</h3>
    <form action="search.php" method="GET" class="form-inline">
        <input type="text" name="keyword" placeholder="Enter keyword" class="form-control mb-2 mr-sm-2" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
        
        <select name="type" class="form-control mb-2 mr-sm-2">
            <option value="">All Types</option>
            <?php
            // Populate dropdown with pet types from database
            $typesResult = $conn->query("SELECT DISTINCT type FROM pets");
            while ($row = $typesResult->fetch_assoc()) {
                echo '<option value="' . htmlspecialchars($row['type']) . '">' . htmlspecialchars($row['type']) . '</option>';
            }
            ?>
        </select>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
