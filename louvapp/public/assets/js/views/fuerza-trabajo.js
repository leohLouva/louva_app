document.addEventListener("DOMContentLoaded", function() {
    var contratista = document.getElementById("contratista");
    var nombreInput = document.getElementById("idContractor");
  
    contratista.addEventListener("change", function() {
        var selectedOption = contratista.options[contratista.selectedIndex].value;
        nombreInput.value = selectedOption;
        var elemento = document.getElementById("imgProfileTrabajador");
        if (nombreInput.value == 0) {
            elemento.style.display = "none";    
        }else{
            elemento.style.display = "block";
        }
        
    });
});

function agregarTrabajador(){
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    contratista = document.getElementById("contratista").value;
    puesto = document.getElementById("puesto").value;
    nss = document.getElementById("nss").value;
    nrp = document.getElementById("nrp").value;
    telefonoPersonal = document.getElementById("telefonoPersonal").value;
    telefonoEmergencia = document.getElementById("telefonoEmergencia").value;
    tipoSangre = document.getElementById("tipoSangre").value;
    enfermedades = document.getElementById("enfermedades").value;
    alergias = document.getElementById("alergias").value;
    flImage = document.getElementById("flImage").value;

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
    if (nrp.length < 1 || nombre.length <= 3) {
        mostrarModal("El número de registro patronal no puede estar vacio y debe tener más de 3 caracteres");        
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
    if (flImage.length < 1 || flImage.length <= 3) {
        mostrarModal("Hubo un problema con la imagen...");        
        return;
    }

    document.getElementById("formTrabajador").submit();

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