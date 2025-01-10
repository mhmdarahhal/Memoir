function toggleNav() {
    const nav = document.querySelector('.nav');
    nav.classList.toggle('open');  // Toggle 'open' class to show/hide nav bar
}

var modal = document.getElementById("edit-profile-modal");

  // Get the button that opens the modal
  var settingsBtn = document.getElementById("editprofile");

  // Get the <span> element that closes the modal
  var closeModalBtn = document.getElementById("close-modal-btn");

  // When the user clicks the button, open the modal
  settingsBtn.onclick = function() {
    modal.style.display = "flex";
  }

  // When the user clicks on <span> (x), close the modal
  closeModalBtn.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  function toggleNav() {
    const nav = document.querySelector('.nav'); // Select the nav bar
    const mainContent = document.querySelector('.main-content'); // Select the main content
    nav.classList.toggle('open'); // Toggle 'open' class on the nav

    // Check if nav is open or closed and adjust centering
    if (nav.classList.contains('open')) {
        mainContent.style.marginLeft = '250px'; // Shift right when nav is open
    } else {
        mainContent.style.marginLeft = '0'; // Revert to center when nav is closed
    }
}

const memoirs = [
    {
        title: "A Walk in the Park",
        date: "January 1, 2025",
        category: "Nature",
        mood: "Relaxed"
    },
    {
        title: "My First Job",
        date: "December 15, 2024",
        category: "Career",
        mood: "Excited"
    },
    {
        title: "A Rainy Evening",
        date: "November 20, 2024",
        category: "Reflection",
        mood: "Peaceful"
    },
    // Add more memoirs as needed
];

const memoirsGrid = document.querySelector('.memoirs-grid');

memoirs.forEach(memoir => {
    const card = document.createElement('div');
    card.classList.add('memoir-card');
    card.innerHTML = `
        <h3 class="memoir-title">${memoir.title}</h3>
        <p class="memoir-date">Date: ${memoir.date}</p>
        <p class="memoir-category">Category: ${memoir.category}</p>
        <p class="memoir-mood">Mood: ${memoir.mood}</p>
    `;
    memoirsGrid.appendChild(card);
});


const sortSelect = document.getElementById('sort');
const filterCategorySelect = document.getElementById('filter-category');

// Function to display memoirs
function displayMemoirs(filteredMemoirs) {
    memoirsGrid.innerHTML = ''; // Clear the grid
    filteredMemoirs.forEach(memoir => {
        const card = document.createElement('div');
        card.classList.add('memoir-card');
        card.innerHTML = `
            <h3 class="memoir-title">${memoir.title}</h3>
            <p class="memoir-date">Date: ${new Date(memoir.date).toDateString()}</p>
            <p class="memoir-category">Category: ${memoir.category}</p>
            <p class="memoir-mood">Mood: ${memoir.mood}</p>
        `;
        memoirsGrid.appendChild(card);
    });
}

// Function to sort memoirs
function sortMemoirs(memoirs, criterion) {
    return [...memoirs].sort((a, b) => {
        if (criterion === 'title-asc') return a.title.localeCompare(b.title);
        if (criterion === 'title-desc') return b.title.localeCompare(a.title);
        if (criterion === 'date-asc') return new Date(a.date) - new Date(b.date);
        if (criterion === 'date-desc') return new Date(b.date) - new Date(a.date);
    });
}

// Function to filter memoirs by category
function filterMemoirsByCategory(memoirs, category) {
    if (category === 'all') return memoirs;
    return memoirs.filter(memoir => memoir.category === category);
}

// Event listeners for sorting and filtering
sortSelect.addEventListener('change', () => {
    const sortedMemoirs = sortMemoirs(memoirs, sortSelect.value);
    const filteredMemoirs = filterMemoirsByCategory(sortedMemoirs, filterCategorySelect.value);
    displayMemoirs(filteredMemoirs);
});

filterCategorySelect.addEventListener('change', () => {
    const sortedMemoirs = sortMemoirs(memoirs, sortSelect.value);
    const filteredMemoirs = filterMemoirsByCategory(sortedMemoirs, filterCategorySelect.value);
    displayMemoirs(filteredMemoirs);
});

// Initial display
displayMemoirs(memoirs);



const totalEntries = 50;
    const weeklyEntries = 4;
    const monthlyEntries = 15;
    document.getElementById('totalEntries').textContent = totalEntries;
    document.getElementById('weeklyEntries').textContent = weeklyEntries;
    document.getElementById('monthlyEntries').textContent = monthlyEntries;



    // Motivational Quote
    const quotes = [
        '"The best way to predict the future is to create it."',
        '"Success is not the key to happiness. Happiness is the key to success."',
        '"Believe in yourself and all that you are. Know that there is something inside you that is greater than any obstacle."',
        '"Don’t watch the clock; do what it does. Keep going."',
        '"Your time is limited, so don’t waste it living someone else’s life."'
    ];

    function getRandomQuote() {
        const randomIndex = Math.floor(Math.random() * quotes.length);
        document.getElementById('quoteText').textContent = quotes[randomIndex];
    }

    document.getElementById('newQuote').addEventListener('click', getRandomQuote);
    getRandomQuote();
