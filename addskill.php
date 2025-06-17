<?php
include 'config/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $skill_name = $_POST['skill_name'];
    $description = $_POST['description'];
    $category = $_POST['category']; // Selected category
    $points_value = $_POST['points_value'];
    $popularity = $_POST['popularity'];
    $notes = $_POST['notes'];
    $video_url = $_POST['video_url'];
    $more_details = $_POST['more_details'];
    $teacher_id = 1; // Replace with session variable for logged-in teacher

    // Insert into skills table
    $insert_query = "INSERT INTO skills (skill_name, description, category, points_value, popularity, teacher_id, notes, video_url, more_details) 
                     VALUES ('$skill_name', '$description', '$category', '$points_value', '$popularity', '$teacher_id', '$notes', '$video_url', '$more_details')";
    
    if ($conn->query($insert_query)) {
        echo "Skill added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<style>
    /* Container for Centering */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}

/* Form Container */
.form-container {
    background: rgba(255, 255, 255, 0.15);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 500px;
    color: #ffffff;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    text-align: center;
}

/* Form Fields */
label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
    font-weight: bold;
    color: #fff;
}

input[type="text"],
input[type="url"],
textarea,
select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 5px;
    font-size: 1rem;
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
}

/* Button Styling */
button[type="submit"] {
    background-color: #ff9900;
    color: #ffffff;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #e68a00;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skill</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your CSS file here -->
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Add Skill</h2>
            <form action="addskill.php" method="POST">
                <label for="skill_name">Skill Name:</label>
                <input type="text" name="skill_name" id="skill_name" required>

                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea>

                <label for="category">Category:</label>
                <select name="category" id="category">
                    <option value="">Select Category</option>
                    <option value="music" <?php if (isset($category) && $category == 'music') echo 'selected'; ?>>Music</option>
                    <option value="language" <?php if (isset($category) && $category == 'language') echo 'selected'; ?>>Language</option>
                    <option value="technology" <?php if (isset($category) && $category == 'technology') echo 'selected'; ?>>Technology</option>
                    <option value="cooking" <?php if (isset($category) && $category == 'cooking') echo 'selected'; ?>>Cooking</option>
                    <option value="art" <?php if (isset($category) && $category == 'art') echo 'selected'; ?>>Art</option>
                    <option value="design" <?php if (isset($category) && $category == 'design') echo 'selected'; ?>>Design</option>
                    <option value="business" <?php if (isset($category) && $category == 'business') echo 'selected'; ?>>Business</option>
                    <option value="sports" <?php if (isset($category) && $category == 'sports') echo 'selected'; ?>>Sports</option>
                    <option value="health" <?php if (isset($category) && $category == 'health') echo 'selected'; ?>>Health</option>
                </select>

                <label for="points_value">Points Value:</label>
                <input type="number" name="points_value" id="points_value" required>

                <label for="popularity">Popularity:</label>
                <input type="number" name="popularity" id="popularity" required>

                <label for="notes">Notes:</label>
                <textarea name="notes" id="notes"></textarea>

                <label for="video_url">Video URL:</label>
                <input type="url" name="video_url" id="video_url">

                <label for="more_details">More Details:</label>
                <textarea name="more_details" id="more_details"></textarea>

                <button type="submit">Add Skill</button>
            </form>
        </div>
    </div>
</body>

<?php include 'includes/footer.php'; ?>

</html>
