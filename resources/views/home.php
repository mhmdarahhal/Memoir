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
        <div class="user-welcome">
            <span>Welcome, jezzeke</span>
        </div>
    </header>

    <div class="container">
        <nav class="nav">
            <ul>
                <li><a href="#">Search</a></li>
                <li><a href="#">Old Entries</a></li>
                <li><a href="#">Starred Entries</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>

        <main class="main-content">
            <section class="journal-entry">
                <h1 class="entry-title">Entry Title</h1>
                <div class="entry-header">
                    <span class="entry-date">📅 Sat. 1/4/2025</span>
                    <button class="save-now">Save Now</button>
                </div>
                <textarea class="entry-body" placeholder="Your entry here"></textarea>
            </section>
        </main>
    </div>

    <script>
        // JavaScript to toggle the navigation
        function toggleNav() {
            const nav = document.querySelector('.nav');
            nav.classList.toggle('open');  // Toggle 'open' class to show/hide nav bar
        }
    </script>
</body>

</html>