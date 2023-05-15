// document.addEventListener("DOMContentLoaded", function() {
//     // Select the form element
//     var form = document.querySelector("form");

//     // Add event listener for form submission
//     form.addEventListener("submit", function(event) {
//         event.preventDefault(); // Prevent form submission

//         // Fetch form field values
//         var nameInput = document.getElementById("player_name");
//         var emailInput = document.getElementById("email");
//         var passwordInput = document.getElementById("password");
//         var confirmPasswordInput = document.getElementById("c_password");

//         // Validate name
//         if (nameInput.value.trim() === "") {
//             alert("Please enter your name.");
//             nameInput.focus();
//             return;
//         }

//         // Validate email
//         var emailRegex = /^\S+@\S+\.\S+$/;
//         if (!emailRegex.test(emailInput.value.trim())) {
//             alert("Please enter a valid email address.");
//             emailInput.focus();
//             return;
//         }

//         // Validate password
//         if (passwordInput.value.length < 6) {
//             alert("Password should be at least 6 characters long.");
//             passwordInput.focus();
//             return;
//         }

//         // Check password complexity
//         var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{6,}$/;
//         if (!passwordRegex.test(passwordInput.value)) {
//             alert("Password should contain at least one uppercase letter, one lowercase letter, one special character, and one number.");
//             passwordInput.focus();
//             return;
//         }

//         // Validate confirm password
//         if (confirmPasswordInput.value !== passwordInput.value) {
//             alert("Passwords do not match.");
//             confirmPasswordInput.focus();
//             return;
//         }

//         // If all validations pass, submit the form
//         form.submit();
//     });
// });

function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('c_password').value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()]).{6,}$/;
    document.getElementById("returnValue").value = false;
    if (!emailRegex.test(email)) {
        alert('Invalid email address');
        // return false;
    }
    else if (!passwordRegex.test(password)) {
        alert('Password must contain at least 6 characters, one uppercase letter, one lowercase letter, one special character, and one digit');
        // return false;
    }
    else if (password !== confirmPassword) {
        alert('Password and confirm password do not match');
        // return false;
    }
    else
    {
        document.getElementById("returnValue").value = true;
    }

    // return true;
}
