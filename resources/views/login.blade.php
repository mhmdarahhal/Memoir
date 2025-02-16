<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <title>Welcome</title>
</head>

<body>
    <h1>Memoir</h1>
    <div class="loginBox">
        <h2>Login</h2>


        <form action="/login" method="POST">
            @csrf
            <div class="form">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
            <p class="register-link">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </form>
<br>
        @if ($errors->has('login_error'))
        <div class="alert-danger">
            {{ $errors->first('login_error') }}
        </div>
    @endif
    </div>

</body>

</html>
