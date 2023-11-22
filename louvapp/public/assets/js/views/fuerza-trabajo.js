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
    flImage = document.getElementById('flImage').value;
    
    
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("EL NOMBRE DEL TRABAJADOR NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }
    if (apellido.length < 1 || apellido.length <= 3) {
        mostrarModal("EL APELLIDO DEL TRABAJADOR NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }

    if (contratista == 0) {
        mostrarModal("DEBES ELEGIR UN CONTRATISTA");        
        return;
    }
    if (idProyecto == '') {
        mostrarModal("DEBES ELEGIR UN PROYECTO, SI NO VES NINGUNO, PIDE A UN ADMINISTRADOR QUE LE AGREGUE EL PROYECTO AL CONTRATISTA");
        return;
    }
    
    if (puesto == 0) {
        mostrarModal("DEBES ELEGIR EL PUESTO QUE DESEMPEÑA EL TRABAJADOR");        
        return;
    }
    if (nss.length < 1) {
        mostrarModal("EL NÚMERO DE SEGURO SOCIAL NO PUEDE ESTAR VACIO Y DEBE SER DE 11 CARACTERES");        
        return;
    }
   
    if (telefonoPersonal.length < 1 || nombre.length <= 3) {
        mostrarModal("EL TELÉFONO PERSONAL NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }
    if (telefonoEmergencia.length < 1 || nombre.length <= 3) {
        mostrarModal("EL TELÉFONO DE EMERGENICA NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }
    if (flImage == '') {
        mostrarModal("AGREGA UNA FOTO DEL USUARIO");
        return;
    }

    if (password !== confirmPassword) {
        mostrarModal('LAS CONTASEÑAS NO COINCIDEN');
        return
    }else{
        if (apellido.length < 1 || apellido.length <= 3) {
            mostrarModal("LA CONTRASEÑA NO PUEDE ESTAR VACIA");        
            return;
        }
    }
    
    
    var formData = {
        nombre: nombre,
        apellido: apellido,
        tipoUsuario: tipoUsuario,
        nombreUsuario: nombreUsuario,
        password: password,
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
        alergias: alergias,
        flImage:flImage
    };
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: addingW,
            data: {
                data: formData,
                _token: csrfToken
            },
            success: function (data) {

                if (data.status == 1) {
                    mostrarModal(data.title,data.message,1);
                    setTimeout(function () {
                        window.location.href = data.redirect;
                    }, 2000);
                    
                } else {
                    
                }
            },
            error: function (xhr, status, error) {
                mostrarModal("Error en la solicitud AJAX: ", error );
            }
        });

}

function editarUsuarioON(){
    nombre = document.getElementById("nombre");
    nombre.disabled = false;
    apellido = document.getElementById("apellido");
    apellido.disabled = false;
    tipoUsuario = document.getElementById("tipoUsuario");
    tipoUsuario.disabled = false;
    nombreUsuario = document.getElementById("nombreUsuario");
    nombreUsuario.disabled = false;
    password = document.getElementById("password");
    password.disabled = false;
    curp = document.getElementById("curp");
    curp.disabled = false;
    rfc = document.getElementById("rfc");
    rfc.disabled = false;
    nss = document.getElementById("nss");
    nss.disabled = false;
    correo = document.getElementById("correo");
    correo.disabled = false;
    flImage = document.getElementById("flImage");
    flImage.disabled = false;    
    idProyecto = document.getElementById("idProyecto");
    idProyecto.disabled = false;
    contratista = document.getElementById("contratista");
    contratista.disabled = false;
    puesto = document.getElementById("puesto");
    puesto.disabled = false;
    telefonoPersonal = document.getElementById("telefonoPersonal");
    telefonoPersonal.disabled = false;
    telefonoEmergencia = document.getElementById("telefonoEmergencia");
    telefonoEmergencia.disabled = false;
    tipoSangre = document.getElementById("tipoSangre");
    tipoSangre.disabled = false;
    enfermedades = document.getElementById("enfermedades");
    enfermedades.disabled = false;
    alergias = document.getElementById("alergias");
    alergias.disabled = false;
    changePass = document.getElementById("changePass");
    changePass.disabled = false;
    guardar =document.getElementById("guardar-btn");
    guardar.style.display = 'block';
    on =document.getElementById("on-btn");
    on.style.display = 'none';
    off =document.getElementById("off-btn");
    off.style.display = 'block';
    
    
    

}

function editarUsuarioOFF(){
    nombre = document.getElementById("nombre");
    nombre.disabled = true;
    apellido = document.getElementById("apellido");
    apellido.disabled = true;
    tipoUsuario = document.getElementById("tipoUsuario");
    tipoUsuario.disabled = true;
    nombreUsuario = document.getElementById("nombreUsuario");
    nombreUsuario.disabled = true;
    password = document.getElementById("password");
    password.disabled = true;
    curp = document.getElementById("curp");
    curp.disabled = true;
    rfc = document.getElementById("rfc");
    rfc.disabled = true;
    nss = document.getElementById("nss");
    nss.disabled = true;
    correo = document.getElementById("correo");
    correo.disabled = true;
    flImage = document.getElementById("flImage");
    flImage.disabled = true;    
    idProyecto = document.getElementById("idProyecto");
    idProyecto.disabled = true;
    contratista = document.getElementById("contratista");
    contratista.disabled = true;
    puesto = document.getElementById("puesto");
    puesto.disabled = true;
    telefonoPersonal = document.getElementById("telefonoPersonal");
    telefonoPersonal.disabled = true;
    telefonoEmergencia = document.getElementById("telefonoEmergencia");
    telefonoEmergencia.disabled = true;
    tipoSangre = document.getElementById("tipoSangre");
    tipoSangre.disabled = true;
    enfermedades = document.getElementById("enfermedades");
    enfermedades.disabled = true;
    alergias = document.getElementById("alergias");
    alergias.disabled = true;

    guardar =document.getElementById("guardar-btn");
    guardar.style.display = 'none';
    on =document.getElementById("on-btn");
    on.style.display = 'block';
    off =document.getElementById("off-btn");
    off.style.display = 'none';
}

function actualizarUsuario(){
    nombre = document.getElementById('nombre').value;
    apellido = document.getElementById('apellido').value;
    tipoUsuario = document.getElementById('tipoUsuario').value;
    nombreUsuario = document.getElementById('nombreUsuario').value;
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
    
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("EL NOMBRE DEL TRABAJADOR NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 1 CARACTER");        
        return;
    }
    if (apellido.length < 1 || apellido.length <= 3) {
        mostrarModal("EL APELLIDO DEL TRABAJADOR NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 1 CARACTER");        
        return;
    }
    if (contratista == 0) {
        mostrarModal("DEBES ELEGIR UN CONTRATISTA");        
        return;
    }
    if (idProyecto == '') {
        mostrarModal("DEBES ELEGIR UN PROYECTO, SI NO VES NINGUNO, PIDE A UN ADMINISTRADOR QUE LE AGREGUE EL PROYECTO AL CONTRATISTA");
        return;
    }
    if (puesto == 0) {
        mostrarModal("DEBES ELEGIR EL PUESTO QUE DESEMPEÑA EL TRABAJADOR");        
        return;
    }
    if (nss.length !== 11) {
        mostrarModal("EL NÚMERO DE SEGURO SOCIAL NO PUEDE ESTAR VACIO Y DEBE SER DE 11 CARACTERES");        
        return;
    }
   
    if (telefonoPersonal.length < 1 || nombre.length <= 3) {
        mostrarModal("EL TELÉFONO PERSONAL NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }
    
    if (tipoSangre.length < 1 || nombre.length <= 3) {
        mostrarModal("ESCRIBE EL TIPO DE SANGRE");        
        return;
    }
    
    var formData = {
        nombre: nombre,
        apellido: apellido,
        tipoUsuario: tipoUsuario,
        nombreUsuario: nombreUsuario,
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

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: editingW,
        data: {
            data: formData,
            _token: csrfToken
        },
        success: function (data) {
            console.log(data)

            
            if (data.status == 1) {
            

            setTimeout(function () {
                window.location.href = data.redirect;
            }, 2000);
        
            } else {
                
            }
        },
        error: function (xhr, status, error) {
            mostrarModal("Error en la solicitud AJAX: ", error );
        }
    });

}

function uploadDocumentationWorker(){
    workerId = document.getElementById("workerId").value;
    typeOfDocument = document.getElementById('typeOfDocument').value;
    contractorName = document.getElementById('contractorName').value;
    fileInput = document.getElementById('formFileLg');

    if (typeOfDocument == 0) {
        mostrarModal("ERROR","DEBES ELEGIR UN TIPO DE DOCUMENTO A SUBIR.","2");
        return;
    }
    
    var formData = new FormData();
    formData.append('typeOfDocument', typeOfDocument);
    formData.append('workerId', workerId);
    formData.append('contractorName', contractorName);
    formData.append('file', fileInput.files[0]); // Asegúrate de que solo estás enviando el primer archivo si permites múltiples archivos


    //document.getElementById("myForm").submit();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: uploadD,
        data: formData,
        processData: false, // Evita que jQuery procese los datos
        contentType: false, // No establezcas el tipo de contenido porque FormData lo hace automáticamente
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (data) {
            console.log(data)
            
            if (data.status == 1) {
                mostrarModal('ÉXITO!',data.message + " " + data.documento,data.status);
                setTimeout(function () {
                    var fileInput = document.getElementById('formFileLg');
                    fileInput.value = '';
                    var typeOfDocumentSelect = document.getElementById('typeOfDocument');
                    typeOfDocumentSelect.selectedIndex = 0;
                }, 1000);
                
            } else {
                mostrarModal(data.status,data.message + " " + data.documento);
                return;
            }
        },
        error: function (xhr, status, error) {
            mostrarModal("Error en la solicitud AJAX: ", error );
        }
    });
}


function eliminarDocumento(idUser){

        // Realiza una solicitud AJAX para obtener documentos asociados al usuario
        $.ajax({
                type: 'DELETE',
                url: eliminarArchivo,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                console.log(data)
                mostrarModal('ÉXITO!',data.message,data.status);
                // Actualiza el contenido de la pestaña con los documentos recibidos
                //$('# .card-body').html(data);
                cargarDocumentos();
            },
            error: function (xhr, status, error) {
                console.error('Error al cargar documentos: ', error);
            }
        });
    
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
function getProjects(){
    var contratistaId = document.getElementById('contratista').value;
    
    if (contratistaId > 0) {
        $.ajax({
            url: '/obteberProyectos/' + contratistaId,
            type: 'GET',
            success: function(data) {
                console.log(data);
                var projectsSelet = $('#idProyecto');
                projectsSelet.empty(); 
                data.proyectos.forEach(function(project) {
                    projectsSelet.append('<option value="' + project.idProject + '">' + project.projectName  + '</option>');
                });
            }
        });
    }  
}

function cargarDocumentos() {
    $.ajax({
        type: 'GET',
        url: obtenerDocumentos,
        success: function (data) {
            // Actualiza el contenido de la pestaña con los documentos recibidos
            $('#uploaded .card-body').html(data);
            
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar documentos: ', error);
        }
    });
}

function getValidarDocumentos(){
    $.ajax({
        type: 'GET',
        url: validateDoc,
        success: function (data) {
            // Actualiza el contenido de la pestaña con los documentos recibidos
            $('#validate .card-body').html(data);
            
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar documentos: ', error);
        }
    });
}

function validarDocumentos(){
    var formData = {};


    $('input[name^="validated"]').each(function() {
        var idDocument = $(this).attr('id');
        var isChecked = +$(this).is(':checked');
        formData[idDocument] = isChecked;
    });
    
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: actualiza,
        data: {
            data: formData,
            _token: csrfToken
        },
        success: function (data) {

            if (data.status == 1) {
                mostrarModal("ÉXITO","SE VALIDARON CORRECTAMENTE LOS DOCUMENTOS",data.status)
                //$('#validate .card-body').html(data);
                getValidarDocumentos();
            
            }else{
                mostrarModal("ERROR",data.message,data.status)
            }
        },
        error: function (xhr, status, error) {
            mostrarModal("Error en la solicitud AJAX: ", error );
        }
    });
}


