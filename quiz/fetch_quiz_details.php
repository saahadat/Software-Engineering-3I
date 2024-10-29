<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'quizz';

// Create connection
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

    // Fetch questions
    $stmt = $conn->prepare("SELECT * FROM questions WHERE quiz_id = ?");
    $stmt->bind_param("i", $quiz_id);
    $stmt->execute();
    $questions = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    // For each question, fetch its options
    foreach ($questions as &$question) {
        $stmt = $conn->prepare("SELECT * FROM options WHERE question_id = ?");
        $stmt->bind_param("i", $question['id']);
        $stmt->execute();
        $question['options'] = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Prepare the final output
    $output = [
        'quiz_title' => $quiz_title,
        'questions' => $questions
    ];

    echo json_encode($output);
}

$conn->close();
?>
