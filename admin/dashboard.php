<?php include '../includes/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <style>
     /* General Page Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    text-align: center;
}

/* Header Styling */
h1 {
    background-color: #004080;
    color: white;
    padding: 15px;
    margin: 0;
}

/* Logout Button Styling */
a {
    display: inline-block;
    margin: 10px;
    padding: 8px 15px;
    background-color: #d9534f;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

a:hover {
    background-color: #c9302c;
}

/* Form Container */
form {
    background-color: white;
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: left;
}

/* Labels */
label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
}

/* Select and Input Fields */
select, input[type="text"], input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* File Upload Area */
#file-upload-area {
    margin-top: 10px;
}

/* File Input Group */
.file-group {
    margin-bottom: 10px;
}

/* Buttons */
button {
    display: block;
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button[type="button"] {
    background-color: #5bc0de;
    color: white;
}

button[type="button"]:hover {
    background-color: #31b0d5;
}

button[type="submit"] {
    background-color: #5cb85c;
    color: white;
}

button[type="submit"]:hover {
    background-color: #449d44;
}

        </style>
    
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <!-- 🔹 Logout Button वापस Add कर दिया -->
    <a href="logout.php">Logout</a>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Department</label>
        <select name="department">
            <option>BCS</option>
            <option>BCA</option>
            <option>BBA</option>
        </select>

        <label>Semester</label>
        <select name="semester">
            <option>Sem 1</option>
            <option>Sem 2</option>
            <option>Sem 3</option>
            <option>Sem 4</option>
            <option>Sem 5</option>
            <option>Sem 6</option>
        </select>

        <label>Content Type</label>
        <select name="content_type">
            <option>PYQ</option>
            <option>E-book</option>
        </select>

        <label>Book Names & Files</label>
        <div id="file-upload-area">
            <div class="file-group">
                <input type="text" name="book_name[]" placeholder="Book Name" required>
                <input type="file" name="file[]" required>
            </div>
        </div>
        
        <button type="button" onclick="addFileInput()">+ Add More</button>
        <button type="submit">Upload</button>
    </form>

    <script>
    function addFileInput() {
        let div = document.createElement("div");
        div.classList.add("file-group");
        div.innerHTML = '<input type="text" name="book_name[]" placeholder="Book Name" required> <input type="file" name="file[]" required>';
        document.getElementById("file-upload-area").appendChild(div);
    }
    </script>

</body>
</html>
