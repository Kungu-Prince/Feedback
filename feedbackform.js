function validateForm() {
    var name = document.getElementById('name').value.trim();
    var email = document.getElementById('email').value.trim();
    var feedback = document.getElementById('feedback').value.trim();
    var rating = document.getElementById('rating').value.trim();

    // Simple validation
    if (name === '' || email === '' || feedback === '' || rating === '') {
        alert('All fields are required');
        return false;
    }

    // Email format validation (basic regex)
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Invalid email address');
        return false;
    }

    // Rating validation (between 1 and 5)
    if (isNaN(rating) || rating < 1 || rating > 5) {
        alert('Rating must be a number between 1 and 5');
        return false;
    }

    // Form is valid
    return true;
}
