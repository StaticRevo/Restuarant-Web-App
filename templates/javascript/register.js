function checkPassword() {
  const password = document.getElementById('password').value.trim();
  const confirmPassword = document.getElementById('confirmPassword').value.trim();
  if (password !== confirmPassword) {
    document.getElementById('confirmPassword').setCustomValidity('Passwords do not match');
    return false;
  } else {
    document.getElementById('confirmPassword').setCustomValidity('');
    return true;
  }
}

const confirmPasswordInput = document.getElementById('confirmPassword');
confirmPasswordInput.addEventListener('input', () => {
  checkPassword();
});

const emailInput = document.getElementById('emailInput');
emailInput.addEventListener('input', () => {
  const email = emailInput.value;
  const isValid = email.includes('@');
  if (!isValid) {
    emailInput.setCustomValidity('Email must contain the "@" symbol');
    return false;
  }else {
    emailInput.setCustomValidity('');
    return true;
  }
});
  