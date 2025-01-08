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
                <li class="nav-item" id="search">Search</li>
                <li class="nav-item" id="oldentries">Old Entries</li>
                <li class="nav-item" id="starredentries">Starred Entries</li>
                <li class="nav-item" id="settings">Settings</li>
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

    <!-- Modal Structure -->
    <div id="settings-modal" class="modal">
        <div class="modal-content">
            <span id="close-modal-btn" class="close-btn">&times;</span>
            <h3>Settings</h3>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">

                <button type="submit">Save</button>
            </form>
        </div>
    </div>


    <script src="home.js"></script>

</body>

</html>