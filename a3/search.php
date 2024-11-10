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

    <div class="main-section-4">
        <div class="clearfix">
            <?php
            // Check if the form has been submitted and the required keys are set
            if (isset($_GET['keyword']) || isset($_GET['type'])) {
                // Check if the keyword is set before using it
                $keyword = isset($_GET['keyword']) ? "%" . $_GET['keyword'] . "%" : "%";
                $type = isset($_GET['type']) ? $_GET['type'] : ''; // Check if 'type' is set

                // Prepare and execute the search query with filtering by type and keyword
                $query = "SELECT * FROM pets WHERE (petname LIKE ? OR description LIKE ?)";
                $params = [$keyword, $keyword];

                if (!empty($type)) {
                    $query .= " AND type = ?";
                    $params[] = $type;
                }

                $stmt = $conn->prepare($query);
                $stmt->bind_param(str_repeat('s', count($params)), ...$params);
                $stmt->execute();
                $result = $stmt->get_result();
