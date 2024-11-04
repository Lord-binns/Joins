<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="/ADbinns/CSS/styles.css">
</head>
<body>

    <style>
    .name-container {
    display: flex;
    justify-content: space-between; 
}

.name-field {
    flex: 1;  
    margin-right: 10px;  
}

.name-field:last-child {
    margin-right: 0; 
}
</style>

    <div class="register-container">
        <div class="image-container">
            <img src="https://i.pinimg.com/originals/18/6e/b7/186eb7ac8ae58f1f624e031ea3d24c14.gif" alt="Registration Image">
        </div>
        <div class="form-container">
            <h2>Register</h2>
            <form action="../process/register_process.php" method="POST">
                <div class="input-group">
                    <div class="name-container">
                        <div class="name-field">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="name-field">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <button type="submit">Register</button>
                </div>
            </form>
            <p>Already have an account? <a href="../modules/login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
