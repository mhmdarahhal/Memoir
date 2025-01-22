<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pacifico&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/memoirs.css') }}">
</head>

<body>
    <header class="header">
        <div class="logo" >
            Memoir
        </div>
        <button class="menu-btn" onclick="toggleNav()">☰</button> <!-- Menu button -->

    </header>

    <div class="user-welcome" data-username="{{ $username }}">
        <span>Welcome, {{ $username }}</span>
    </div>

    <nav class="nav">
        <ul>
            <li class="nav-item" id="newmemoir" onclick="window.location='{{ route('home') }}'">New Memoir</li>
            <li class="nav-item" id="editprofile">Edit Profile</li>
            <li class="nav-item" id="logout">
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-item">Log Out</button>
                </form>
            </li>

        </ul>
    </nav>


    <div class="container">

        <section class="dashboard">
            <!-- Entry Stats -->
            <div class="entry-stats">
                <h3>Entry Stats</h3>
                <p>Total Entries: <span id="totalEntries">50</span></p>
                <p>Entries This Week: <span id="weeklyEntries">4</span></p>
                <p>Entries This Month: <span id="monthlyEntries">15</span></p>
            </div>

            <!-- Mood Tracker -->
            <div class="mood-tracker">
                <h3>Mood Tracker</h3>
                <p>Overall Mood: <span id="overallMood">😊</span></p>
                <p>Total Moods Recorded: <span id="totalMoods">20</span></p>
                <p>Happy: <span id="happyCount">10</span></p>
                <p>Neutral: <span id="neutralCount">5</span></p>
                <p>Sad: <span id="sadCount">3</span></p>
                <p>Angry: <span id="angryCount">2</span></p>
            </div>

            <!-- Motivational Quote -->
            <div class="motivational-quotes">
                <h3>Motivational Quote</h3>
                <p id="quoteText">"The best way to predict the future is to create it."</p>
                <button id="newQuote">Get New Quote</button>
            </div>
        </section>

        <div class="controls">
            <div class="sort-controls">
                <label for="sort">Sort by:</label>
                <select id="sort">
                    <option value="title-asc">Title (A-Z)</option>
                    <option value="title-desc">Title (Z-A)</option>
                    <option value="date-asc">Date (Oldest First)</option>
                    <option value="date-desc">Date (Newest First)</option>
                </select>
            </div>
            <div class="filter-controls">
                <label for="filter-category"> Filter by Category:</label>
                <select id="filter-category">
                    <option value="all">All</option>
                    <option value="Nature">Nature</option>
                    <option value="Career">Career</option>
                    <option value="Reflection">Reflection</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>
        </div>

        <div class="memoirs-grid">
            <div class="memoir-card" onclick="openMemoirModal()"></div>
            <h3 class="memoir-title">Memoir Title</h3>
            <div class="memoir-card" onclick="openMemoirModal(this)">
                <h3 class="memoir-title">Memoir Title</h3>
                <p class="memoir-date">Date: January 10, 2025</p>
                <p class="memoir-category">Category: Personal</p>
                <p class="memoir-mood">Mood: Reflective</p>
            </div>
            <!-- Add more cards here -->
        </div>


        <!-- Modal Structure -->
        <div id="edit-profile-modal" class="modal">
            <div class="modal-content">
                <span id="close-modal-btn" class="close-btn">&times;</span>
                <h2>Edit Profile</h2>
                <form>

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="first name" placeholder="Enter your first name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="last name" placeholder="Enter your last name"
                            required>
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
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            required>
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

    </div>

    <div id="memoir-modal" class="memoir-modal">
        <div class="modal-content">
            <span id="close-modal-memoir-btn" class="close-btn">&times;</span>
            <h2>Memoir Title</h2>
            <form>

                <section class="journal-entry">
                    <h1 type="text" class="entry-title" contenteditable="true">Title</h1>

                    <div class="entry-header">
                        <span class="entry-date" id="display-date"></span>
                        <input type="date" id="date-picker" class="hidden" />

                    </div>
                    <!-- Dropdowns for Category and Mood -->
                    <div class="entry-options">
                        <label for="category-select">Category:</label>
                        <select id="category-select">
                            <option value="personal">Personal</option>
                            <option value="work">Work</option>
                            <option value="travel">Travel</option>
                            <option value="health">Health</option>
                        </select>

                        <label for="mood-select">Mood:</label>
                        <select id="mood-select">
                            <option value="happy">Happy</option>
                            <option value="sad">Sad</option>
                            <option value="excited">Excited</option>
                            <option value="thoughtful">Thoughtful</option>
                        </select>
                    </div>
                    <textarea class="entry-body" placeholder="Your entry here"></textarea>

                <button type="submit" class="save-profile-btn">Save Changes</button>
            </form>
        </div>
    </div>

<script src="memoirs.js"></script>

</body>

</html>
