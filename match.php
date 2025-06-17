<?php 
include 'config/db.php'; 
include 'includes/header.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user_skills WHERE user_id = $user_id AND skill_type = 'Learn'";
$result = $conn->query($query);

while ($skill = $result->fetch_assoc()) {
    $skill_id = $skill['skill_id'];
    $match_query = "SELECT * FROM user_skills 
                    JOIN users ON user_skills.user_id = users.user_id 
                    WHERE skill_id = $skill_id AND skill_type = 'Teach'";
    $match_result = $conn->query($match_query);
    echo "<h3>Matches for " . htmlspecialchars($skill['skill_name']) . "</h3>";
    while ($match = $match_result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($match['username']) . "</p>";
        echo "<a href='messages.php?user_id=" . $match['user_id'] . "'>Message</a>";
    }
}

include 'includes/footer.php';
