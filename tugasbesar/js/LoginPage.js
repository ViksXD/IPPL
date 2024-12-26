document.getElementById('signupForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    // Retrieve form values
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const role = document.getElementById('role').value;

    // Save to console (or send to server)
    console.log({
        username,
        email,
        password,
        role
    });

    // Clear form after submission
    this.reset();

    alert('Data has been saved successfully!');
});
