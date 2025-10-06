<?php
$host = "localhost";
$dbname = "esp_data";   // must match your database name in phpMyAdmin
$username = "espuser";  // the MySQL user you created
$password = "1234";     // the password you set

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Database connected"; // optional debug
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
