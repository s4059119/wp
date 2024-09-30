<?php

require_once('includes/db_connect.inc');


function validateInput($str) {
    return trim($str);
}


function sanitizeFileName($str) {
   
    $str = preg_replace('/[^a-zA-Z0-9_-]/', '', $str);
    
    return substr($str, 0, 50);
}
