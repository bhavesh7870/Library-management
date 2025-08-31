<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academics E-content</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Background & Font */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #eef2f3;
    color: #333;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* Header */
header {
    background: #003366;
    color: white;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

header h1 {
    font-size: 28px;
}

header img {
    width: 50px;
    height: 50px;
}

/* Container */
.container {
    flex: 1;
    display: flex;
    padding: 20px;
    gap: 20px;
}

/* Sidebar Filters */
aside {
    background: white;
    padding: 20px;
    border-radius: 8px;
    width: 250px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

aside h2 {
    margin-bottom: 20px;
    color: #003366;
}

aside h3 {
    margin-top: 20px;
    margin-bottom: 10px;
    color: #00509E;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
}

aside label {
    display: block;
    margin-bottom: 8px;
}

/* Main Content Area */
main#content-area {
    flex: 1;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
}

/* Book Cards */
/* Fix for book card height */
.content-box {
    width: 200px; /* Fixed width */
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    text-align: center;
    transition: 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    
    /* justify-content: space-between; */
  /* Height ko auto karo */
    min-height: unset;  
    max-height: 300px; 
}

/* Ensure all content is aligned properly */
.content-box img {
    width: 80px; 
    height: auto;
    margin-bottom: 10px;
}

.content-box a {
    display: inline-block;
    text-decoration: none;
    background: #00509E;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    margin-top: auto; 
}

/* Footer */
.footer {
    background: #003366;
    color: white;
    text-align: center;
    padding: 15px;
}

#admin-link {
    display: block;
    color: #ffffff;
    text-decoration: none;
    margin-top: 5px;
}

#admin-link:hover {
    text-decoration: underline;
}

     </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body>
    <header>
        <h1>PCMCS E-content</h1>
        <img src="assets/images/logo.png" alt="College Logo">
    </header>

    <div class="container">
        <aside>
            <h2>Filters</h2>
            <form id="filter-form">
                <h3>Department</h3>
                <label><input type="checkbox" class="filter-checkbox" name="department" value="BCS"> BCS</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="department" value="BCA"> BCA</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="department" value="BBA"> BBA</label><br>

                <h3>Semester</h3>
                <label><input type="checkbox" class="filter-checkbox" name="semester" value="Sem 1"> Sem 1</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="semester" value="Sem 2"> Sem 2</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="semester" value="Sem 3"> Sem 3</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="semester" value="Sem 4"> Sem 4</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="semester" value="Sem 5"> Sem 5</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="semester" value="Sem 6"> Sem 6</label><br>

                <h3>Content Type</h3>
                <label><input type="checkbox" class="filter-checkbox" name="content_type" value="PYQ"> PYQ</label><br>
                <label><input type="checkbox" class="filter-checkbox" name="content_type" value="E-book"> E-book</label><br>

            </form>
        </aside>

        <main id="content-area">
            <?php include 'search.php'; ?> 
        </main>
    </div>

     <div class="footer">
        <p>&copy; 2025 Academics E-content</p>
        <a href="login.php" id="admin-link">Admin</a>
     </div>


    <script>
    $(document).ready(function() {
        $(".filter-checkbox").on("change", function() {
            var filters = {
                department: [],
                semester: [],
                content_type: []
            };

            $(".filter-checkbox:checked").each(function() {
                filters[$(this).attr("name")].push($(this).val());
            });

            $.ajax({
                url: "search.php",
                type: "POST",
                data: filters,
                success: function(response) {
                    $("#content-area").html(response);
                }
            });
        });
    });
    </script>
</body>
</html>
