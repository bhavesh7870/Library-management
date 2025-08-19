<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <style>
     
    /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Background */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #003973, #E5E5BE);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Wrapper */
.login-wrapper {
    background: rgba(255, 255, 255, 0.95);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 400px;
}

/* Form Styling */
.login-box h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #003366;
}

.login-box label {
    font-weight: 600;
    display: block;
    margin-bottom: 5px;
    color: #003366;
}

.login-box input[type="email"],
.login-box input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #aaa;
    border-radius: 5px;
    background: #f1f1f1;
}

.login-box button {
    width: 100%;
    padding: 12px;
    background-color: #003366;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.login-box button:hover {
    background-color: #001f4d;
}


        </style>
</head>
<body>
    <div class="login-wrapper">
        <form action="process-login.php" method="post" class="login-box">
            <h2>🔐 Admin Login</h2>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
