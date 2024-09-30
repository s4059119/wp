<?php
$title = "Add Page";

include_once('includes/header.inc');
?>

<header>
    <?php
    include_once('includes/nav.inc');
    ?>
    <h4>Add a Pet</h4>
    <p class="p2">You can add a new pet here</p>
</header>

<main class="default-main">
    <form action="process_add.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="PetName">Pet Name: <span class="required">*</span></label>
            <input type="text" id="PetName" name="PetName" class="form-input" placeholder="Provide a name for the pet" required>
        </div>
        
        <br>

        <div>
            <label for="PetType">Type: <span class="required">*</span></label>
            <select id="PetType" name="PetType" class="form-input" required>
                <option value="" disabled selected>--Choose an option--</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
            </select>
        </div>

        
include_once('includes/footer.inc');
?>
