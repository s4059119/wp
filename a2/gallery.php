<?php

include('includes/db_connect.inc');

$title = "Gallery";


include_once('includes/header.inc');


$sql = "SELECT petid, petname, image FROM pets";
$result = $connection->query($sql);

if (!$result) {
    die("Database query failed: " . $conn->error);
}
?>

<header>
    <?php
    
    include_once('includes/nav.inc');
    ?>

        <h5 class="h3">Pets Victoria has a lot to offer!</h5>
            <p class="p3">For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into
                mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need
                of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
    </header>
<main class="default-main">
    <div class="gallery-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="responsive">
                <div class="gallery-item">
                    <a href="details.php?petid=<?php echo $row['petid']; ?>">
                        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['petname']); ?>" class="gallery-image">
                        <div class="overlay">
                            <span class="gallery-search-icon material-icons">search</span>
                            <u>Discover more!</u>
                        </div>
                    </a>
                    <div class="desc"><?php echo htmlspecialchars($row['petname']); ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>
    
<?php

include_once('includes/footer.inc');

$connection->close();
?>
