const loginForm = document.getElementById('login-form');

loginForm.addEventListener('submit', (e) => {
  e.preventDefault();

  const formData = new FormData(loginForm);
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == 'usuario') {
        window.location.href = 'iniciousuario.php';
      } else if (this.responseText === 'administrativo') {
        window.location.href = 'admin_solicitudes.php';
      } else {
        alert('Nombre de usuario o contraseña incorrectos');
      }
    }
  };

  xhr.open('POST', loginForm.action, true); 
  xhr.send(formData);
});