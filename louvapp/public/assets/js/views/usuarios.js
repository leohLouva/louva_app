
function agregarUsuario()
{
    nombre = document.getElementById("txtName").value;
    apellido = document.getElementById("txtLastName").value;
    username = document.getElementById("txtUserName").value;
    email = document.getElementById("txtEmail").value;
    password = document.getElementById("txtPassword").value;
    confirmPassword = document.getElementById("txtConfirmPassword").value;
    acceso = document.getElementById("slcAccess").value;
    
    
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("El nombre no puede estar vacio y debe tener más de 3 caracteres");
        console.log("Antes de establecer el foco");
        
        return;
    }
    
    if (apellido.length < 1 || apellido.length <= 3) {
        mostrarModal("El apellido no puede estar vacio y debe tener más de 3 caracteres");
        return;
    }

    if (username.length < 1 || username.length <= 3) {
        mostrarModal("El nombre de usuario no puede estar vacio y debe tener más de 3 caracteres");
        return;
    }

    var check_email = '[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@](louvastudio.com)';
    var patt = new RegExp(check_email);
    var result = patt.test(email);
    if (!result) {
      mostrarModal("El correo debe ser un correo de Louva Studio Ej: correo@louvastudio.com  " + email)
      return;
    }

    if (password.length < 6 || confirmPassword.length < 6) {
        mostrarModal("El password y la confirmación del password deben tener al menos 6 caracteres.");
        return;
      } else if (password !== confirmPassword) {
        mostrarModal("Los passwords no coinciden.");
        return;
      }
    
    if (acceso == 0) {
        mostrarModal("Debes elegir una opción") 
        return;
      }
      
    //document.getElementById("formUsuario").submit();
    louvax.setURL("usuarios/lista-usuarios");
    louvax.asyncGet([{ action: "lista-usuarios" }])
        .then(jsonInfo => {

            console.log(jsonInfo)
        })
        .catch(err => {
            
            

            console.log(err.message);
        });
    
}

