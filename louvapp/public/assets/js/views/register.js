
function registrarUsuario(){
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var email = document.getElementById("txtEmail").value;
    var telefonoPersonal = document.getElementById("telefonoPersonal").value;
    var rfc = document.getElementById("rfc").value;
    
    /*if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("DEBES AGREGAR TU NOMBRE");        
        return;
    }
    if (apellido.length < 1 || apellido.length <= 3) {
        mostrarModal("DEBES AGREGAR TU APELLIDO");        
        return;
    }
    if (email.length < 1 || email.length <= 3) {
        mostrarModal("DEBES AGREGAR UN CORREO ELECTRÓNICO");        
        return;
    }
    if (rfc.length < 1 || rfc.length <= 3) {
        mostrarModal("DEBES AGREGAR TU REGISTRO FEDERAL DEL CONTRIBUYENTE (RFC) ");        
        return;
    }*/
    // Reemplaza los espacios con "."
    nombre = nombre.replace(/ /g, '.');
    apellido = apellido.replace(/ /g, '.');

    var nombreUsuario = nombre + "." + apellido;
    var password = generarPassword(12);
    var flImage = 'user.png';
    var formData = {
        nombre: nombre,
        apellido: apellido,
        tipoUsuario: 5,
        nombreUsuario: nombreUsuario,
        password: password,
        correo: email,
        rfc: rfc,
        idProyecto: 0,
        contratista: 0,
        puesto: 47,
        telefonoPersonal: telefonoPersonal,
        telefonoEmergencia: telefonoPersonal,
        flImage:flImage
    };
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    console.log(formData);

    $.ajax({
        type: 'POST',
        url: registrandoContra,
        data: {
            data: formData,
            _token: csrfToken
        },
        success: function (data) {
            console.log(data);
            /*if (data.status == 1) {
                mostrarModal(data.title,data.message,1);
                setTimeout(function () {
                    window.location.href = data.redirect;
                    mostrarmodal("FELICIDADES! TE ACABAS DE REGISTRAR EN BUBA")
                }, 2000);
                
            } else {
                
            }*/
        },
        error: function (xhr, status, error) {
            mostrarModal("Error en la solicitud AJAX: ", error.message );
        }
    });

}

function showBtn(){
    var checkbox = document.getElementById("checkbox-signup");
    if (checkbox.checked) {
        var elemento = document.getElementById('btnSignIn');
        elemento.style.display = "block";
    } else {
        // El checkbox no está marcado, realiza acciones si es necesario
        var elemento = document.getElementById('btnSignIn');
        elemento.style.display = "none";
        mostrarModal("Para continuar debes aceptar el aviso de privacidad")
        return;
    }
   
}

function mostrarModal(message) {
    // Obtén el modal y el elemento de mensaje dentro del modal
    var modal = document.getElementById("myModal");
    var modalMessage = document.getElementById("modalMessage");

    // Establece el mensaje en el modal
    modalMessage.textContent = message;

    // Muestra el modal
    $(modal).modal('show');
}

function generarPassword(length) {
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$%&!@";
    var password = "";
    for (var i = 0; i < length; i++) {
        var randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }
    return password;
}
