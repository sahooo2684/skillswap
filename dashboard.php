<?php 
include 'config/db.php';
include 'includes/header.php'; 

// Sample user data for demonstration purposes
$user_id = 1;  // Replace with session user ID if using sessions
$username = "John Doe"; // Replace with actual user data from session or database
?>
<style>
    /* Dashboard Styling */
.dashboard-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

section {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
}

section h3 {
    color: #0e76a8;
    margin-bottom: 10px;
}

section ul {
    list-style: none;
    padding: 0;
}

section li {
    margin-bottom: 10px;
    font-size: 0.95rem;
    color: #333;
}

section:hover {
    transform: scale(1.03);
}

section p {
    font-size: 0.95rem;
    color: #666;
    margin-top: 5px;
}

</style>
<h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
<div class="dashboard-content">

    <!-- Skill Points Balance -->
    <section id="skill-points">
        <h3>Your Skill Points</h3>
        <?php
        // Fetch skill points balance from the database
        $pointsQuery = "SELECT skill_points FROM users WHERE user_id = $user_id";
        $pointsResult = $conn->query($pointsQuery);
        $points = $pointsResult->fetch_assoc()['skill_points'] ?? 0;
        ?>
        <p>Current Balance: <strong><?php echo htmlspecialchars($points); ?></strong> Points</p>
    </section>

    <!-- Display My Matches -->
    <section id="my-matches">
        <h3>My Matches</h3>
        <?php
        // Fetch matches from the database
        $matchesQuery = "SELECT * FROM matches WHERE user_id = $user_id";
        $matchesResult = $conn->query($matchesQuery);
        
        if ($matchesResult->num_rows > 0) {
            echo "<ul>";
            while ($match = $matchesResult->fetch_assoc()) {
                echo "<li>Match with " . htmlspecialchars($match['match_name']) . " - Skill: " . htmlspecialchars($match['skill_name']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No matches found. Start exploring skills!</p>";
        }
        ?>
    </section>

    <!-- Upcoming Sessions -->
    <section id="upcoming-sessions">
        <h3>Upcoming Sessions</h3>
        <?php
        // Fetch upcoming sessions from the database
        $sessionsQuery = "SELECT * FROM sessions WHERE user_id = $user_id ORDER BY session_date ASC LIMIT 5";
        $sessionsResult = $conn->query($sessionsQuery);

        if ($sessionsResult->num_rows > 0) {
            echo "<ul>";
            while ($session = $sessionsResult->fetch_assoc()) {
                echo "<li>Session on " . date("F j, Y, g:i a", strtotime($session['session_date'])) . " with " . htmlspecialchars($session['partner_name']) . " - Mode: " . htmlspecialchars($session['mode']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No upcoming sessions. Schedule a session to start learning!</p>";
        }
        ?>
    </section>

    <!-- Notifications -->
    <section id="notifications">
        <h3>Notifications</h3>
        <?php
        // Fetch notifications from the database
        $notificationsQuery = "SELECT * FROM notifications WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 5";
        $notificationsResult = $conn->query($notificationsQuery);

        if ($notificationsResult->num_rows > 0) {
            echo "<ul>";
            while ($notification = $notificationsResult->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($notification['message']) . " - <small>" . date("F j, Y, g:i a", strtotime($notification['created_at'])) . "</small></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No new notifications.</p>";
        }
        ?>
    </section>

    <!-- Recommended Matches -->
    <section id="recommendations">
        <h3>Recommended Matches</h3>
        <?php
        $recommendationsQuery = "SELECT username, skill_preferences FROM users WHERE user_id != $user_id ORDER BY RAND() LIMIT 3";
        $recommendationsResult = $conn->query($recommendationsQuery);

        if ($recommendationsResult->num_rows > 0) {
            echo "<ul>";
            while ($recommendation = $recommendationsResult->fetch_assoc()) {
                $name = $recommendation['name'] ?? 'N/A';
                $skill = $recommendation['skill'] ?? 'N/A';
                echo "<li>Suggested Match: " . htmlspecialchars($name) . " - Skill: " . htmlspecialchars($skill) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No recommendations at the moment. Try updating your skill preferences.</p>";
        }
        ?>
    </section>

    <!-- Recent Activity -->
    <section id="recent-activity">
        <h3>Recent Activity</h3>
        <?php
        $activityQuery = "SELECT activity_description, activity_date FROM activities WHERE user_id = $user_id ORDER BY activity_date DESC LIMIT 5";
        $activityResult = $conn->query($activityQuery);

        if ($activityResult->num_rows > 0) {
            echo "<ul>";
            while ($activity = $activityResult->fetch_assoc()) {
                $description = $activity['activity_description'] ?? 'No description';
                $activityDate = date("F j, Y", strtotime($activity['activity_date']));
                echo "<li>" . htmlspecialchars($description) . " - <small>" . htmlspecialchars($activityDate) . "</small></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No recent activity.</p>";
        }
        ?>
    </section>

</div>

<?php include 'includes/footer.php'; ?>