function changePassword(){
    var changePass = document.getElementById("changePass").checked;
    if (changePass == true) {
        $('#update-pass-modal').modal('show');

    }else{
        $('#update-pass-modal').modal('close');
    }
}

function updatePassword(){
    
    password = document.getElementById('password').value;
    var formData = {
     password : password
    };
     //document.getElementById("myForm").submit();
     var csrfToken = $('meta[name="csrf-token"]').attr('content');
     $.ajax({
        type: 'POST',
        url: editPassword,
        data: {
            data: formData,
            _token: csrfToken
        },
        success: function (data) {

            if (data.status == 1) {
                mostrarModal(data.title,data.message,data.status)
                //$('#validate .card-body').html(data);
                setTimeout(function () {
                    window.location.href = data.redirect;
                }, 2000);
            }else{
                mostrarModal("ERROR",data.message,data.status)
            }
        },
        error: function (xhr, status, error) {
            mostrarModal("Error en la solicitud AJAX: ", error );
        }
    });
    
}

function validatePassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    btnUpdatePassword = document.getElementById("btnUpdatePassword");

    if (password !== confirmPassword) {
       mostrarModal('LAS CONTASEÑAS NO COINCIDEN');
       btnUpdatePassword.style.display = 'none';
       return
   }else{
       if (password.length < 1 || password.length <= 10) {
           mostrarModal("LA CONTRASEÑA NO PUEDE ESTAR VACIA Y DEBE TENER AL MENOS 10 CARACTERES");  
           btnUpdatePassword.style.display = 'none';
           return;
       }else{
            btnUpdatePassword.style.display = 'block';
       }
   }
}