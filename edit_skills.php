<?php 
include 'config/db.php'; 
include 'includes/header.php'; 

// Check if skill ID is provided in the URL
if (!isset($_GET['skill_id']) || empty($_GET['skill_id'])) {
    echo "Invalid skill ID.";
    exit();
}

$skill_id = $_GET['skill_id'];

// Fetch the skill details from the database
$query = "SELECT * FROM skills WHERE skill_id = $skill_id";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Skill not found.";
    exit();
}

$skill = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $skill_name = $_POST['skill_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $points_value = $_POST['points_value'];
    $popularity = $_POST['popularity'];
    $level = $_POST['level'];
    $location = $_POST['location'];
    $availability = $_POST['availability'];

    // Update query
    $updateQuery = "UPDATE skills 
                    SET skill_name = ?, 
                        description = ?, 
                        category = ?, 
                        points_value = ?, 
                        popularity = ?, 
                        level = ?, 
                        location = ?, 
                        availability = ?
                    WHERE skill_id = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param(
        "sssissssi", 
        $skill_name, 
        $description, 
        $category, 
        $points_value, 
        $popularity, 
        $level, 
        $location, 
        $availability, 
        $skill_id
    );

    if ($stmt->execute()) {
        echo "<p class='success'>Skill updated successfully!</p>";
    } else {
        echo "<p class='error'>Error updating skill: " . $conn->error . "</p>";
    }
}
?>

<div class="edit-skill-container">
    <h2>Edit Skill</h2>
    <form action="" method="POST">
        <label for="skill_name">Skill Name:</label>
        <input type="text" id="skill_name" name="skill_name" value="<?php echo htmlspecialchars($skill['skill_name']); ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($skill['description']); ?></textarea>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($skill['category']); ?>" required>

        <label for="points_value">Points Value:</label>
        <input type="number" id="points_value" name="points_value" value="<?php echo htmlspecialchars($skill['points_value']); ?>" required>

        <label for="popularity">Popularity:</label>
        <input type="number" id="popularity" name="popularity" value="<?php echo htmlspecialchars($skill['popularity']); ?>" required>

        <label for="level">Level:</label>
        <select id="level" name="level" required>
            <option value="Beginner" <?php echo $skill['level'] === 'Beginner' ? 'selected' : ''; ?>>Beginner</option>
            <option value="Intermediate" <?php echo $skill['level'] === 'Intermediate' ? 'selected' : ''; ?>>Intermediate</option>
            <option value="Advanced" <?php echo $skill['level'] === 'Advanced' ? 'selected' : ''; ?>>Advanced</option>
        </select>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($skill['location']); ?>" required>

        <label for="availability">Availability:</label>
        <select id="availability" name="availability" required>
            <option value="Available" <?php echo $skill['availability'] === 'Available' ? 'selected' : ''; ?>>Available</option>
            <option value="Unavailable" <?php echo $skill['availability'] === 'Unavailable' ? 'selected' : ''; ?>>Unavailable</option>
            <option value="Weekends Only" <?php echo $skill['availability'] === 'Weekends Only' ? 'selected' : ''; ?>>Weekends Only</option>
        </select>

        <button type="submit">Update Skill</button>
    </form>
</div>

<style>
    .edit-skill-container {
        width: 60%;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, textarea, select, button {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        height: 100px;
    }

    button {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #218838;
    }

    .success {
        color: #28a745;
        text-align: center;
        margin-bottom: 10px;
    }

    .error {
        color: #dc3545;
        text-align: center;
        margin-bottom: 10px;
    }
</style>

<?php include 'includes/footer.php'; ?>
