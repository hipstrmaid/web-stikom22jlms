// Check if an element with id 'alert' exists
var errorAlert = document.getElementById('alert');
if (errorAlert) {
    // Automatically close the error alert after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        errorAlert.style.display = 'none';
    }, 3000);
}
