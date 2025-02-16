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
        <div class="logo">
            Memoir
        </div>
        <button class="menu-btn" onclick="toggleNav()">☰</button> <!-- Menu button -->

    </header>

    <div class="user-welcome">
        <span>Welcome, {{ session('firstname') }}</span>
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
                <p>Total Entries: <span id="totalEntries">{{ session('totalentries') }}</span></p>
                <p>Entries This Week: <span id="weeklyEntries">{{ session('entriesThisWeek') }}</span></p>
                <p>Entries This Month: <span id="monthlyEntries">{{ session('entriesThisMonth') }}</span></p>
            </div>

            <!-- Mood Tracker -->
            <div class="mood-tracker">
                <h3>Mood Tracker</h3>
                <p>Overall Mood: <span id="overallMood">@php
                    if (
                        max(
                            session('happyCount'),
                            session('excitedCount'),
                            session('sadCount'),
                            session('thoughtfulCount'),
                        ) == session('happyCount')
                    ) {
                        echo '😊';
                    } elseif (
                        max(
                            session('happyCount'),
                            session('excitedCount'),
                            session('sadCount'),
                            session('thoughtfulCount'),
                        ) == session('excitedCount')
                    ) {
                        echo '🤩';
                    } elseif (
                        max(
                            session('happyCount'),
                            session('excitedCount'),
                            session('sadCount'),
                            session('thoughtfulCount'),
                        ) == session('sadCount')
                    ) {
                        echo '☹️';
                    } elseif (
                        max(
                            session('happyCount'),
                            session('excitedCount'),
                            session('sadCount'),
                            session('thoughtfulCount'),
                        ) == session('thoughtfulCount')
                    ) {
                        echo '🤔';
                    } else {
                        echo '😐';
                    }
                @endphp</span></p>
                <p>Total Moods Recorded: <span id="totalMoods">{{ session('totalMoods') }}</span></p>
                <p>Happy: <span id="happyCount">{{ session('happyCount') }}</span></p>
                <p>Excited: <span id="neutralCount">{{ session('excitedCount') }}</span></p>
                <p>Sad: <span id="sadCount">{{ session('sadCount') }}</span></p>
                <p>Thoughtful: <span id="angryCount">{{ session('thoughtfulCount') }}</span></p>
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
                    <option value="personal">Personal</option>
                    <option value="work">Work</option>
                    <option value="travel">Travel</option>
                    <option value="health">Health</option>
                    <!-- Add more categories as needed -->
                </select>
            </div>
        </div>

        <div class="memoirs-grid">

            <div class="memoir-card" onclick="openMemoirModal(this)">
                {{-- <h3 class="memoir-title">Title: </h3>
                <p class="memoir-date">Date: </p>
                <p class="memoir-category">Category: </p>
                <p class="memoir-mood">Mood: </p>
                <p class="memoir-body" type = "hidden">body</p> --}}
            </div>
            <!-- Add more cards here -->
        </div>


        @if ($errors->has('password'))
            <script>
                alert("{{ $errors->first('password') }}");
            </script>
        @endif
        <!-- Modal Structure -->
        <div id="edit-profile-modal" class="modal">
            <div class="modal-content">
                <span id="close-modal-btn" class="close-btn">&times;</span>
                <h2>Edit Profile</h2>
                <form action="{{ route('update.profile') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="firstname" id='oldfirstname'>Old First Name: </label>
                        <input type="text" id="firstname" name="firstname" placeholder="Enter the new value">
                    </div>

                    <div class="form-group">
                        <label for="lastname"id='oldlastname'>Old Last Name: </label>
                        <input type="text" id="lastname" name="lastname" placeholder="Enter the new value">
                    </div>

                    <div class="form-group">
                        <label for="email"id='oldemail'>Old Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter the new value">
                    </div>

                    <div class="form-group">
                        <label for="username"id='oldusername'>Old Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter the new value">
                    </div>

                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter the new password">
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" id="confirm-password" name="confirm-password"
                            placeholder="Confirm the new password">
                        <br>
                        <p id="errorMessage" class="error" style="display: none;color:red">Passwords do not match!
                        </p>
                    </div>

                    <button type="submit" class="save-profile-btn" id="submitBtn">Save Changes</button>
                </form>
            </div>
        </div>

    </div>

    <div id="memoir-modal" class="memoir-modal">
        <div class="modal-content">
            <span id="close-modal-memoir-btn" class="close-btn">&times;</span>
            <h2>Edit Your Memoir</h2>
            <form action="{{ route('update.memoir') }}" method="post">
                @csrf
                @method('PATCH')
                <section class="journal-entry">
                    <h1 type="text" class="entry-title" contenteditable="true" id="memoir-title">
                        Title</h1>
                    <input type="hidden" id="title" name="title">
                    <input type="hidden" id="memoirid" name="memoirid">


                    <div class="entry-header">
                        <span class="datedisplay" id="display-date"
                            onclick="document.getElementById('date-picker').click();">📅 Select Date</span>
                        <input type="date" id="date-picker" class="hidden" />
                        <input type="hidden" id="date" name="date">
                    </div>
                    <div class="entry-options">
                        <label for="category-select">Category:</label>
                        <select id="category-select" name="category">
                            <option value="personal">Personal</option>
                            <option value="work">Work</option>
                            <option value="travel">Travel</option>
                            <option value="health">Health</option>
                        </select>

                        <label for="mood-select">Mood:</label>
                        <select id="mood-select" name="mood">
                            <option value="happy">Happy</option>
                            <option value="sad">Sad</option>
                            <option value="excited">Excited</option>
                            <option value="thoughtful">Thoughtful</option>
                        </select>
                    </div>
                    <textarea class="entry-body" placeholder="Your entry here" name="body" id="memoir-body"></textarea>

                    <button type="submit" class="save-memoir-btn">Save Changes</button>
            </form>
        </div>
    </div>

    @if (isset($alertMessage))
        <script>
            alert('{{ $alertMessage }}');
        </script>
    @endif


    <script>
        const user = @json(session('user'));
    </script>

    <script>
        // Embed the session data into a JavaScript variable
        window.memoirs = @json(session('memoirs', []));
        console.log(window.memoirs);
    </script>

    <script src="{{ asset('js/memoirs.js') }}"></script>

</body>

</html>
