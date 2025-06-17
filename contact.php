<?php include 'config/db.php'; ?>
<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* styles.css */
/* Glass effect container */
main {
    backdrop-filter: blur(10px) saturate(120%);
    -webkit-backdrop-filter: blur(10px) saturate(120%);
    background-color: rgba(255, 255, 255, 0.3);
    border-radius: 15px;
    padding: 20px;
    margin: 50px auto;
    max-width: 900px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
}

/* Typography */
h2 {
    text-align: center;
    font-size: 2.5rem;
    color: #444;
    margin-bottom: 10px;
}

p {
    text-align: center;
    font-size: 1.1rem;
    color: #555;
}

/* Contact section styles */
.contact-us {
    margin-top: 30px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.contact-col {
    flex: 1;
    min-width: 300px;
    margin: 10px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.contact-col div {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.contact-col div i {
    font-size: 2rem;
    color: #ff9900;
    margin-right: 10px;
}

.contact-col span h5 {
    margin: 0;
    font-size: 1.2rem;
    color: #444;
}

.contact-col span p {
    margin: 0;
    font-size: 0.9rem;
    color: #777;
}

/* Form styles */
form {
    display: flex;
    flex-direction: column;
}

form input,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(5px);
}

form button {
    background: #ff9900;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
}

form button:hover {
    background: #e68a00;
}

/* Map section */
.location iframe {
    width: 100%;
    border: 0;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

/* Responsive Design */
@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .contact-col {
        margin: 20px auto;
    }

    form button {
        width: 100%;
    }
}

    </style>
    
    <main>
        <h2>Contact Us</h2>
        <p>Feel free to reach out with any questions or feedback.</p>
        <section class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.567047942828!2d73.10495089999999!3d19.214103500000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7959136bfbe03%3A0xde1227edb4103327!2sK.V.Pendharkar%20College%20of%20Arts%2C%20Science%20and%20Commerce!5e0!3m2!1sen!2sin!4v1719770991286!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section class="contact-us">
            <div class="row">
                <div class="contact-col">
                    <div>
                        <a href="#"></a><i class="fa fa-home"></i></a>
                        <span>
                            <h5>KV.PENDARKAR COLLAEGE</h5>
                            <p>Dombivali, Maharastra, IN</p>
                        </span>
                    </div>
                    <div>
                        <a href="#"></a><i class="fa fa-phone"></i></a>
                        <span>
                            <h5>+91 8767394757</h5>
                            <p>24/7</p>
                        </span>
                    </div>
                    <div>
                        <a href="#"></a><i class="fa fa-envelope"></i></a>
                        <span>
                            <h5>info@skillswap.com</h5>
                            <p>Email us your query</p>
                        </span>
                    </div>
                    <div class="contact-col">
                        <form action="send_email.php" method="POST">
                            <input type="text" name="name" placeholder="Enter your name" required>
                            <input type="email" name="email" placeholder="Enter your email address" required>
                            <input type="text" name="subject" placeholder="Enter your subject" required>
                            <textarea name="message" rows="8" placeholder="Message" required></textarea>
                            <button type="submit" class="hero-btn red-btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
<?php include 'includes/footer.php'; ?>
