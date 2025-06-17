<?php 
include 'config/db.php';
include 'includes/header.php';

// Get filter values
$category = isset($_GET['category']) ? $_GET['category'] : '';
$level = isset($_GET['level']) ? $_GET['level'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$availability = isset($_GET['availability']) ? $_GET['availability'] : '';

// Base query
$query = "SELECT * FROM skills WHERE 1=1";

// Apply filters if set
if ($category) {
    $query .= " AND category = '$category'";
}
if ($level) {
    $query .= " AND level = '$level'";
}
if ($location) {
    $query .= " AND location LIKE '%$location%'";
}
if ($availability) {
    $query .= " AND availability = '$availability'";
}

$result = $conn->query($query);
?>
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body Styling */
body {
    background-color: #f4f4f9;
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    font-size: 16px;
}

/* Header Styling */
header {
    color: black;
    text-align: center;
}

header nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
    font-weight: bold;
}

header nav a:hover {
    color: #ffdb58;
}

/* Page Container */
main {
    width: 80%;
    margin: auto;
    padding: 30px;
}

/* Page Heading */
h2 {
    color: #0e76a8;
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 20px;
}

/* Filter Form Styling */
form {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
    margin-right: 8px;
    color: #333;
}

form select, form input[type="text"], form button {
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid #ddd;
    font-size: 1rem;
}

form select, form input[type="text"] {
    margin-right: 20px;
    flex-grow: 1;
}

form button {
    background-color: #0e76a8;
    color: #ffffff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #ffdb58;
    color: #333;
}

/* Skill List */
ul {
    list-style: none;
    padding: 0;
}

ul li {
    background-color: #ffffff;
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: transform 0.3s ease;
}

ul li:hover {
    transform: translateY(-3px);
}

ul li a {
    color: #0e76a8;
    font-size: 1.2rem;
    text-decoration: none;
    font-weight: bold;
}

ul li a:hover {
    color: #ffdb58;
}

/* Skill Details */
ul li span {
    font-size: 0.9rem;
    color: #666;
}

/* No Results Message */
p {
    text-align: center;
    font-size: 1.2rem;
    color: #999;
    margin-top: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        flex-direction: column;
        align-items: stretch;
    }

    form select, form input[type="text"] {
        margin-bottom: 15px;
        width: 100%;
    }

    ul li {
        flex-direction: column;
        align-items: flex-start;
    }
}

/* Footer */
footer {
    
    color: #ffffff;
    text-align: relative;
    margin-top: auto;
}

footer a {
    color: #ffffff;
    text-decoration: none;
    margin: 0 10px;
}

footer a:hover {
    color: #ffdb58;
}

.social-media img {
    width: 24px;
    height: 24px;
    margin: 0 5px;
    transition: transform 0.3s ease;
}

.social-media img:hover {
    transform: scale(1.2);
}

</style>
<h2>Explore Skills</h2>

<!-- Filter Form -->
<form action="" method="GET">
    <label>Category:</label>
    <select name="category">
        <option value="">All</option>
        <option value="music" <?php if ($category == 'music') echo 'selected'; ?>>Music</option>
        <option value="language" <?php if ($category == 'language') echo 'selected'; ?>>Language</option>
        <option value="technology" <?php if ($category == 'technology') echo 'selected'; ?>>Technology</option>
        <option value="cooking" <?php if ($category == 'cooking') echo 'selected'; ?>>Cooking</option>
        <option value="art" <?php if ($category == 'art') echo 'selected'; ?>>Art</option>
    </select>

    <label>Skill Level:</label>
    <select name="level">
        <option value="">All</option>
        <option value="beginner" <?php if ($level == 'beginner') echo 'selected'; ?>>Beginner</option>
        <option value="intermediate" <?php if ($level == 'intermediate') echo 'selected'; ?>>Intermediate</option>
        <option value="advanced" <?php if ($level == 'advanced') echo 'selected'; ?>>Advanced</option>
    </select>

    <label>Location:</label>
    <input type="text" name="location" value="<?php echo htmlspecialchars($location); ?>" placeholder="City or Region">

    <label>Availability:</label>
    <select name="availability">
        <option value="">All</option>
        <option value="virtual" <?php if ($availability == 'virtual') echo 'selected'; ?>>Virtual</option>
        <option value="in-person" <?php if ($availability == 'in-person') echo 'selected'; ?>>In-Person</option>
        <option value="both" <?php if ($availability == 'both') echo 'selected'; ?>>Both</option>
    </select>

    <button type="submit">Filter</button>
</form>

<!-- Skills List -->
<ul>
    <?php if ($result->num_rows > 0) { 
        while ($skill = $result->fetch_assoc()) { ?>
            <li>
                <a href="skill_profile.php?skill_id=<?php echo $skill['skill_id']; ?>">
                    <?php echo htmlspecialchars($skill['skill_name']); ?>
                </a> - 
                <?php echo htmlspecialchars($skill['category']); ?> | 
                <?php echo htmlspecialchars($skill['level']); ?> | 
                <?php echo htmlspecialchars($skill['location']); ?> |
                <?php echo htmlspecialchars($skill['availability']); ?>
            </li>
        <?php } 
    } else { ?>
        <p>No skills found matching your criteria.</p>
    <?php } ?>
</ul>

<?php include 'includes/footer.php'; ?>
