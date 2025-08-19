<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "academics_econtent");

$data = json_decode(file_get_contents("php://input"), true);
$dept = implode("','", $data['department']);
$sem = implode("','", $data['semester']);
$type = implode("','", $data['content_type']);

$query = "SELECT * FROM books WHERE department IN ('$dept') AND semester IN ('$sem') AND content_type IN ('$type')";
$result = $conn->query($query);

$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);
?>
