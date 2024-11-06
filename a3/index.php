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

            <div class="carousel-inner">
                <?php
                $isActive = true;
                $result->data_seek(0);  // Reset query pointer to the start
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '">';
                    echo '<img src="images/' . htmlspecialchars($row['image']) . '" class="d-block w-100" alt="Pet image">';
                    echo '</div>';
                    $isActive = false;
                }

                $conn->close();
                ?>
            </div>
          
            <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    
