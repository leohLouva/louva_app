
function agregarEmpresa(){
    document.getElementById("addContractor").submit();
}

function convertirAMayusculas(input) {
    console.log(input);
    input.value = input.value.toUpperCase();
}

function getLocation(){
    var estadoId = document.getElementById("estado").value;
            if (estadoId > 0) {
                $.ajax({
                    url: '/municipios/' + estadoId,
                    type: 'GET',
                    success: function(data) {
                        var locacionSelect = $('#location');
                        locacionSelect.empty(); 
                        $.each(data, function(key, value) {
                            locacionSelect.append('<option value="' + value.idMunicipio + '">' + value.municipio.toUpperCase()  + '</option>');
                        });
                    }
                });
            }
}

function actualizarContractor(){
    nombreEmpresa = document.getElementById("nombreEmpresa").value;
    /*if (nombreEmpresa.length < 1 ) {
        mostrarModal("El nombre de la empresa no puede estar vacio ");        
        return;
    }
    rfc = document.getElementById("rfc").value;
    if (rfc.length < 1) {
        mostrarModal("El RFC no puede estar vacio");        
        return;
    }
    idProyecto = document.getElementById("idProyecto").value;
    if (idProyecto == 0) {
        mostrarModal("Debes elegir un proyecto para la empresa");        
        return;
    }
    email = document.getElementById("email").value;
    if (email.length < 1) {
        
    }
    telefono = document.getElementById("telefono").value;
    if (telefono.length < 1) {
        
    }
   
    actividad = document.getElementById("actividad").value;
    if (actividad.length < 1) {
        
    }
    domicilio = document.getElementById("domicilio").value;
    if (domicilio.length < 1) {
        
    }
    cp = document.getElementById("cp").value;
    if (cp.length < 1) {
        
    }
    estado = document.getElementById("estado").value;
    if (estado.length < 1) {
        
    }
    location = document.getElementById("location").value;
    if (location.length < 1) {
        
    }*/
    
    document.getElementById("editContractor").submit();
}

function editarContractorON(){

    var elementos = ["nombreEmpresa", "rfc", "idProyecto", "email", "telefono", "web", "actividad", "domicilio", "cp", "estado", "location", "folderName", "flImage"];

    elementos.forEach(function(id) {
        var elemento = document.getElementById(id);
        if (elemento) {
            elemento.disabled = false;
        }
    });
    var guardar = document.getElementById("guardar-btn");
    if (guardar) {
        guardar.style.display = 'block';
    }

    var on = document.getElementById("on-btn");
    if (on) {
        on.style.display = 'none';
    }

    var off = document.getElementById("off-btn");
    if (off) {
        off.style.display = 'block';
    }


}

function editarContractorOFF(){
    var elementos = ["nombreEmpresa", "rfc", "idProyecto", "email", "telefono", "web", "actividad", "domicilio", "cp", "estado", "location", "folderName", "flImage"];

    elementos.forEach(function(id) {
        var elemento = document.getElementById(id);
        if (elemento) {
            elemento.disabled = true;
        }
    });
    var guardar = document.getElementById("guardar-btn");
    if (guardar) {
        guardar.style.display = 'none';
    }

    var on = document.getElementById("on-btn");
    if (on) {
        on.style.display = 'block';
    }

    var off = document.getElementById("off-btn");
    if (off) {
        off.style.display = 'none';
    }
}