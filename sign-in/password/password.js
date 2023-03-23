const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const confirmPasswordError = document.getElementById("confirm-password-error");

passwordInput.addEventListener("input", function () {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  if (password !== confirmPassword) {
    confirmPasswordError.textContent = "Las contraseñas no coinciden.";
  } else {
    confirmPasswordError.textContent = "";
  }
});

confirmPasswordInput.addEventListener("input", function () {
  const password = passwordInput.value;
  const confirmPassword = confirmPasswordInput.value;

  if (password !== confirmPassword) {
    confirmPasswordError.textContent = "Las contraseñas no coinciden.";
  } else {
    confirmPasswordError.textContent = "";
  }
});





