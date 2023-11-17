
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
    if (nombreEmpresa.length < 1 ) {
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
    web = document.getElementById("web").value;
    if (web.length < 1) {
        
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
        
    }
    
    document.getElementById("editContractor").submit();
}

function editarContractorON(){

    nombreEmpresa = document.getElementById("nombreEmpresa");
    nombreEmpresa.disabled = false;
    rfc = document.getElementById("rfc");
    rfc.disabled = false;
    idProyecto = document.getElementById("idProyecto");
    idProyecto.disabled = false;
    email = document.getElementById("email");
    email.disabled = false;
    telefono = document.getElementById("telefono");
    telefono.disabled = false;
    web = document.getElementById("web");
    web.disabled = false;
    actividad = document.getElementById("actividad");
    actividad.disabled = false;
    domicilio = document.getElementById("domicilio");
    domicilio.disabled = false;
    cp = document.getElementById("cp");
    cp.disabled = false;
    estado = document.getElementById("estado");
    estado.disabled = false;
    location = document.getElementById("location");
    location.disabled = false;
    folderName = document.getElementById("folderName");
    folderName.disabled = false;
    flImage = document.getElementById("flImage");
    flImage.disabled = false;
    
    guardar =document.getElementById("guardar-btn");
    guardar.style.display = 'block';
    on =document.getElementById("on-btn");
    on.style.display = 'none';
    off =document.getElementById("off-btn");
    off.style.display = 'block';
}

function editarContractorOFF(){
    nombreEmpresa = document.getElementById("nombreEmpresa");
    nombreEmpresa.disabled = true;
    rfc = document.getElementById("rfc");
    rfc.disabled = true;
    idProyecto = document.getElementById("idProyecto");
    idProyecto.disabled = true;
    email = document.getElementById("email");
    email.disabled = true;
    telefono = document.getElementById("telefono");
    telefono.disabled = true;
    web = document.getElementById("web");
    web.disabled = true;
    actividad = document.getElementById("actividad");
    actividad.disabled = true;
    domicilio = document.getElementById("domicilio");
    domicilio.disabled = true;
    cp = document.getElementById("cp");
    cp.disabled = true;
    estado = document.getElementById("estado");
    estado.disabled = true;
    location = document.getElementById("location");
    location.disabled = true;
    folderName = document.getElementById("folderName");
    folderName.disabled = true;
    flImage = document.getElementById("flImage");
    flImage.disabled = true;

    guardar =document.getElementById("guardar-btn");
    guardar.style.display = 'none';
    on =document.getElementById("on-btn");
    on.style.display = 'block';
    off =document.getElementById("off-btn");
    off.style.display = 'none';
}