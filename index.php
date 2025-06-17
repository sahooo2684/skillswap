<?php include 'config/db.php'; ?>
<?php include 'includes/header.php'; ?>

<style>
/* Home Page Styling */
.hero-banner {
    background: url('includes/images/banner.png') no-repeat center center/cover;
    color: white;
    padding: 60px 300px;
    text-align: center;
}

.hero-banner h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.hero-banner p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.hero-banner .cta-button {
    background-color: #0e76a8;
    color: white;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

.hero-banner .cta-button:hover {
    background-color: #055a8c;
}

.how-it-works, .popular-skills, .testimonials {
    padding: 40px 20px;
    text-align: center;
}

.how-it-works h2, .popular-skills h2, .testimonials h2 {
    color: #0e76a8;
    margin-bottom: 20px;
}

.how-it-works .step, .testimonials .testimonial {
    margin-bottom: 20px;
}

.popular-skills .skill {
    display: inline-block;
    background-color: #f4f4f4;
    color: #333;
    padding: 10px 20px;
    margin: 5px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.popular-skills .skill:hover {
    background-color: #ddd;
}

.testimonials .testimonial {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-style: italic;
    max-width: 400px;
    margin: 0 auto;
}

.join-now {
    text-align: center;
    padding: 40px 20px;
}

.join-now .cta-button {
    font-size: 1.3rem;
    padding: 15px 40px;
}
</style>

<!-- Hero Banner -->
<div class="hero-banner">
    <h1>Welcome to SkillSwap</h1>
    <p>Exchange skills, learn from others, and grow together in our community.</p>
    <button class="cta-button" onclick="location.href='signup.php'">Join Now</button>
</div>

<!-- How It Works Section -->
<div class="how-it-works">
    <h2>How It Works</h2>
    <div class="step">
        <h3>Step 1: Join the Community</h3>
        <p>Sign up, create a profile, and share your skills with others.</p>
    </div>
    <div class="step">
        <h3>Step 2: Explore and Connect</h3>
        <p>Browse skills and connect with people offering the skills you want to learn.</p>
    </div>
    <div class="step">
        <h3>Step 3: Skill Swap</h3>
        <p>Arrange sessions and start exchanging skills for mutual growth.</p>
    </div>
</div>

<!-- Popular Skills Section -->
<div class="popular-skills">
    <h2>Popular Skills</h2>
    <?php
    // Fetch popular skills from the database
    $skillsQuery = "SELECT skill_name FROM skills ORDER BY popularity DESC LIMIT 5";
    $skillsResult = $conn->query($skillsQuery);

    if ($skillsResult->num_rows > 0) {
        while ($skill = $skillsResult->fetch_assoc()) {
            echo "<div class='skill'>" . htmlspecialchars($skill['skill_name']) . "</div>";
        }
    } else {
        echo "<p>No popular skills found.</p>";
    }
    ?>
</div>

<!-- Testimonials Section -->
<div class="testimonials">
    <h2>What Our Users Say</h2>
    <div class="testimonial">
        <p>"SkillSwap helped me find a language partner to practice Spanish. It's been a great learning experience!"</p>
        <small>- Emily, Language Learner</small>
    </div>
    <div class="testimonial">
        <p>"I taught coding basics and learned graphic design in return. The community is supportive and engaging!"</p>
        <small>- Mark, Tech Enthusiast</small>
    </div>
</div>

<!-- Join Now Section -->
<div class="join-now">
    <h2>Ready to Start Your Skill-Swapping Journey?</h2>
    <button class="cta-button" onclick="location.href='signup.php'">Join Now</button>
</div>

<?php include 'includes/footer.php'; ?>
