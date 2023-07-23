
/* window.onload = function() {
    swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
      });
}; */


 //validaciones
function validarInput(data, idspan) {
  var input = document.getElementById(data).value;
  var errorMensaje = document.getElementById(idspan);

  if (/^[a-zA-Z\s]+$/.test(input)) {
      // El input contiene solo letras
      errorMensaje.textContent = "";
  } else {
      // El input contiene caracteres no permitidos
      errorMensaje.textContent = "Solo se permiten el ingreso de letras.";
  }
}

function validarNumeros(data,idspan) {
  var input = document.getElementById(data).value;
  var errorMensaje = document.getElementById(idspan);

  var regex = /^\d+$/;

  if (regex.test(input)) {
      // El input contiene solo números
      errorMensaje.textContent = "";
  } else {
      // El input contiene caracteres no permitidos
      errorMensaje.textContent = "Solo se permiten el ingreso de números.";
  }
}

function validarEmail(inputId, idspan) {
  var input = document.getElementById(inputId).value;
  var errorMensaje = document.getElementById(idspan);

  var regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  if (regex.test(input)) {
      // El correo electrónico es válido
      errorMensaje.textContent = "";
  } else {
      // El correo electrónico no es válido
      errorMensaje.textContent = "El correo electrónico no es válido.";
  }
}