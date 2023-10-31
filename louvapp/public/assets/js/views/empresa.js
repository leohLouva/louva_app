
function agregarEmpresa(){
    document.getElementById("addContractor").submit();
}

function editarEmpresa(){
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
    municipio = document.getElementById("municipio").value;
    if (municipio.length < 1) {
        
    }
    
    document.getElementById("editContractor").submit();
}