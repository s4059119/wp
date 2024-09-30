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
<br>

        <div>
            <label for="PetDescription">Description: <span class="required">*</span></label>
            <input type="text" id="PetDescription" name="PetDescription" class="form-input" placeholder="Describe the pet briefly" required>
        </div>

        <br>

        <div class="file-upload">
            <label for="PetImage">Select an Image <span class="required">*</span></label>
            <input type="file" id="PetImage" name="PetImage" accept="image/*" required>
            <span class="image-size-info">Max image size: 500KB</span>
        </div>

        <br>

        <div>
            <label for="ImageCaption">Image Caption: <span class="required">*</span></label>
            <input type="text" id="ImageCaption" name="ImageCaption" class="form-input" placeholder="Describe the image in one word" required>
        </div>

        <br>

        <div>
            <label for="PetAge">Age (Months): <span class="required">*</span></label>
            <input type="number" id="PetAge" name="PetAge" class="form-input" placeholder="Age of a pet in months" required>
        </div>

        <br>

        <div>
            <label for="PetLocation">Location: <span class="required">*</span></label>
            <input type="text" id="PetLocation" name="PetLocation" class="form-input" placeholder="Location of the pet" required>
        </div>

        <br>

        <div class="button-position">
            <button type="submit" class="submit-form">
                <span class="material-icons">add_task</span> Submit
            </button>
            <button type="reset" class="clear-form">
                <span class="material-icons">close</span> Clear
            </button>
        </div>
    </form>
</main>
<?php        
include_once('includes/footer.inc');
?>
