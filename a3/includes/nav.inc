
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a href="index.php" target="_blank">
            <img src="images/logo.png" alt="logo" class="logo">
        </a>
        
        <!-- Hamburger Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pets.php">Pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Add More</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="d-flex align-items-center ms-auto">
                <form action="search.php" method="GET" class="navSearch me-2">
                    <input type="text" name="keyword" placeholder="Search" class="search">
                    <button type="submit" style="display: none;"></button> <!-- Hidden button for submission -->
                </form>
                <img src="images/search.png" alt="search" class="search">
            </div>
        </div>
    </div>    
</nav>