// Capturar el formulario
const formInsert = document.forms["formInsert"];

formInsert.addEventListener("submit", (e) => {
  e.preventDefault(); // Evitar el reenvío del formulario
  document.getElementById("errorUsuario").textContent = "";
  document.getElementById("errorColor").textContent = "";

  // Capturar los valores de los campos
  const color = formInsert["color"].value.trim();
  const usuario = formInsert["usuario"].value.trim();
  const web = formInsert["web"].value;
  const sessionToken = formInsert["sessionToken"].value;

  // Validar los campos
  if (usuario === "" && color === "") {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    document.getElementById("errorColor").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  if (usuario === "") {
    document.getElementById("errorUsuario").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  if (color === "") {
    document.getElementById("errorColor").textContent =
      "No pongas sólo espacios en blanco";
    return;
  }
  // Esta expresion valida caracteres de la a-z, de la A-Z, todos los descritos y espacio '\s'.
  // Con el '+' al final, indicamos que los carácteres pueden estar 0 o más veces
const regex = /[a-zA-ZÇáéíóúàèìòùÁÉÍÓÚÀÈÌÒÙñç\s]+/;
// Esta expresión valida caracteres no alfanuméricos y números
const regex1 = /\W+/;
// Esta expresión valida números
const regex2 = /\d+/;

  // Validamos que si se cumple alguna de las regex en alguno de los insert, nos muestre error en los dos campos
//   if ((regex1.test(usuario) || regex2.test(usuario)) && (regex1.test(color) || regex2.test(color))) {
//     document.getElementById("errorUsuario").textContent =
//       "Hay que poner un texto válido";
//     document.getElementById("errorColor").textContent =
//       "Hay que poner un texto válido";
//     return;
//   }
//   if (regex1.test(usuario) || regex2.test(usuario)) {
//     document.getElementById("errorUsuario").textContent =
//       "Hay que poner un texto válido";
//     return;
//   }
//   if (regex1.test(color) || regex2.test(color)) {
//     document.getElementById("errorColor").textContent =
//       "Hay que poner un texto válido";
//     return;
//   }
if ((regex1.test(usuario) || regex2.test(usuario)) && (!regex.test(usuario))) {
    document.getElementById("errorUsuario").textContent =
      "Hay que poner un texto válido";
    return;
  }
  if ((regex1.test(color) || regex2.test(color))&& (!regex.test(color)) ) {
    document.getElementById("errorColor").textContent =
      "Hay que poner un texto válido";
    return;
  }

  if (web != "") {
    alert("Bot detectado");
    return;
  }

// PARA COMPROBACION DE RECEPCION E INSERCION DE DATOS 

// Se crea una constante que recoja los parametros de la página 
const datos = new URLSearchParams()
datos.append("color", color);
datos.append("usuario", usuario);
datos.append("sessionToken", sessionToken);
datos.append("web", web);

// Se envian los datos al servidor
// Se crea una constante que recoja los parametros de la página
fetch ("insert.php", {
    // Se indica la dirección del servidor
    // Se indica el método de envío
    method: "POST",
    // Se indica el cuerpo de la petición pasado a string
    body: datos.toString(),
    // Se indica el tipo de contenido, en este caso, se envía como formulario HTML
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
})
.then((response) => response.text())
.then((data) => {
    console.log(data);
    location.reload();
})
.catch((error) => {
    console.log(error);
    console.error("Error:", error);
});

//   alert("Hoy es viernes");


});
