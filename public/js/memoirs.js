var editprofilemodal = document.getElementById("edit-profile-modal");
var firstName = document.getElementById("firstname");
var lastName = document.getElementById("lastname");
var email = document.getElementById("email");
var username = document.getElementById("username");

console.log(user.firstname);
    document.getElementById("oldfirstname").innerText += " "+user.firstname;
    document.getElementById("oldlastname").innerText += " "+user.lastname;
    document.getElementById("oldemail").innerText += " "+user.email;
    document.getElementById("oldusername").innerText += " "+user.username;

// Get the button that opens the modal
  var settingsBtn = document.getElementById("editprofile");

  // Get the <span> element that closes the modal
  var closeModalBtn = document.getElementById("close-modal-btn");

  // When the user clicks the button, open the modal
  settingsBtn.onclick = function() {
    editprofilemodal.style.display = "flex";
  }

  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm-password');
  const submitBtn = document.getElementById('submitBtn');
  const errorMessage = document.getElementById('errorMessage');

  function validatePasswords() {
    if (password.value === confirmPassword.value && password.value.trim() !== '') {
      submitBtn.disabled = false;
      errorMessage.style.display = 'none';
    } else {
      submitBtn.disabled = true;
      errorMessage.style.display = 'block';
    }
  }

  password.addEventListener('input', validatePasswords);
  confirmPassword.addEventListener('input', validatePasswords);


  // When the user clicks the button, open the modal
  settingsBtn.onclick = function() {
    editprofilemodal.style.display = "flex";
  }

  // When the user clicks on <span> (x), close the modal
  closeModalBtn.onclick = function() {
    editprofilemodal.style.display = "none";
  }

  // When the user clicks anywhere outside the modal, close it
  window.onclick = function(event) {
    if (event.target == editprofilemodal) {
        editprofilemodal.style.display = "none";
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
        document.querySelector("#memoirid").value = memoir.memoirid;

        memoirsGrid.appendChild(card);
    });
}

function openMemoirModal(memoir) {
    const modal = document.getElementById('memoir-modal');


    document.getElementById('memoir-title').innerText = memoir.title;
    document.getElementById('display-date').innerText = new Date(memoir.date).toDateString();
    document.getElementById('category-select').value = memoir.category;
    document.getElementById('mood-select').value = memoir.mood;
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
    if (event.target == editprofilemodal) {
        editprofilemodal.style.display = "none";
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

document.addEventListener('DOMContentLoaded', function() {


    // Populate category and mood options if needed
    const categories = ['Personal', 'Work', 'Travel', 'Health'];
    const moods = ['Happy', 'Sad', 'Excited', 'Thoughtful'];

    const categorySelect = document.getElementById('category-select');
    const moodSelect = document.getElementById('mood-select');

    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category.toLowerCase();
        option.textContent = category;
        categorySelect.appendChild(option);
    });

    moods.forEach(mood => {
        const option = document.createElement('option');
        option.value = mood.toLowerCase();
        option.textContent = mood;
        moodSelect.appendChild(option);
    });
});



const displayDate = document.getElementById("display-date");
  const datePicker = document.getElementById("date-picker");

  // Get today's date
  const today = new Date();
  var selectedDate=today;

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
    const chosenDate = new Date(datePicker.value);
    const options = { weekday: "short", year: "numeric", month: "numeric", day: "numeric" };
    displayDate.textContent = `${chosenDate.toDateString(undefined, options)}`;
    console.log(chosenDate);
    selectedDate=chosenDate;
    datePicker.classList.add("hidden");
  });

  datePicker.addEventListener("blur", () => {
    datePicker.classList.add("hidden");
  });

    const saveButton = document.querySelector(".save-memoir-btn");
    saveButton.addEventListener("click", () => {
    const title = document.querySelector(".entry-title").textContent.trim();
    const body = document.querySelector(".entry-body").value.trim();
    const category = document.getElementById("category-select").value;
    const mood = document.getElementById("mood-select").value;
    const date = selectedDate ? selectedDate.toISOString().split('T')[0] : null; // Format the date as YYYY-MM-DD
    if (title && body) {
        console.log("Saving Memoir Entry...");
        console.log("Title:",typeof title, title);
        console.log("Body:",typeof body, body);
        console.log("Category:",typeof category, category);
        console.log("Mood:",typeof mood, mood);
        console.log("Date:",typeof date, date); // Log the date as a Date object

        document.querySelector("#title").value = title;
        document.querySelector("#date").value = date;


        alert("Your memoir has been saved!");
    } else {
        alert("Please fill in the title and entry text.");
    }
});


