
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/ADbinns/CSS/styles.css">
</head>

<body>
  
    <div class="login-container">
    <div class="image-container">
            <img src="https://media.tenor.com/HmsYtgHX76oAAAAj/sseeyall-bubu-dudu.gif" alt="Registration Image">
        </div>
        <div class="form-container">
        <h2>Login here</h2>
        <form action="../process/login_process.php" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
