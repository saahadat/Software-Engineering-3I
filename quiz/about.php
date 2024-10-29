<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    
</head>
<body>
   
    <style>
        /* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body { 
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

.header {
    width: 100%;
    padding: 1em 2em;
    background-color: #4CAF50;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 1.5em;
    font-weight: bold;
}
.nav-menu{

    margin-left: 700px;
   

}
.nav-menu a {
    margin-left: 20px;
    color: #fff;
    text-decoration: none;
    font-size: 1.2em;
    
}

.nav-menu a:hover {
    text-decoration: underline;
}

/* About Section */
.about-section {
    background-color: #fff;
    padding: 40px;
    margin: 40px auto;
    border-radius: 10px;
    max-width: 1000px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.about-section h1 {
    font-size: 36px;
    color:#4CAF50;
    margin-bottom: 20px;
    text-align: center;
}

.about-section p {
    font-size: 18px;
    margin-bottom: 15px;
    text-align: center;
}

.about-section ul {
    font-size: 18px;
    margin: 20px auto;
    list-style-type: square;
    padding-left: 40px;
}

/* Developer Section */
.developer-section {
    background-color: #fff;
    padding: 40px;
    margin: 40px auto;
    border-radius: 10px;
    max-width: 1000px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.developer-section h2 {
    font-size: 32px;
    margin-bottom: 30px;
    text-align: center;
    color: #4CAF50;
}

.card-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.developer-card {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    width: 30%;
    margin: 0 auto;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.developer-card h3 {
    font-size: 24px;
    color: green;
    margin-bottom: 10px;
}

.developer-card p {
    font-size: 16px;
    color: #666;
    margin-bottom: 10px;
}

.developer-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 15px;
    object-fit: cover;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
.thanks-card h2{

    font-size: 32px;
    margin-bottom: 30px;
    text-align: center;
    color: #4CAF50;
    background-color:antiquewhite;
    padding: 20px;
    border-radius: 10px;
    width: 30%;
    margin: 0 auto;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

}


/* Footer (optional for consistency) */


    </style>




    
    <header class="header">
    <div>
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
    </div>
    </header>

    <!-- About Section -->
    <div class="about-section">
        <h1>About QuizMaster</h1>
        <p>Welcome to QuizMaster, your go-to platform for sharpening your skills and practicing quizzes on various subjects. Our website offers a streamlined experience for users to log in, sign up, take quizzes, and track their progress. Here’s a breakdown of what you can expect:</p>
        
        <ul style= "list-style-type:disc">
            <li><strong>Login:</strong> Registered users can log in to their accounts and access personalized quizzes.</li>
            <li><strong>Signup:</strong> New users can create an account to track their quiz performances and save their progress.</li>
            <li><strong>Quiz Practice:</strong> Explore our wide variety of quizzes across different categories. Whether you're looking to challenge yourself or learn something new, QuizMaster has got you covered.</li>
            <li><strong>Sharpen Your Skills:</strong> Regularly practicing quizzes helps you improve your knowledge in various subjects and prepare for exams or interviews.</li>
            <li><strong>Logout:</strong> Easily log out from your account once your session is over for security purposes.</li>
        </ul>

        <p>QuizMaster was developed with the aim of creating an easy-to-use, fun, and educational quiz platform. Learn more about the developers who made this possible below!</p>
    </div>

    <!-- Developer Section with 3 Cards -->
    <div class="developer-section">
        <h2>Meet the Try Harders</h2>
        <div class="card-container">
            <!-- Developer 1 -->
            <div class="developer-card">
                <img src="dev1.jpg" alt="Developer 1" class="developer-img"> <!-- Placeholder image -->
                <h3>Chandra Bindu Saha</h3>
                <p>Student ID: 1902010</p>
                
            </div>

            <!-- Developer 2 -->
            <div class="developer-card">
                <img src="dev2.jpg" alt="Developer 2" class="developer-img"> <!-- Placeholder image -->
                <h3>Md Shakh Nadir Parvej</h3>
                <p>Student ID: 1902043</p>
                
            </div>

            <!-- Developer 3 -->
            <div class="developer-card">
                <img src="dev3.jpg" alt="Developer 3" class="developer-img"> <!-- Placeholder image -->
                <h3>Mohammad Shahadat Ali Mollah</h3>
                <p>Student ID: 1802044</p>
                
            </div>
        </div>
    </div>
    <div class="thanks-card">

    <h2>Thanks for Using QuizMaster</h2>
    <br>
    </div>

</body>
</html>
