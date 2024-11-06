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

        <select class="form-select mb-4 w-500 mx-auto" id="petType" onchange="filterByType()">
            <option value="">Select type...</option>
            <?php
            while ($type_row = mysqli_fetch_assoc($type_result)) {
                $type = htmlspecialchars($type_row['type']);
                $selected = ($selected_type === $type) ? "selected" : "";
                echo "<option value='$type' $selected>$type</option>";
            }
            ?>
        </select>

        <?php
        // Display pets based on selected type or all pets if no filter is applied
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='responsive'>";
                echo "<div class='gallery'>";
                echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['caption']) . "'>";
                echo "<div class='overlay'>";
                echo "<div class='text'>";
                echo "<i class='material-icons' style='font-size:36px'>search</i>";
                echo "<p><a href='details.php?id=" . $row['petid'] . "'>Discover more!</a></p>";
                echo "</div>";
                echo "</div>";
                echo "<div class='name'>" . htmlspecialchars($row['petname']) . "</div>"; // Changed 'name' to 'petname'
                echo "</div></div>";
            }
        } else {
            echo "<p>No pets available at the moment.</p>";
        }

    <script>
        function filterByType() {
            const selectedType = document.getElementById('petType').value;
            window.location.href = 'gallery.php?type=' + selectedType;
        }
    </script>

