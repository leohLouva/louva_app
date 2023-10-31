function agregarTrabajador(){
    
    nombre = document.getElementById('nombre').value;
    apellido = document.getElementById('apellido').value;
    tipoUsuario = document.getElementById('tipoUsuario').value;
    nombreUsuario = document.getElementById('nombreUsuario').value;
    password = document.getElementById('password').value;
    confirmPassword = document.getElementById('confirmPassword').value;
    correo = document.getElementById('correo').value;
    curp = document.getElementById('curp').value;
    rfc = document.getElementById('rfc').value;
    nss = document.getElementById('nss').value;
    idProyecto = document.getElementById('idProyecto').value;
    contratista = document.getElementById('contratista').value;
    puesto = document.getElementById('puesto').value;
    telefonoPersonal = document.getElementById('telefonoPersonal').value;
    telefonoEmergencia = document.getElementById('telefonoEmergencia').value;
    tipoSangre = document.getElementById('tipoSangre').value;
    enfermedades = document.getElementById('enfermedades').value;
    alergias = document.getElementById('alergias').value;
    /*if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("El nombre del trabajador no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (apellido.length < 1 || apellido.length <= 3) {
        mostrarModal("El apellido del trabajador no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (contratista == 0) {
        mostrarModal("Debes elegir un contratista");        
        return;
    }
    if (puesto == 0) {
        mostrarModal("Debes elegir el puesto que desempeña el trabajador");        
        return;
    }
    if (nss.length !== 11) {
        mostrarModal("El número de seguro social no puede estar vacio y debe ser de 11 caracteres");        
        return;
    }
   
    if (telefonoPersonal.length < 1 || nombre.length <= 3) {
        mostrarModal("El teléfono personal no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (telefonoEmergencia.length < 1 || nombre.length <= 3) {
        mostrarModal("El teléfono de emergenica no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (tipoSangre.length < 1 || nombre.length <= 3) {
        mostrarModal("Escribe el tipo de sangre");        
        return;
    }
    if (enfermedades.length < 1) {
        //enfermedades = 'N/A';
    }
    
    if (alergias.length < 1) {
        //alergias = 'N/A';
    }*/
    
    var formData = {
        nombre: nombre,
        apellido: apellido,
        tipoUsuario: tipoUsuario,
        nombreUsuario: nombreUsuario,
        password: password,
        confirmPassword: confirmPassword,
        correo: correo,
        curp: curp,
        rfc: rfc,
        nss: nss,
        idProyecto: idProyecto,
        contratista: contratista,
        puesto: puesto,
        telefonoPersonal: telefonoPersonal,
        telefonoEmergencia: telefonoEmergencia,
        tipoSangre: tipoSangre,
        enfermedades: enfermedades,
        alergias: alergias
    };
    //document.getElementById("formTrabajador").submit();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: addingW,
            data: {
                data: formData,
                _token: csrfToken
            },
            success: function (data) {
                console.log(data.redirect);
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    mostrarModal("¡Todo bien!");
                }
            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar el error, por ejemplo, mostrar un mensaje de error al usuario
                mostrarModal("Error en la solicitud AJAX: " + error);
            }
        });

}

function editarTrabajador(){
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    contratista = document.getElementById("contratista").value;
    puesto = document.getElementById("puesto").value;
    nss = document.getElementById("nss").value;
    telefonoPersonal = document.getElementById("telefonoPersonal").value;
    telefonoEmergencia = document.getElementById("telefonoEmergencia").value;
    tipoSangre = document.getElementById("tipoSangre").value;
    enfermedades = document.getElementById("enfermedades").value;
    alergias = document.getElementById("alergias").value;

    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("El nombre del trabajador no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (apellido.length < 1 || apellido.length <= 3) {
        mostrarModal("El apellido del trabajador no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (contratista == 0) {
        mostrarModal("Debes elegir un contratista");        
        return;
    }
    if (puesto == 0) {
        mostrarModal("Debes elegir el puesto que desempeña el trabajador");        
        return;
    }
    if (nss.length !== 11) {
        mostrarModal("El número de seguro social no puede estar vacio y debe ser de 11 caracteres");        
        return;
    }
   
    if (telefonoPersonal.length < 1 || nombre.length <= 3) {
        mostrarModal("El teléfono personal no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (telefonoEmergencia.length < 1 || nombre.length <= 3) {
        mostrarModal("El teléfono de emergenica no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    if (tipoSangre.length < 1 || nombre.length <= 3) {
        mostrarModal("Escribe el tipo de sangre");        
        return;
    }
    if (enfermedades.length < 1) {
        //mostrarModal("Agr no puede estar vacio y debe tener más de 3 caracteres");        
        enfermedades.value = 'N/A';

    }
    if (alergias.length < 1 ) {
        //mostrarModal("El nombre no puede estar vacio y debe tener más de 3 caracteres");  
        alergias.value = 'N/A';      
        
    }


    document.getElementById("editForm").submit();

}


function printCard() {
    // Obtener el card que deseas imprimir por su id
    var cardToPrint = document.getElementById('credencialTrabajador');

    if (cardToPrint) {
        // Ocultar el botón de impresión antes de la impresión
        var printButton = cardToPrint.querySelector('.btn-outline-primary');
        if (printButton) {
            printButton.style.display = 'none';
        }

        // Imprimir el card
        window.print();

        // Mostrar nuevamente el botón de impresión después de la impresión (opcional)
        if (printButton) {
            printButton.style.display = 'block';
        }
    }
}

function previewFiles() {
    var previewContainer = document.querySelector('#file-preview-container');
    var fileInput = document.querySelector('input[type=file]');
    var files = fileInput.files;

    previewContainer.innerHTML = ""; // Limpiar la vista previa anterior

    for (var i = 0; i < Math.min(files.length, 5); i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onloadend = function () {
            var img = document.createElement('img');
            img.src = reader.result;
            img.style.maxWidth = '100px';
            img.style.maxHeight = '100px';
            previewContainer.appendChild(img);
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
}

