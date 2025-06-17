<?php 
include 'config/db.php'; 
include 'includes/header.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM notifications WHERE user_id = $user_id";
$result = $conn->query($query);

echo "<h2>Notifications</h2>";
while ($notification = $result->fetch_assoc()) {
    echo "<p>" . htmlspecialchars($notification['message']) . "</p>";
    if (!$notification['is_read']) {
        $update_query = "UPDATE notifications SET is_read = 1 WHERE notification_id = " . $notification['notification_id'];
        $conn->query($update_query);
    }
}

include 'includes/footer.php';
