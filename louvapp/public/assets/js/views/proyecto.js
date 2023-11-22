var charts = {};
var chart; // Declara la variable en un ámbito más amplio

function convertirAMayusculas(input) {
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

function agregarProyecto(){    
    console.log("ya modifique aqiu");
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    nombre = document.getElementById("nombre").value;
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("EL NOMBRE DEL PROYECTO NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }
   
    descripcion = document.getElementById("descripcion").value;
    if (descripcion.length < 1 || descripcion.length <= 3) {
        mostrarModal("LA DESCRIPCIÓN DEL PROYECTO NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 10 CARACTERES");        
        return;
    }
    desarrollador = document.getElementById("desarrollador").value;
    if (desarrollador == 0) {
        mostrarModal("DEBES ELEGIR 1 DESARROLLADOR PARA EL PROYECTO");        
        return;
    }
    responsableObra = document.getElementById("responsableObra").value;
    if (responsableObra == 0) {
        mostrarModal("DEBES ELEGIR 1 RESPONSABLE DE OBRA PARA EL PROYECTO");        
        return;
    }

    fechaInicio = document.getElementById("fechaInicio").value;
    if (fechaInicio.length < 1 || fechaInicio.length <= 3) {
        mostrarModal("EL PROYECTO DEBE TENER UNA FECHA DE INICIO");        
        return;
    }
    
    flImage = null; //document.getElementById("flImage").value;
    
    tipoProyecto = document.getElementById("tipoProyecto").value;
    if (tipoProyecto == 0) {
        mostrarModal("DEBES ELEGIR UN TIPO DE PROYECTO");        
        return;
    }
    mtsSuperficiales = document.getElementById("mtsSuperficiales").value;
    if (mtsSuperficiales.length < 1) {
        mostrarModal("AGREGA METROS CUADRADOS SUPERFICIALES PARA EL PROYECTO");        
        return;
    }
    mtsSotano = document.getElementById("mtsSotano").value;
    if (mtsSotano.length < 1 ) {
        mostrarModal("AGREGA METROS CUADRADOS DE SÓTANO PARA EL PROYECTO");        
        return;
    }
    sistemaConstruccion = document.getElementById("sistemaConstruccion").value;
    if (sistemaConstruccion == 0) {
        mostrarModal("ELIGE UN SISTEMA DE CONSTRUCCIÓN");        
        return;
    }
    totalCosto = document.getElementById("totalCosto").value;
    if (totalCosto.length < 1 || totalCosto.length <= 3) {
        mostrarModal("EL COSTO TOTAL  DEL PROYECTO NO PUEDE ESTAR VACIO Y DEBE TENER MÁS DE 3 CARACTERES");        
        return;
    }
    
    direccion = document.getElementById("direccion").value;
    if (direccion.length < 1 || direccion.length <= 3) {
        mostrarModal("ESCRIBE LA DIRECCCIÓN DEL PROYECTO");        
        return;
    }

    estado = document.getElementById("estado").value;
    if (nombre.length == 0 ) {
        mostrarModal("ELIGE UN ESTADO DONDE SE ESTA DESARROLLANDO EL PROYECTO");        
        return;
    }
    
    location = document.getElementById("location").value;
    if (nombre.length == 0 ) {
        mostrarModal("ELIGE UN MUNICIPIO DONDE SE ESTA DESARROLLANDO EL PROYECTO");        
        return;
    }

    var formData = {
        nombre:nombre,
        descripcion:descripcion,
        desarrollador:desarrollador,
        responsableObra:responsableObra,
        fechaInicio:fechaInicio,
        flImage:flImage,
        tipoProyecto:tipoProyecto,
        mtsSuperficiales:mtsSuperficiales,
        mtsSotano:mtsSotano,
        sistemaConstruccion:sistemaConstruccion,
        totalCosto:totalCosto,
        direccion:direccion,
        estado:estado,
        location:location
    };

        
        document.getElementById("addingProyecto").submit();
        /*fetch('addingProject', {
            method: 'POST', // O el método HTTP que estás utilizando
            body: new FormData(this), // Esto envía los datos del formulario
        })
        .then(response => response.json()) // Parsea la respuesta JSON
        .then(data => {
            console.log(data);
            // Maneja la respuesta JSON
            if (data.status === '0') {
                alert(data.message); // Muestra un mensaje de éxito
                // Aquí puedes redirigir a otra página si es necesario
            } else {
                alert('Hubo un problema al agregar el proyecto.');
            }
        })
        .catch(error => {
            console.error('Error al enviar el formulario:', error);
        });*/


        //return;
        /*$.ajax({
            type: 'POST',
            url: addingProject,
            data: {
                data: formData,
                _token: csrfToken
            },
            success: function (data) {
                console.log(data.status);

                /*if (data.status == 0) {
                    mostrarModal("TODO SE AGREGÓ SUPER BIEN")
                    //window.location.href = data.redirect;
                } else {
                    mostrarModal("ERROR EN LA SOLICITUD AL AGREGAR PROYECTO NUEVO: " + data.message);
                }
            },
            error: function (xhr, status, error) {
                // Aquí puedes manejar el error, por ejemplo, mostrar un mensaje de error al usuario
                mostrarModal("Error en la solicitud AJAX: " + error);
            }
        });*/
}

function editarProyectoON(){
    nombre =document.getElementById("nombre");
    nombre.disabled = false;
    descripcion =document.getElementById("descripcion");
    descripcion.disabled = false;
    desarrollador =document.getElementById("desarrollador");
    desarrollador.disabled = false;
    responsableObra =document.getElementById("responsableObra");
    responsableObra.disabled = false;
    fechaInicio =document.getElementById("fechaInicio");
    fechaInicio.disabled = false;
    flImage =document.getElementById("flImage");
    flImage.disabled = false;
    tipoProyecto =document.getElementById("tipoProyecto");
    tipoProyecto.disabled = false;
    mtsSuperficiales =document.getElementById("mtsSuperficiales");
    mtsSuperficiales.disabled = false;    
    mtsSotano =document.getElementById("mtsSotano");
    mtsSotano.disabled = false;
    sistemaConstruccion =document.getElementById("sistemaConstruccion");
    sistemaConstruccion.disabled = false;
    totalCosto =document.getElementById("totalCosto");
    totalCosto.disabled = false;
    direccion =document.getElementById("direccion");
    direccion.disabled = false;
    estado =document.getElementById("estado");
    estado.disabled = false;
    municipio =document.getElementById("location");
    municipio.disabled = false;
    
    guardar =document.getElementById("guardar-btn");
    guardar.style.display = 'block';
    on =document.getElementById("on-btn");
    on.style.display = 'none';
    off =document.getElementById("off-btn");
    off.style.display = 'block';
    

}
function editarProyectoOFF(){
    nombre =document.getElementById("nombre");
    nombre.disabled = true;
    descripcion =document.getElementById("descripcion");
    descripcion.disabled = true;
    desarrollador =document.getElementById("desarrollador");
    desarrollador.disabled = true;
    responsableObra =document.getElementById("responsableObra");
    responsableObra.disabled = true;
    
    fechaInicio =document.getElementById("fechaInicio");
    fechaInicio.disabled = true;
    flImage =document.getElementById("flImage");
    flImage.disabled = true;
    tipoProyecto =document.getElementById("tipoProyecto");
    tipoProyecto.disabled = true;
    mtsSuperficiales =document.getElementById("mtsSuperficiales");
    mtsSuperficiales.disabled = true;    
    mtsSotano =document.getElementById("mtsSotano");
    mtsSotano.disabled = true;
    sistemaConstruccion =document.getElementById("sistemaConstruccion");
    sistemaConstruccion.disabled = true;
    totalCosto =document.getElementById("totalCosto");
    totalCosto.disabled = true;
    direccion =document.getElementById("direccion");
    direccion.disabled = true;
    estado =document.getElementById("estado");
    estado.disabled = true;
    municipio =document.getElementById("location");
    municipio.disabled = true;
    
    guardar =document.getElementById("guardar-btn");
    guardar.style.display = 'none';
    on =document.getElementById("on-btn");
    on.style.display = 'block';
    off =document.getElementById("off-btn");
    off.style.display = 'none';

}
function actualizarProyecto(){
    nombre =document.getElementById("nombre");
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("El nombre del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    descripcion =document.getElementById("descripcion");
    if (descripcion.length < 1 || descripcion.length <= 3) {
        mostrarModal("La descripción del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
        return;
    }
    desarrollador =document.getElementById("desarrollador");
    if (desarrollador == 0) {
        mostrarModal("Debes elegir 1 desarrollador");        
        return;
    }
    responsableObra =document.getElementById("responsableObra");
    if (responsableObra == 0) {
        mostrarModal("Elige 1 responsable de obra");        
        return;
    }
    fechaInicio =document.getElementById("fechaInicio");
    if (fechaInicio.length < 1 || fechaInicio.length <= 3) {
        mostrarModal("No puedes dejar la fecha de incio del proyecto en blanco");        
        return;
    }
    flImage = null; //document.getElementById("flImage");
    tipoProyecto =document.getElementById("tipoProyecto");
    if (tipoProyecto.length < 1 || tipoProyecto.length <= 3) {
        mostrarModal("Escribe que tipo de proyecto es");        
        return;
    }
    mtsSuperficiales =document.getElementById("mtsSuperficiales");
    if (mtsSuperficiales.length < 1 ) {
        mostrarModal("Agrega los metros superficiales que estan considerados en el proyecto");        
        return;
    }
    mtsSotano =document.getElementById("mtsSotano");
    if (mtsSotano.length < 1 ) {
        mostrarModal("Agrega los metros de sótano que estan considerados en el proyecto");        
        return;
    }
    sistemaConstruccion =document.getElementById("sistemaConstruccion");
    if (sistemaConstruccion.length < 1 || nombre.length <= 3) {
        mostrarModal("Escribe el sistema de construcción con el se va a trabajar en el proyecto");        
        return;
    }
    totalCosto =document.getElementById("totalCosto");
    if (totalCosto.length < 1 || totalCosto.length <= 3) {
        mostrarModal("Agrega el costo del proyecto");        
        return;
    }
    direccion =document.getElementById("direccion");
    if (nombre.length < 1 || nombre.length <= 3) {
        mostrarModal("Escribe la dirección de donde se ubica el proyecto");        
        return;
    }
    estado =document.getElementById("estado");
    if (estado.length == 0) {
        mostrarModal("Elige en que estado de la república esta se desarrolla el proyectos");        
        return;
    }
    municipio =document.getElementById("location");
    if (municipio.length == 0) {
        mostrarModal("Elige el municipio donde se desarrolla el proyecto");        
        return;
    }
    
    document.getElementById("editingProject").submit();
}
function formatearFecha(fecha) {
    console.log(fecha);
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var anio = fecha.getFullYear();

    fechaF = dia + "-" + mes + "-" + anio;
    return fechaF;
}
function getGraphic(){

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var idProyecto = $('#idProyecto').val();
    var fechaRegistro = $('#fechaInicioScript').val();
    
    if (idProyecto == 0) {
        mostrarModal("DEBES ELEGIR UN PROYECTO PARA MOSTRAR LAS GRÁFICAS CORRESPONDIENTES");
        return;
    }else{
        
    }

        $.ajax({
            type: 'POST',
            url: proyectoEmpresasRoute,
            data: {
                idProyecto: idProyecto,
                fechaRegistro:fechaRegistro,
                _token: csrfToken
            },
            success: function (data) {
                console.log(data);
                var container = $('#contractorsContainer');
                container.empty();
                var row = $('<div class="row"></div> '); 
                var titleRow = $('<div class="row"></div>');
                
                if (data.cuenta == 0) {
                   
                    mostrarModal("NO HAY ACCESOS ESTE DÍA");

                    var title = $('<div class="col-12"><h3><span class="badge badge-outline-warning">NO HAY ACCESOS ESTE DÍA</span></h3></div>');
                    titleRow.append(title);
                    container.append(titleRow);

                }else{
                   
                    data.registro.forEach(function (registro, index) {
                        container.append(row);
                        var chartId = "semi-workers-" + index;
                        var card = $(
                            '<div class="col-4">' +
                                
                                '<div class="card">' +
                                '<div class="card-header">'+
                                    '<div class="row"><div class="col-12">'+
                                    '<input type="text" id="valorProgramado'+chartId+'" placeholder="" class="form-control"><br>'+
                                    '<button id="agregarDato" onclick="agregarDato('+index+','+registro.cuenta_checkin+')" class="btn btn-outline-primary">CAMBIAR FT PROGRAMADO</button>'+
                                    '</div></div>'+
                                '</div>'+
                                    '<div class="card-body">' +
                                    '<div dir="ltr">' +
                                        '<div id="' + chartId + '" class="apex-charts" data-colors="#727cf5"></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="d-flex justify-content-between align-items-center card-body py-2 border-top border-light">' +
                                        '<span class="badge badge-lg bg-light text-secondary rounded-pill me-1">' + registro.empresa + '</span>' +
                                    '</div>' +
                                '</div>' +
                            '</div>');
    
                        row.append(card);
                        if (registro.ft_programado == null) {
                            var ft_programado = 10;
                        }else{
                            var ft_programado = registro.ft_programado;   
                        }
                        var options = {
                            series: [registro.cuenta_checkin,ft_programado],
                            chart: {
                                type: "radialBar",
                                offsetY: -20,
                                sparkline: {
                                    enabled: true,
                                }
                            },
                            plotOptions: {
                                radialBar: {
                                    startAngle: -90,
                                    endAngle: 90,
                                    track: {
                                        background: "rgba(255, 255, 255, 0.5)",
                                        strokeWidth: "90%",
                                        margin: 5,
                                        dropShadow: {
                                            top: 2,
                                            left: 0,
                                            color: "#eef2f7",
                                            opacity: 1,
                                            blur: 2
                                        }
                                    },
                                    dataLabels: {
                                        name: {
                                            show: false
                                        },
                                        value: {
                                            show: true,
                                            offsetY: -2,
                                            fontSize: "30px",
                                            formatter: function (val) {

                                                return val;
                                            }
                                        }
                                    },
                                }
                            },
                            grid: {
                                padding: {
                                    top: -0
                                }
                            },
                            legend: {
                                show: true,
                                showForSingleSeries: true,
                                showForNullSeries: true,
                                showForZeroSeries: true,
                                position: 'bottom',
                                horizontalAlign: 'center', 
                                floating: false,
                                fontSize: '14px',
                                fontFamily: 'Helvetica, Arial',
                                fontWeight: 400,
                                formatter: undefined,
                                inverseOrder: false,
                                width: undefined,
                                height: undefined,
                                tooltipHoverFormatter: undefined,
                                customLegendItems: [],
                                offsetX: 0,
                                offsetY: 0,
                                labels: {
                                    colors: undefined,
                                    useSeriesColors: false
                                },
                                markers: {
                                    width: 12,
                                    height: 12,
                                    strokeWidth: 0,
                                    strokeColor: '#fff',
                                    fillColors: undefined,
                                    radius: 12,
                                    customHTML: undefined,
                                    onClick: undefined,
                                    offsetX: 0,
                                    offsetY: 0
                                },
                                itemMargin: {
                                    horizontal: 5,
                                    vertical: 0
                                },
                                onItemClick: {
                                    toggleDataSeries: true
                                },
                                onItemHover: {
                                    highlightDataSeries: true
                                },
                            },
                            colors: ["#727cf5", "#ffffff"], //#
                            labels: ['FT REAL: '+registro.cuenta_checkin,'FT PROGRAMADA: '+registro.ft_programado],
                            yaxis: {
                                min: 0,
                                max: 50,  // Establece el límite máximo en 50
                            },
                        };
                        
                        //(chart = new ApexCharts(document.querySelector("#" + chartId), options)).render();
                        charts[chartId] = new ApexCharts(document.querySelector("#" + chartId), options);
                        charts[chartId].render();
                        //$(".apexcharts-legend").text('FUERZA DE TRABAJO');
                        
                    });
                    
                    var title = $('<div class="col-12"><h2>TOTAL DE ACCESOS: '+data.cuenta+'</h2></div>');
                    
                    titleRow.append(title);
                    container.append(titleRow);
                }
            }
        });

}

function agregarDato(param,ftReal) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var chartId = "semi-workers-" + param;
    programado = document.getElementById("valorProgramado"+chartId).value;

    
    /*$.ajax({
        type: 'POST',
        url: guardarFTProgramado,
        data: {
            idProyecto: idProyecto,
            ft_programado:programado,
            _token: csrfToken
        },
        success: function (data) {
            console.log("se agregó el dato");
            
        }
    });*/
    
    if (charts[chartId]) {
        charts[chartId].updateOptions({
          series: [ftReal, programado],                           
          labels: ['FT REAL: '+ftReal,'FT PROGRAMADA: '+programado]

        });
        //$(".apexcharts-legend").text('FUERZA DE TRABAJO '+programado);

    }else{
        console.error("hubo un error checale antes de continuar");
    }


  }
  


function graficaPorPuestoEnProyecto(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var idProyecto = $('#idProyecto').val();
    var fechaRegistro = $('#fechaInicioScript').val();
    var partesFecha = fechaRegistro.split("-");
    var dia = partesFecha[0];
    var mes = partesFecha[1];
    var anio = partesFecha[2];
    var fechaFormateada = anio + "-" + mes + "-" + dia;
    if (idProyecto == 0) {
        mostrarModal("DEBES ELEGIR UN PROYECTO PARA MOSTRAR LAS GRÁFICAS CORRESPONDIENTES");
        return;
    }
    $.ajax({
        type: 'POST',
        url: proyectoEmpresasRoutePuestos,
        data: {
            idProyecto: idProyecto,
            fechaRegistro:fechaFormateada,
            _token: csrfToken
        },
        success: function (data) {
            var container = $('#contractorsContainer');
            container.empty();
            var row = $('<div class="row"></div> '); 
            var titleRow = $('<div class="row"></div>');
            
            if (data.cuenta == 0) {
                mostrarModal("NO HAY ACCESOS ESTE DÍA");
                    
                var title = $('<div class="col-12"><h2>NO HAY ACCESOS ESTE DÍA</h2></div>');
                titleRow.append(title);
                container.append(titleRow);

            }else{
                console.log("entre a hacer la grafica");
                data.registro.forEach(function (registro, index) {
                    container.append(row);
                    var chartId = "semi-workers-" + index;
                    var card = $(
                        '<div class="col-4">' +
                            
                            '<div class="card">' +
                            '<div class="card-header">'+
                                '<div class="row"><div class="col-12">'+
                                '<input type="text" id="valorProgramado'+chartId+'" placeholder="" class="form-control"><br>'+
                                '<button id="agregarDato" onclick="agregarDato('+index+','+registro.cuenta_checkin+')" class="btn btn-outline-primary">CAMBIAR FT PROGRAMADO</button>'+
                                '</div></div>'+
                            '</div>'+
                                '<div class="card-body">' +
                                '<div dir="ltr">' +
                                    '<div id="' + chartId + '" class="apex-charts" data-colors="#727cf5"></div>' +
                                '</div>' +
                                '</div>' +
                                '<div class="d-flex justify-content-between align-items-center card-body py-2 border-top border-light">' +
                                '<span class="badge badge-lg bg-light text-secondary rounded-pill me-1">' + registro.empresa + '</span>' +
                                '<span class="badge badge-lg bg-light text-secondary rounded-pill me-1">' + registro.puesto + '</span>' +
                                '</div>' +
                            '</div>' +
                        '</div>');

                    row.append(card);
                    if (registro.ft_programado == null) {
                        var ft_programado = 10;
                    }else{
                        var ft_programado = registro.ft_programado;   
                    }
                    var options = {
                        series: [registro.cuenta_checkin,ft_programado],
                        chart: {
                            type: "radialBar",
                            offsetY: -20,
                            sparkline: {
                                enabled: true,
                            }
                        },
                        plotOptions: {
                            radialBar: {
                                startAngle: -90,
                                endAngle: 90,
                                track: {
                                    background: "rgba(255, 255, 255, 0.5)",
                                    strokeWidth: "95%",
                                    margin: 5,
                                    dropShadow: {
                                        top: 2,
                                        left: 0,
                                        color: "#eef2f7",
                                        opacity: 1,
                                        blur: 2
                                    }
                                },
                                dataLabels: {
                                    name: {
                                        show: false
                                    },
                                    value: {
                                        show: true,
                                        offsetY: -2,
                                        fontSize: "20px",
                                        formatter: function (val) {

                                            return val;
                                        }
                                    }
                                },
                            }
                        },
                        grid: {
                            padding: {
                                top: -0
                            }
                        },
                        legend: {
                            show: true,
                            showForSingleSeries: true,
                            showForNullSeries: true,
                            showForZeroSeries: true,
                            position: 'bottom',
                            horizontalAlign: 'center', 
                            floating: false,
                            fontSize: '11px',
                            fontFamily: 'Helvetica, Arial',
                            fontWeight: 400,
                            formatter: undefined,
                            inverseOrder: false,
                            width: undefined,
                            height: undefined,
                            tooltipHoverFormatter: undefined,
                            customLegendItems: [],
                            offsetX: 0,
                            offsetY: 0,
                            labels: {
                                colors: undefined,
                                useSeriesColors: false
                            },
                            markers: {
                                width: 20,
                                height: 20,
                                strokeWidth: 0,
                                strokeColor: '#fff',
                                fillColors: undefined,
                                radius: 12,
                                customHTML: undefined,
                                onClick: undefined,
                                offsetX: 0,
                                offsetY: 0
                            },
                            itemMargin: {
                                horizontal: 5,
                                vertical: 0
                            },
                            onItemClick: {
                                toggleDataSeries: true
                            },
                            onItemHover: {
                                highlightDataSeries: true
                            },
                        },
                        colors: ["#727cf5", "#ffffff"], //#
                        labels: ['FT REAL: '+registro.cuenta_checkin,'FT PROGRAMADA: '+registro.ft_programado],
                        yaxis: {
                            min: 0,
                            max: 50,  // Establece el límite máximo en 50
                        },
                    };
                    
                    //(chart = new ApexCharts(document.querySelector("#" + chartId), options)).render();
                    charts[chartId] = new ApexCharts(document.querySelector("#" + chartId), options);
                    charts[chartId].render();
                    //$(".apexcharts-legend").text('FUERZA DE TRABAJO');
                    
                });
                var title = $('<div class="col-12"><h2>TOTAL DE ACCESOS: '+data.cuenta+'</h2></div>');


                titleRow.append(title);
                container.append(titleRow);
            }
            
            
        }
    });
}

function buscarObras() {
    // Manejar el evento de envío del formulario
    buscarO = document.getElementById("buscarO").value;
    if (buscarO == '') {
        mostrarModal("Error","NO PUEDES BUSCAR CON CARACTERES VACIOS","2");
        return;
    }
    
        // Serializar el formulario correctamente
        var formData = buscarO;
        console.log(formData);
        var baseRoute = document.getElementById("listadoObras").getAttribute("data-route");
        // Realizar la solicitud AJAX
        $.ajax({
            url: baseRoute,
            type: "GET",
            data: formData,
            success: function(response) {
                window.location.href = response;

            },
            error: function(error) {
                console.error('Error en la búsqueda:', error);
            }
        });

}

function getListaObras(){

}


