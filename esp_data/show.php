<?php
include "db_config.php";

try {
    $stmt = $conn->query("SELECT * FROM logs ORDER BY created_at DESC");
    echo "<h2>NFC Logs</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>
    <tr>
        <th>ID</th>
        <th>Tag UID</th>
        <th>ID Number</th>
        <th>Name</th>
        <th>Status</th>
        <th>Timestamp</th>
    </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['tag_uid']}</td>
            <td>{$row['id_number']}</td>
            <td>{$row['name']}</td>
            <td>{$row['status']}</td>
            <td>{$row['created_at']}</td>
        </tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
