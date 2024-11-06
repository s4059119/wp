<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

if (isset($_SESSION['usrmsg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['usrmsg']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['usrmsg']); ?>
<?php endif; ?>

<main class="main1">
    <div class="container">
        <div class="textContent1">
            <h1>PETS VICTORIA</h1>
            <h2>WELCOME TO PET <br>ADOPTION</h2>
        </div>
        <div id="petCarousel" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">

            <!-- Indicators -->
            <div class="carousel-indicators">
                <?php
                $indicatorIndex = 0;
                // Change the ordering column to an existing one, e.g., 'petid'
                $sql = "SELECT image FROM pets ORDER BY petid DESC LIMIT 4"; // Adjust 'petid' as necessary
                $result = $conn->query($sql);

                while ($indicatorIndex < $result->num_rows) {
                    echo '<button type="button" data-bs-target="#petCarousel" data-bs-slide-to="' . $indicatorIndex . '"';
                    echo ($indicatorIndex === 0) ? ' class="active" aria-current="true"' : '';
                    echo '></button>';
                    $indicatorIndex++;
                }
                ?>
            </div>
