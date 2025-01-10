<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <header class="header">
        <div class="logo">Memoir</div>
        <button class="menu-btn" onclick="toggleNav()">☰</button> <!-- Menu button -->

    </header>

    <div class="user-welcome">
        <span>Welcome, jezzeke</span>
    </div>

    <div class="container">
        <nav class="nav">
            <ul>
                <li class="nav-item" id="memoirs">Memoirs</li>
                <li class="nav-item" id="editprofile">Edit Profile</li>
                <li class="nav-item" id="logout">Log Out</li>

            </ul>
        </nav>

        <main class="main-content">
            <section class="journal-entry">
                <h1 type="text" class="entry-title" contenteditable="true">Title</h1>
                <div class="entry-header">
                    <span class="entry-date" id="display-date"></span>
                    <input type="date" id="date-picker" class="hidden" />
                    <button class="save-now">Save Now</button>
                </div>
                <textarea class="entry-body" placeholder="Your entry here"></textarea>
            </section>
        </main>
    </div>

    <!-- Modal Structure -->
    <div id="edit-profile-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal-btn" class="close-btn">&times;</span>
            <h2>Edit Profile</h2>
            <form>

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="first name" placeholder="Enter your first name" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="last name" placeholder="Enter your last name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password"
                        placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="save-profile-btn">Save Changes</button>
            </form>
        </div>
    </div>




    <script src="home.js"></script>

</body>

</html>
