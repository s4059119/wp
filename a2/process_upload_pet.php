<?php

require_once('includes/db_connect.inc');


function validateInput($str) {
    return trim($str);
}


function sanitizeFileName($str) {
   
    $str = preg_replace('/[^a-zA-Z0-9_-]/', '', $str);
    
    return substr($str, 0, 50);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $petName = validateInput($_POST['PetName']);
    $petType = validateInput($_POST['PetType']);
    $petDescription = validateInput($_POST['PetDescription']);
    $petImage = $_FILES['PetImage'];
    $imageCaption = validateInput($_POST['ImageCaption']);
    $petAge = validateInput($_POST['PetAge']);
    $petLocation = validateInput($_POST['PetLocation']);

   
    if ($petImage['error'] !== 0) {
        $uploadError = "Error uploading image: " . $petImage['error'];
    } else {
       
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = pathinfo($petImage['name'], PATHINFO_EXTENSION);
        if (!in_array($imageExtension, $allowedExtensions)) {
            $uploadError = "Only JPG, JPEG and PNG images are allowed.";
        } else {
          
            $maxSize = 500000; 
            if ($petImage['size'] > $maxSize) {
                $uploadError = "Image size exceeds the limit of 500KB.";
            } else {
               
                $sanitizedPetName = sanitizeFileName($petName);

                
                $targetDir = "images/";
                $fileName = $sanitizedPetName . '.' . $imageExtension;
                $targetFile = $targetDir . $fileName;
                $i = 1;
                
                
                while (file_exists($targetFile)) {
                    $fileName = $sanitizedPetName . '-' . $i . '.' . $imageExtension;
                    $targetFile = $targetDir . $fileName;
                    $i++;
                }

                if (move_uploaded_file($petImage['tmp_name'], $targetFile)) {
                   
                } else {
                    $uploadError = "Failed to upload image.";
                }
            }
        }
    }
