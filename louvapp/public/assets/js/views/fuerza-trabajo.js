function verFormEditarTrabajador(ruta){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    //window.location.href = data.redirect;
    
    $.ajax({
        url: ruta,
        type: 'GET',

        success: function(response) {
            console.log(response);
            window.location.href = response.viewUrl;
        },
        error: function(error) {
            mostrarModal('ERROR','ERROR AL REALIZAR LA PETICIÓN :' +error,'2' );
        }
    });
    
}

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
    if (password != confirmPassword) {
        mostrarModal('LAS CONTASEÑAS NO COINCIDEN');
        return
    }else{
        if (password.length < 1 || password.length <= 5 && confirmPassword.length < 1 || confirmPassword.length <= 5) {
            mostrarModal("LA CONTRASEÑA NO PUEDE ESTAR VACIA Y DEBE TENER AL MENOS 5 CARACTERES");  
            return;
        }
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
    formData.append('file', fileInput.files[0]); 


    //document.getElementById("myForm").submit();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type: 'POST',
        url: uploadD,
        data: formData,
        processData: false, 
        contentType: false, 
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
            mostrarModal("ERROR AL CARGAR EL DOCUMENTO: ", error );
        }
    });
}


function eliminarDocumento(idDocument){

        
        $.ajax({
                type: 'POST',
                //url: eliminarArchivo,
                url: '/eliminarArchivo/' + idDocument,  
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                console.log(data)
                if (data.status == 1) {
                    mostrarModal('ÉXITO!',data.message,data.status);
                    cargarDocumentos();    
                }else{
                    mostrarModal('Error!',data.message,data.status);
                    return;
                }
                
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
                location.reload();
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

function validatePasswordAdd() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    if (password === confirmPassword) {

    }else{
        mostrarModal("ERROR!","LOS PASSWORD DEBEN DE COINCIDIR",2);
        document.getElementById("confirmPassword").value = "";
    }
}
function validatePassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    btnUpdatePassword = document.getElementById("btnUpdatePassword");

    if (password != confirmPassword) {
       mostrarModal('LAS CONTASEÑAS NO COINCIDEN');
       btnUpdatePassword.style.display = 'none';
       return
   }else{
       if (password.length < 1 || password.length <= 5) {
           mostrarModal("LA CONTRASEÑA NO PUEDE ESTAR VACIA Y DEBE TENER AL MENOS 5 CARACTERES");  
           btnUpdatePassword.style.display = 'none';
           return;
       }else{
            btnUpdatePassword.style.display = 'block';
       }
   }
}

function verFTtrabajador(idUser){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    //var table = $('#table_tf_personal').DataTable();
    var existingTable = $("#table_tf_personal").DataTable();
    if (existingTable) {
        existingTable.destroy();
    }
    
    var table = $("#table_tf_personal").DataTable({
        "language": {
            "sProcessing": "PROCESANDO...",
            "sLengthMenu": "MOSTRANDO _MENU_",
            "sZeroRecords": "SIN RESULTADOS",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "MOSTRANDO  _START_ al _END_ DE UN TOTAL DE _TOTAL_ ",
            "sInfoEmpty": "MOSTRANDO 0 al 0 DE UN TOTAL de 0 ",
            "sInfoFiltered": "(FILTRADO DE UN TOTAL DE _MAX_ )",
            "sInfoPostFix": "",
            "deferRender": true,
            "sSearch": "BUSCAR:",
            "sLoadingRecords": "OBTENIENDO INFORMACIÓN...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
        },
        "processing": true,
        "serverSide": true,
        "responsive": true,
        /*"scrollY": parseInt($(window).height() * .80),
        "scrollX": false,
        "pageLength": 100,
        "columnDefs": [
            { "orderable": false, "targets": 6 }
          ],
        //"pagingType": "full_numbers",
        "order": [  
                    [0, "desc"]
          ],*/
        ajax: {
            type: 'GET',
            'headers': {
                'X-CSRF-TOKEN': csrfToken
            },
            'data': {
                'action': 'verTablaFT',
            },
            'url': ftPersonal,
            error: function (xhr, error, thrown) {
                mostrarModal("Error", "AL CARGAR LA TABLA HUBO UN ERROR, POR FAVOR, CONTACTA CON SYSADMIN", "warning");
            },
            "dataSrc": function (json) {
                console.log(json);
                json.dataTable = [];
                json.draw = 1;
                json.recordsTotal = 0;
                json.recordsFiltered = 0;
                
                if (json.code == 1) {
                    json.draw = json.data.draw;
                    json.recordsTotal = json.data.recordsTotal;
                    json.recordsFiltered = json.data.recordsFiltered;
                    json.dataTable = json.datosDatatable;
                    console.log(json.dataTable);
                    return json.dataTable;
                }else{
                    mostrarModal("Error", "Error loading data please contact your Administrator ", "warning");
                }

                
              }
        },
        "columns": [
            {
                "data": "contractorName"
            },
            {
                "data": "projectName"
            },
            {
                "data": "date"
            },
            {
                "data": "startTime"
            },
            {
                "data": "endTime"
            }
        ]
    });

}
