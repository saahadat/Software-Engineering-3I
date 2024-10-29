<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = ''; // Replace with your MySQL password if set
$dbname = 'quizz';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$quiz_id = $_GET['quiz_id'] ?? null;

if ($quiz_id) {
    // Fetch quiz title
    $stmt = $conn->prepare("SELECT title FROM quizzes WHERE id = ?");
    $stmt->bind_param("i", $quiz_id);
    $stmt->execute();
    $quiz_title = $stmt->get_result()->fetch_assoc()['title'];

    // Fetch questions with options
    $stmt = $conn->prepare("
        SELECT q.id as question_id, q.question_text, o.id as option_id, o.option_text, o.is_correct
        FROM questions q
        LEFT JOIN options o ON q.id = o.question_id
        WHERE q.quiz_id = ?
        ORDER BY q.id, o.id
    ");
    $stmt->bind_param("i", $quiz_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $questions = [];
    while ($row = $result->fetch_assoc()) {
        $question_id = $row['question_id'];
        if (!isset($questions[$question_id])) {
            $questions[$question_id] = [
                'question_text' => $row['question_text'],
                'options' => []
            ];
        }
        $questions[$question_id]['options'][] = [
            'option_id' => $row['option_id'],
            'option_text' => $row['option_text'],
            'is_correct' => $row['is_correct']
        ];
    }
}

$score_message = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Calculate score
    $score = 0;
    foreach ($_POST['answers'] as $question_id => $selected_option_id) {
        $stmt = $conn->prepare("SELECT is_correct FROM options WHERE id = ?");
        $stmt->bind_param("i", $selected_option_id);
        $stmt->execute();
        $is_correct = $stmt->get_result()->fetch_assoc()['is_correct'];

        if ($is_correct) {
            $score++;
        }
    }

    $total_questions = count($questions);
    $score_message = "You scored $score out of $total_questions.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $quiz_title; ?></title>
    <!-- <link rel="stylesheet" href="styles2.css"> -->
     <style type="text/css">
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    
}

/* Body */
/* body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
} */

/* Header */
.header {
    width: 100%;
    padding: 1em 2em;
    background-color: #4CAF50;
    color: #fff;
    display: flex;
   font-family: sans-serif; 
   justify-content: space-between;
    align-items: center;

}

.logo {
    font-size: 1.5em;
    font-weight: bold;
    
}

.nav-menu a {
    margin-left: 20px;
    color: #fff;
    text-decoration: none;
    font-size: 1em;
}

.nav-menu a:hover {
    text-decoration: underline;
}

/* Container */
.container {
    width: 90%;
    max-width: 800px;
    margin: 2em auto;
    padding: 2em;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    background-color: white;
}

h1 {
    font-size: 2em;
    color: #333;
    margin-bottom: 1em;
    font-family: Arial, sans-serif;
}

/* Questions */
.question {
    margin: 1.5em 0;
    text-align: left;
    font-family: Arial, sans-serif;
}

.question h4 {
    font-size: 1.2em;
    color: #333;
}

.question label {
    display: block;
    background-color: #e3f2fd;
    padding: 8px 12px;
    border-radius: 6px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.question label:hover {
    background-color: #bbdefb;
}
input[type="radio"] {
    margin-right: 0.5em;
}

/* Submit Button */
button[type="submit"] {
    padding: 0.7em 1.5em;
    font-size: 1em;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #388E3C;
}

/* Score Message */
.last {
    font-size: 1.2em;
    color: #333;
}

h2 {
    font-size: 1.5em;
    color: #4CAF50;
    margin-top: 1em;
    font-family: Arial, sans-serif;
}

a.last {
    display: inline-block;
    margin-top: 1em;
    padding: 0.5em 1em;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-family: Arial, sans-serif;
}

a.last:hover {
    background-color: #388E3C;
}


        </style>
</head>
<body style="background-color: antiquewhite;">
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

    <div class="container">
        

        <?php if ($score_message): ?>
            <h1 class="last"><?php echo $quiz_title; ?></h1>
            <h2><?php echo $score_message; ?></h2>
            <br><a class="last" href="quiz.html">Back to catalogue</a>
        <?php else: ?>
            <h1><?php echo $quiz_title; ?></h1>
            <form action="quiz.php?quiz_id=<?php echo $quiz_id; ?>" method="POST">
                <?php foreach ($questions as $question_id => $question): ?>
                    <div class="question">
                        <h4><?php echo $question['question_text']; ?></h4>
                        <br>
                        <?php foreach ($question['options'] as $option): ?>
                            <label>
                                <input type="radio" name="answers[<?php echo $question_id; ?>]" value="<?php echo $option['option_id']; ?>" required>
                                <?php echo $option['option_text']; ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Submit Quiz</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
