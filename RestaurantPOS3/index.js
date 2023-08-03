// index.js (frontend JavaScript)
const loginsec = document.querySelector('.login-section');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');

registerlink.addEventListener('click', () => {
  loginsec.classList.add('active');
});

loginlink.addEventListener('click', () => {
  loginsec.classList.remove('active');
});

const loginForm = document.querySelector('#login-form');
loginForm.addEventListener('submit', async (event) => {
  event.preventDefault();

  const username = document.querySelector('#login-username').value;
  const password = document.querySelector('#login-password').value;

  try {
    const response = await fetch('/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ username, password }),
    });

    const data = await response.json();
    console.log(data.message); // Muestra el mensaje de respuesta del servidor
  } catch (error) {
    console.error('Error:', error);
  }
});

const registerForm = document.querySelector('#register-form');
registerForm.addEventListener('submit', async (event) => {
  event.preventDefault();

  const name = document.querySelector('#register-name').value;
  const username = document.querySelector('#register-username').value;
  const password = document.querySelector('#register-password').value;

  try {
    const response = await fetch('/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name, username, password }),
    });

    const data = await response.json();
    console.log(data.message); // Muestra el mensaje de respuesta del servidor
  } catch (error) {
    console.error('Error:', error);
  }
});
