<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uid'])) {
        $tag_uid = $_POST['uid'];

        // Lookup user from users table
        $stmt = $conn->prepare("SELECT id_number, name, status FROM users WHERE uid = ?");
        $stmt->execute([$tag_uid]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Insert log with UID + user details
            $insert = $conn->prepare("INSERT INTO logs (tag_uid, id_number, name, status) VALUES (?, ?, ?, ?)");
            $insert->execute([$tag_uid, $user['id_number'], $user['name'], $user['status']]);

            echo "Log inserted successfully for " . $user['name'];
        } else {
            echo "No user found for UID: " . $tag_uid;
        }
    } else {
        echo "Missing UID field.";
    }
} else {
    echo "Invalid request.";
}
?>
