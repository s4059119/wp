<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

// Get pet ID from URL parameter
$id = $_GET['id'];

// Fetch current pet details from the database
$stmt = $conn->prepare("SELECT * FROM pets WHERE petid = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$pet = $result->fetch_assoc();

if (!$pet) {
    echo "Pet not found!";
    exit();
}

$oldImage = $pet['image'];

// Process form submission for updating pet details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petname = $_POST['petname'];
    $description = $_POST['description'];
    $caption = $_POST['caption'];
    $age = (float) $_POST['age'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $username = $_SESSION['username'];
    $image = $oldImage;

    // Handle image upload if a new file is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target_file = "images/" . basename($image);

        // Validate the image file
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        // Move the new image to the images folder
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die("There was an error uploading your file.");
        }

        // Delete the old image file if a new one was uploaded
        if (file_exists("images/" . $oldImage) && $oldImage !== $image) {
            unlink("images/" . $oldImage);
        }
    }

    // Update pet details
    $stmt = $conn->prepare("UPDATE pets SET petname = ?, description = ?, caption = ?, age = ?, type = ?, location = ?, image = ?, username = ? WHERE petid = ?");
    $stmt->bind_param("sssissssi", $petname, $description, $caption, $age, $type, $location, $image, $username, $id);

    if ($stmt->execute()) {
        echo "Pet details updated successfully!";
        header('Location: pets.php'); // Redirect to the pets page after successful update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

mysqli_close($conn);
?>

<section class="main-section-3">
    <div class="container">
        <div class="textContent3">
            <h3>Edit Pet Details</h3>
            <p>Edit the details of your pet below.</p>
        </div>
        <form action="edit.php?id=<?= htmlspecialchars($id) ?>" class="addpetform" method="post" enctype="multipart/form-data">
            <label for="petname">Pet Name:</label>
            <input type="text" id="petname" name="petname" value="<?= htmlspecialchars($pet['petname']) ?>" required>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="">--Choose an option--</option>
                <option value="Dog" <?= $pet['type'] == 'Dog' ? 'selected' : '' ?>>Dog</option>
                <option value="Cat" <?= $pet['type'] == 'Cat' ? 'selected' : '' ?>>Cat</option>
                <option value="Small Animal" <?= $pet['type'] == 'Small Animal' ? 'selected' : '' ?>>Small Animal</option>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($pet['description']) ?></textarea>

            <label for="image">Select a New Image (optional):</label>
            <input type="file" id="image" name="image"><br><br>

            <label for="caption">Image Caption:</label>
            <input type="text" id="caption" name="caption" value="<?= htmlspecialchars($pet['caption']) ?>" required>

            <label for="age">Age (months):</label>
            <input type="text" id="age" name="age" value="<?= htmlspecialchars($pet['age']) ?>" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?= htmlspecialchars($pet['location']) ?>" required>
                          
            <div class="button-group">
                <button type="submit" class="btn submit-btn">Update</button>
                <button type="reset" class="btn clear-btn">Clear</button>
            </div>
        </form>
    </div>
</section>

<?php
include('includes/footer.inc');
?>

