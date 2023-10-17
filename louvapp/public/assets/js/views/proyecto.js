function agregarProyecto(){    
    nombre =document.getElementById("nombre").value;
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("El nombre del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    telefono =document.getElementById("telefono").value;
    if (telefono.length < 1 || telefono.length <= 3) {
        mostrarModal("El teléfono no puede estar vacio");        
        return;
    }
    descripcion =document.getElementById("descripcion").value;
    if (descripcion.length < 1 || descripcion.length <= 3) {
        mostrarModal("La descripción del proyecto no puede estar vacio y debe tener más de 10 caracteres");        
        return;
    }
    desarrollador =document.getElementById("desarrollador").value;
    if (desarrollador == 0) {
        mostrarModal("Debes elegir 1 desarrollador para el proyecto");        
        return;
    }
    responsableObra =document.getElementById("responsableObra").value;
    if (responsableObra == 0) {
        mostrarModal("Debes elegir 1 responsable de obra para el proyecto");        
        return;
    }

    fechaInicio =document.getElementById("fechaInicio").value;
    if (fechaInicio.length < 1 || fechaInicio.length <= 3) {
        mostrarModal("El proyecto debe tener una fecha de inicio");        
        return;
    }
    
    flImage =document.getElementById("flImage").value;
    if (flImage.length < 1 || flImage.length <= 3) {
        mostrarModal("Debes elegir una imágen del proyecto");        
        return;
    }
    
    tipoProyecto =document.getElementById("tipoProyecto").value;
    if (tipoProyecto.length < 1 || tipoProyecto.length <= 3) {
        mostrarModal("El tipo del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
  
    sistemaConstruccion =document.getElementById("sistemaConstruccion").value;
    if (sistemaConstruccion.length < 1 || sistemaConstruccion.length <= 3) {
        mostrarModal("El proyecto debe tener 1 sistema de construcción");        
        return;
    }
    totalCosto =document.getElementById("totalCosto").value;
    if (totalCosto.length < 1 || totalCosto.length <= 3) {
        mostrarModal("El costo total  del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    direccion =document.getElementById("direccion").value;
    if (direccion.length < 1 || direccion.length <= 3) {
        mostrarModal("Escribe la direccción del proyecto");        
        return;
    }

    estado =document.getElementById("estado").value;
    if (nombre.length == 0 ) {
        mostrarModal("Elige un estado donde se esta desarrollando el proyecto");        
        return;
    }
    document.getElementById("projectForm").submit();
}

function editarProyecto(){
    nombre =document.getElementById("nombre").value;
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("El nombre del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    telefono =document.getElementById("telefono").value;
    if (telefono.length < 1 || telefono.length <= 3) {
        mostrarModal("El teléfono no puede estar vacio");        
        return;
    }
    descripcion =document.getElementById("descripcion").value;
    if (descripcion.length < 1 || descripcion.length <= 3) {
        mostrarModal("La descripción del proyecto no puede estar vacio y debe tener más de 10 caracteres");        
        return;
    }
    desarrollador =document.getElementById("desarrollador").value;
    if (desarrollador == 0) {
        mostrarModal("Debes elegir 1 desarrollador para el proyecto");        
        return;
    }
    responsableObra =document.getElementById("responsableObra").value;
    if (responsableObra == 0) {
        mostrarModal("Debes elegir 1 responsable de obra para el proyecto");        
        return;
    }

    fechaInicio =document.getElementById("fechaInicio").value;
    if (fechaInicio.length < 1 || fechaInicio.length <= 3) {
        mostrarModal("El proyecto debe tener una fecha de inicio");        
        return;
    }
    
    flImage =document.getElementById("flImage").value;
    if (flImage.length < 1 || flImage.length <= 3) {
        mostrarModal("Debes elegir una imágen del proyecto");        
        return;
    }
    
    tipoProyecto =document.getElementById("tipoProyecto").value;
    if (tipoProyecto.length < 1 || tipoProyecto.length <= 3) {
        mostrarModal("El tipo del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
  
    sistemaConstruccion =document.getElementById("sistemaConstruccion").value;
    if (sistemaConstruccion.length < 1 || sistemaConstruccion.length <= 3) {
        mostrarModal("El proyecto debe tener 1 sistema de construcción");        
        return;
    }
    totalCosto =document.getElementById("totalCosto").value;
    if (totalCosto.length < 1 || totalCosto.length <= 3) {
        mostrarModal("El costo total  del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    direccion =document.getElementById("direccion").value;
    if (direccion.length < 1 || direccion.length <= 3) {
        mostrarModal("Escribe la direccción del proyecto");        
        return;
    }
    
    estado =document.getElementById("estado").value;
    if (nombre.length == 0 ) {
        mostrarModal("Elige un estado donde se esta desarrollando el proyecto");        
        return;
    }
    document.getElementById("editingProject").submit();
}