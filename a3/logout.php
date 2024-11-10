<?php
session_start();
session_unset(); // Remove all session variables
session_destroy(); 
header("Location: index.php");
exit();
?>