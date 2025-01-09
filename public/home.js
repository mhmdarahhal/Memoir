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
    modal.style.display = "block";
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
