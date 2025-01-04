<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&display=swap"
        rel="stylesheet">
    <title>Welcome</title>
</head>

<body>
    <h1>Memoir</h1>
    <div class="registerBox">
        <h2>Register</h2>

        <form action="/register" method="POST">
            <div class="form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <br>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password"
                    required>
            </div>

            <button type="submit" class="register-btn">Register</button>
            <p class="login-link">Already have an account? <a href="/login">Login here</a></p>
        </form>

    </div>
</body>

</html>