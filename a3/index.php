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

    <div class="bottom-section">
       
       <form action="search.php" method="GET">
           <div class="row align-items-center custom-row">
               <div class="col-md-5 col-12 mb-2 mb-md-0">
                   <input type="text" class="form-control" name="desc" placeholder="I am looking for...">
               </div>
               <div class="col-md-5 col-12 mb-2 mb-md-0">
                   <select class="form-select" name="type" required>
                       <option value="" disabled selected>Select pet type</option>
                       <option value="dog">Dogs</option>
                       <option value="cat">Cats</option>
                       <option value="other">Others</option>
                   </select>
               </div>
               <div class="col-md-2 col-12">
                   <button type="submit" class="btn btn-success w-100">Search</button>
               </div>
           </div>
       </form>

       <div class="container container-discover mt-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="fw-bold">Discover Pets Victoria</h2>
                    <p class="text-muted">
                        Pets Victoria is a dedicated pet adoption organization based in Victoria, Australia, focused on providing a safe and loving environment 
                        for pets in need. With a compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and 
                        other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The 
                        organization offers a range of services, including adoption counseling, pet education, and community support programs, all aimed at 
                        promoting responsible pet ownership and reducing the number of homeless animals.
                    </p>
                </div>
            </div>
        </div>
    </div> 

</main>

<?php
include('includes/footer.inc');
?>
    

       

    
