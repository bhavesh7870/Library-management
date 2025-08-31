<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $content_type = $_POST['content_type'];
    $book_names = $_POST['book_name'];
    $files = $_FILES['file'];

    for ($i = 0; $i < count($files['name']); $i++) {
        if ($files['error'][$i] === 0) {
            $file_name = time() . "_" . basename($files["name"][$i]);
            $file_path = "../uploads/" . $file_name;

            if (move_uploaded_file($files["tmp_name"][$i], $file_path)) {
                //  Save file details in Database
                $sql = "INSERT INTO content (department, semester, content_type, book_name, file_path) 
                        VALUES ('$department', '$semester', '$content_type', '".$book_names[$i]."', '$file_name')";

                if (!$conn->query($sql)) {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "File upload failed for: " . $files["name"][$i] . "<br>";
            }
        }
    }
    echo "All files uploaded successfully.";
}
?>
