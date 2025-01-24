

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


}


document.addEventListener('DOMContentLoaded', () => {
    displayMemoirs(memoirs); // Use the memoirs variable from the Blade template
});

const sortSelect = document.getElementById('sort');
const filterCategorySelect = document.getElementById('filter-category');

// Function to display memoirs
function displayMemoirs(memoirs) {
    const memoirsGrid = document.querySelector('.memoirs-grid');
    memoirsGrid.innerHTML = ''; // Clear the grid
    memoirs.forEach(memoir => {
        const card = document.createElement('div');
        card.classList.add('memoir-card');
        card.innerHTML = `
        <h3 class="memoir-title">${memoir.title}</h3>
        <p class="memoir-date">Date: ${new Date(memoir.date).toDateString()}</p>
        <p class="memoir-category">Category: ${memoir.category}</p>
        <p class="memoir-mood">Mood: ${memoir.mood}</p>
        <p class="memoir-body-hidden">${memoir.body}</p>
        `;
        card.addEventListener('click', () => openMemoirModal(memoir));

        memoirsGrid.appendChild(card);
    });
}

function openMemoirModal(memoir) {
    const modal = document.getElementById('memoir-modal');
    console.log(modal);
    document.getElementById('memoir-title').innerText = memoir.title;
    document.getElementById('display-date').innerText = new Date(memoir.date).toDateString();
    document.getElementById('category-select').innerText = memoir.category;
    document.getElementById('mood-select').innerText = memoir.mood;
    document.getElementById('memoir-body').innerText = memoir.body;

    modal.style.display = 'block'; // Show the modal
}

// Example of how to close the modal
document.getElementById('close-modal-memoir-btn').onclick = function() {
    document.getElementById('memoir-modal').style.display = 'none';
}

// Example of how to close the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('memoir-modal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
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





    window.addEventListener('resize', moveDashboard);

// Initial check on page load
moveDashboard();

function moveDashboard() {
    const dashboard = document.querySelector('.dashboard');
    const navbar = document.querySelector('.nav');

    // If the screen width is smaller than 768px, move the dashboard inside the navbar
    if (window.innerWidth <= 768) {
        if (!navbar.contains(dashboard)) {
            navbar.appendChild(dashboard);  // Move the dashboard to the navbar
            dashboard.style.position = 'absolute';  // You may want to adjust styles
            dashboard.style.top = '100%';  // Adjust the position if needed
        }
    } else {
        if (navbar.contains(dashboard)) {
            // Move the dashboard back to its original position
            const mainContent = document.querySelector('.container'); // Change this selector
            mainContent.appendChild(dashboard);
            dashboard.style.position = '';  // Reset styles when moved back
            dashboard.style.top = '';
        }
    }
}

const displayDate = document.querySelector("datedisplay");
  const datePicker = document.getElementById("date-picker");

  // Get today's date
  const today = new Date();

  // Format today's date for display in a human-readable format
  const options = { weekday: "short", year: "numeric", month: "numeric", day: "numeric" };
  const formattedDate = today.toLocaleDateString(undefined, options);

  // Set the `displayDate` to today's date
  displayDate.textContent = `📅 ${formattedDate}`;

  // Format today's date for the date input (yyyy-mm-dd format)
  const isoDate = today.toISOString().split("T")[0]; // Extract yyyy-mm-dd format

  // Set the default value of the date picker to today's date
  datePicker.value = isoDate;



  displayDate.addEventListener("click", () => {
    datePicker.classList.remove("hidden");
    datePicker.focus();
  });

  datePicker.addEventListener("change", () => {
    const selectedDate = new Date(datePicker.value);
    const options = { weekday: "short", year: "numeric", month: "numeric", day: "numeric" };
    displayDate.textContent = `📅 ${selectedDate.toLocaleDateString(undefined, options)}`;
    datePicker.classList.add("hidden");
  });

  datePicker.addEventListener("blur", () => {
    datePicker.classList.add("hidden");
  });
