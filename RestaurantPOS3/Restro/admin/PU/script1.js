const inputIcon = document.querySelector(".input__icon");
const inputPassword = document.querySelector(".input__field");

inputIcon.addEventListener("click", () => {
  inputIcon.classList.toggle("ri-eye-off-line");
  inputIcon.classList.toggle("ri-eye-line");
  inputPassword.type = inputPassword.type === "password" ? "text" : "password";
});

const inputIconName = document.querySelector(".input__icon");
const inputName = document.querySelector(".input__field");

inputIcon.addEventListener("click", () => {
  inputIcon.classList.toggle("ri-eye-off-line");
  inputIcon.classList.toggle("ri-eye-line");
  inputPassword.type = inputPassword.type === "name" ? "text" : "name";
});


