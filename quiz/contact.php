<?php
// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';  // Your MySQL password
$dbname = 'login_db'; // The database you are using

// Create a new MySQL connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check if the connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$name = $email = $message = "";
$success_message = $error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Insert the data into the contacts table
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $success_message = "Thank you for contacting us, $name! We'll get back to you soon.";
            // Reset form fields
            $name = $email = $message = "";
        } else {
            $error_message = "Error: " . $conn->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles_contact.css">
</head>
<body>

    <header class="header">
        <div class="logo">QuizMaster</div>
        <nav class="nav-menu">
            <a href="http://localhost/website/login/index.php">Home</a>
            <a href="http://localhost/website/quiz/quiz.html">Quizzes</a>
            <a href="http://localhost/website/quiz/about.php">About</a>
            <a href="http://localhost/website/quiz/contact.php">Contact</a>
            <a href="http://localhost/website/quiz/email_us.php">E-mail Us</a>
        </nav>
    </header>

    <div class="container">
        <h1>Contact Us</h1>

        <?php if ($success_message): ?>
            <div class="success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="contact.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required><?php echo htmlspecialchars($message); ?></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

</body>
</html>
