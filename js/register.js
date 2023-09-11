////Display the image in marketCus.php
function displayImage(input) {
    const profile = document.getElementById('profile');
    const image = document.getElementById('chosenPicture');
    const label = document.getElementById('inputImg');

    if (profile.files && profile.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        image.src = e.target.result;
        image.style.display = 'block';
        label.style.display = 'none';
      };

      reader.readAsDataURL(profile.files[0]);
    } else {
        image.src = "";
    }
  }

// Function to activate the input when the image is clicked
function activateInput() {
    const profile = document.getElementById('profile');
    profile.click(); // Trigger a click event on the input element
}

// Add an event listener to the image element to call activateInput() when clicked
const image = document.getElementById('chosenPicture');
image.addEventListener('click', activateInput);

//// Contact function for only taking numbers
function validateNumber(inputField) {
    const input = inputField.value;
    const errorMessage = document.getElementById('errorMessage');

    if (/^[0-9]{0,11}$/.test(input)) {
        errorMessage.textContent = '';
    } else {
        errorMessage.textContent = 'Please enter a valid 11-digit number.';
        inputField.value = '';
    }
}