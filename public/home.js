function toggleNav() {
    const nav = document.querySelector('.nav');
    nav.classList.toggle('open');  // Toggle 'open' class to show/hide nav bar
}

var modal = document.getElementById("settings-modal");

  // Get the button that opens the modal
  var settingsBtn = document.getElementById("settings");

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
