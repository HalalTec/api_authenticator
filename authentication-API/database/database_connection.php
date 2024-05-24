<?php
// Database connection
$connect_db = new mysqli("localhost", "root", "", "api_authentication");

// Check connection
if ($connect_db->connect_error) {
    die("Connection failed: " . $connect_db->connect_error);
}