document.getElementById('show-password').addEventListener('change', function () {
  const passwordField = document.getElementById('password');
  if (this.checked) {
    passwordField.type = 'text';
  } else {
    passwordField.type = 'password';
  }
});
