

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

const entryTitle = document.querySelector(".entry-title");
const entryBody = document.querySelector(".entry-body");

// Restrict title to a single line and focus on entry-body on Enter
entryTitle.addEventListener("keydown", (e) => {
  // Prevent Enter key from creating a new line
  if (e.key === "Enter") {
    entryTitle.textContent = entryTitle.textContent
    .toLowerCase()
    .replace(/\b\w/g, (char) => char.toUpperCase());
    e.preventDefault();
    entryBody.focus(); // Focus the entry body
  }
});




const displayDate = document.getElementById("display-date");
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

  const saveButton = document.querySelector(".save-now");
saveButton.addEventListener("click", () => {
    const title = document.querySelector(".entry-title").textContent.trim();
    const body = document.querySelector(".entry-body").value.trim();
    const category = document.getElementById("category-select").value;
    const mood = document.getElementById("mood-select").value;

    if (title && body) {
        console.log("Saving Memoir Entry...");
        console.log("Title:", title);
        console.log("Body:", body);
        console.log("Category:", category);
        console.log("Mood:", mood);

        alert("Your memoir has been saved!");
    } else {
        alert("Please fill in the title and entry text.");
    }
});



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
            const mainContent = document.querySelector('.main-content'); // Change this selector
            mainContent.appendChild(dashboard);
            dashboard.style.position = '';  // Reset styles when moved back
            dashboard.style.top = '';
        }
    }
}
