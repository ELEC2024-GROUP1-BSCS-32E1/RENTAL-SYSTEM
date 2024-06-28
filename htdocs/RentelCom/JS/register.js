document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('register-form');
    const errorMsg = document.getElementById('error-msg');

    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        const response = await fetch('http://localhost/RentelCom/php/api/register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ username, password })
        });

        const result = await response.json();

        if (result.status === 'success') {
            // Redirect to login page on successful registration
            window.location.href = '../php/login.php';
        } else {
            // Display error message
            errorMsg.textContent = result.message;
        }
    });
});
