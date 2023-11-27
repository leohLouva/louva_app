function registroDeTrabajador(param){
    if(param == 'in'){
        document.getElementById("horaEntrada").submit();
    }else{
        document.getElementById("horaSalida").submit();
    }
}

function updateClock() {
    const clockElement = document.getElementById('clock');
    const now = new Date();
    now.setHours(now.getHours()); // Resta 1 hora a la hora actual
    const hours = now.getHours().toString().padStart(2, '0');

    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    
    const currentTime = `${hours}:${minutes}:${seconds}`;
    clockElement.textContent = currentTime;
}

function formatearFecha(fecha) {
    var partes = fecha.split('-');
    if (partes.length === 3) {
        var nuevaFecha = partes[2] + '-' + partes[1] + '-' + partes[0];
        return nuevaFecha;
    } else {
        return fecha;
    }
}

function checarEntrada(){
    
    idWorker = document.getElementById('idWorker').value;
    idProject_project = document.getElementById('idProject_project').value;
    idContractor_contractors = document.getElementById('idContractor_contractors').value;
    fechaDeCheck = document.getElementById('fechaDeCheck').textContent;
    clock = document.getElementById('clock').textContent;

    var fechaFormateada = formatearFecha(fechaDeCheck);
    var formData = {
        idWorker,
        idProject_project,
        idContractor_contractors,
        fechaFormateada,
        clock
    };
    console.log(formData);

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type: 'POST',
        url: checarEntradaRoute,
        data: {
            data: formData,
            _token: csrfToken
        },
        dataType: 'json',
        success: function (data) {
            if (data.status == 0) {
                mostrarModal(data.message);
            } else {
                mostrarModal(data.message);
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            // Manejo de errores si es necesario
        }
    });

}

function checarSalida(){
    
    idWorker = document.getElementById('idWorker').value;
    idProject_project = document.getElementById('idProject_project').value;
    idContractor_contractors = document.getElementById('idContractor_contractors').value;
    fechaDeCheck = document.getElementById('fechaDeCheck').textContent;
    clock = document.getElementById('clock').textContent;

    var fechaFormateada = formatearFecha(fechaDeCheck);
    var formData = {
        idWorker,
        idProject_project,
        idContractor_contractors,
        fechaFormateada,
        clock
    };
    console.log(formData);
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type: 'POST',
        url: checarSalidaRoute,
        data: {
            data: formData,
            _token: csrfToken
        },
        dataType: 'json',
        success: function (data) {
            if (data.status == 0) {
                mostrarModal(data.message);
            } else {
                mostrarModal(data.message);
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            // Manejo de errores si es necesario
        }
    });

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