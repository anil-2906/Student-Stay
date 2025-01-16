<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../../Partials/header_view.php'; ?>
    <title>Contact Form</title>
    <link rel="stylesheet" href="../../CSS/contact.css"> 
</head>
<body>
    <div class="background"></div>
    <div class="contact-form">
        <h2>Get in Touch</h2>
        <p>We'd love to hear from you! Fill out the form below and we'll get back to you soon.</p>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            // Here you can add code to send the email or save the data to a database
            // For example, to send an email:
            $to = "your-email@example.com";
            $subject = "New Contact Form Submission";
            $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
            $headers = "From: $email";

            if (mail($to, $subject, $body, $headers)) {
                echo "<p>Thank you for contacting us. We will get back to you soon.</p>";
            } else {
                echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
            }
        }
        ?>

        <form action="contact_view.php" method="post">
            <!-- Name Field -->
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Phone Number Field -->
            <div class="form-control">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Format: 123-456-7890">
            </div>

            <!-- Email Field -->
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Message Field -->
            <div class="form-control">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-control">
                <button type="submit">Send Message</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php include '../../Partials/footer_view.php'; ?>