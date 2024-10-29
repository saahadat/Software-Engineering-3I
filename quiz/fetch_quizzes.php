<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'quizz';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category_id = $_GET['category_id'] ?? 'all';

if ($category_id != 'all') {
    $stmt = $conn->prepare("SELECT * FROM quizzes WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $quizzes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
} else {
    $quizzes = $conn->query("SELECT * FROM quizzes")->fetch_all(MYSQLI_ASSOC);
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($quizzes);
?>
