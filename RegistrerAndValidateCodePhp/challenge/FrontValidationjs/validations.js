

function validarFormulario(event) {
  
  //event.preventDefault();

    let nombre = document.getElementById('nombre').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
  
    if (nombre === '') {
      alert('Por favor, ingrese su nombre');
      event.preventDefault();
      return false;
    }
  
    if (email === '') {
      alert('Por favor, ingrese su correo electrónico');
      event.preventDefault();
      return false;
    }
  
    if (password === '') {
      alert('Por favor, ingrese su contraseña');
      event.preventDefault();
      return false;
    }
  
    return true;
  }

  const form= document.querySelector('#form');
  form.addEventListener('submit',validarFormulario);
  