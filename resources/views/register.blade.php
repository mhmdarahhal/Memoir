<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&display=swap"
        rel="stylesheet">
    <title>Welcome</title>
</head>

<body>
    <h1>Memoir</h1>
    <div class="registerBox">
        <h2>Register</h2>
        <script>function validateForm(event) {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            var usernameError = document.getElementById("username-error").innerText;
            var passwordError = document.getElementById("password-error").innerText;


            if (password !== confirmPassword) {
                event.preventDefault();
                document.getElementById("password-error").innerText = "Passwords do not match.";
            }

            if (usernameError !== "") {
                event.preventDefault();
                alert("Please fix the errors before submitting the form.");
            }
        }

        function checkUsername() {
            var username = document.getElementById("username").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/check-username?username=" + username, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.exists) {
                        document.getElementById("username-error").innerText = "Username is already taken.";
                    } else {
                        document.getElementById("username-error").innerText = "";
                    }
                }
            };
            xhr.send();
        }

        function checkPasswordMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            if (password !== confirmPassword) {
                document.getElementById("password-error").innerText = "Passwords do not match.";
            } else {
                document.getElementById("password-error").innerText = "";
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("username").addEventListener('input', checkUsername);
            document.getElementById("confirm-password").addEventListener('input', checkPasswordMatch);
        });
    </script>
        <form action="/register" method="POST" onsubmit="validateForm(event)">
            @csrf
            <div class="form">
                <label for="firstname">First name</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
                <br>
                <label for="lastname">Last name</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
                <br>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <br>
                <label for="dateofbirth">Date of birth</label>
                <input type="date" id="dateofbirth" name="dateofbirth" placeholder="Enter your date of birth" required>
                <br>
                <label for="gender" id="gender">Gender</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" id="male" name="gender" value="male">
                        <span class="custom-radio"></span> Male
                    </label>
                    <label>
                        <input type="radio" id="female" name="gender" value="female">
                        <span class="custom-radio"></span> Female
                    </label>
                </div>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required onblur="checkUsername()">
                <br>
                <span id="username-error" style="color: red;"></span>
                <br>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <br>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password"
                    required>
            </div>
            <span id="password-error" style="color: red;"></span>

            <button type="submit" class="register-btn">Register</button>
            <p class="login-link">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </form>

    </div>
</body>

</html>
