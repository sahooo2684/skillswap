<?php
include 'config/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in
    $skill_id = intval($_POST['skill_id']);

    // Insert into completed courses
    $query = "INSERT INTO completed_courses (user_id, skill_id, completed_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $skill_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Course marked as completed!'); window.location.href='start_course.php?skill_id=$skill_id';</script>";
    } else {
        echo "<p>Error marking course as completed.</p>";
    }
}
?>
