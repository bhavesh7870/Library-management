<?php
include 'includes/db.php'; // Database connection

$whereClauses = [];

// Department filter
if (!empty($_POST['department'])) {
    $departments = implode("','", $_POST['department']);
    $whereClauses[] = "department IN ('$departments')";
}

// Semester filter
if (!empty($_POST['semester'])) {
    $semesters = implode("','", $_POST['semester']);
    $whereClauses[] = "semester IN ('$semesters')";
}

// Content type filter
if (!empty($_POST['content_type'])) {
    $content_types = implode("','", $_POST['content_type']);
    $whereClauses[] = "content_type IN ('$content_types')";
}

// Query setup
$query = "SELECT * FROM content";
if (!empty($whereClauses)) {
    $query .= " WHERE " . implode(" AND ", $whereClauses);
}
$query .= " ORDER BY uploaded_at DESC";

$result = $conn->query($query);

// Output books
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='content-box'>
                <img src='uploads/" . pathinfo($row['file_path'], PATHINFO_FILENAME) . "C:\Users\Lenovo\Downloads\pdf.jpg' alt='Book Image'>
                <h3>".$row['book_name']."</h3>
                <a href='uploads/".$row['file_path']."' download>Download</a>
              </div>";
    }
} else {
    echo "<p>No books found matching your criteria.</p>";
}
?>
