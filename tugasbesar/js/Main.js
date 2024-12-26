document.addEventListener("DOMContentLoaded", () => {
    const currentPage = document.body.getAttribute("data-page");

    if (currentPage === "Landing Page") {
        document.getElementById('SignUp').addEventListener('click', () => {
            window.location.href = 'SignUp.html'; // Redirect to SignUp page
        });

        document.getElementById('Login').addEventListener('click', () => {
            window.location.href = 'Login.html'; // Redirect to Login page
        });
    } else if (currentPage === "Registration Page") {
        document.getElementById('Login').addEventListener('click', () => {
            window.location.href = 'Login.html'; // Redirect to Login page
        });

        // Form submission event
        document.getElementById('signupForm').addEventListener('submit', function (event) {
            // Allow form submission by not calling `preventDefault`
            // Validate the form if necessary before submission
            const role = document.getElementById('role').value;
            if (!role) {
                event.preventDefault(); // Stop submission if role is not selected
                alert("Please select a role before submitting.");
            }
        });
    } else if (currentPage === "Login Page") {
        document.getElementById('SignUp').addEventListener('click', () => {
            window.location.href = 'SignUp.html'; // Redirect to SignUp page
        });
    }
});
