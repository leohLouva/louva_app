$(document).ready(function() {
    $('#estado').on('change', function() {
        var estadoId = $(this).val();
        if (estadoId > 0) {
            $.ajax({
                url: '/municipios/' + estadoId,
                type: 'GET',
                success: function(data) {
                    var locacionSelect = $('#municipio');
                    locacionSelect.empty(); 
                    $.each(data, function(key, value) {
                        locacionSelect.append('<option value="' + value.idMunicipio + '">' + value.municipio + '</option>');
                    });
                }
            });
        }
    });
});
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

function editarProyectoON(){
    nombre =document.getElementById("nombre");
    nombre.disabled = false;
    telefono =document.getElementById("telefono");
    telefono.disabled = false;
    descripcion =document.getElementById("descripcion");
    descripcion.disabled = false;
    desarrollador =document.getElementById("desarrollador");
    desarrollador.disabled = false;
    responsableObra =document.getElementById("responsableObra");
    responsableObra.disabled = false;
    porcentaje =document.getElementById("porcentaje");
    porcentaje.disabled = false;
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
    municipio =document.getElementById("municipio");
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
    nombre.disabled = false;
    telefono =document.getElementById("telefono");
    telefono.disabled = false;
    descripcion =document.getElementById("descripcion");
    descripcion.disabled = false;
    desarrollador =document.getElementById("desarrollador");
    desarrollador.disabled = false;
    responsableObra =document.getElementById("responsableObra");
    responsableObra.disabled = false;
    porcentaje =document.getElementById("porcentaje");
    porcentaje.disabled = false;
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
    municipio =document.getElementById("municipio");
    municipio.disabled = false;
    
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
    telefono =document.getElementById("telefono");
    if (telefono.length < 1 || telefono.length <= 3) {
        mostrarModal("El teléfono del proyecto no puede estar vacio y debe tener más de 3 caracteres");        
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
    porcentaje =document.getElementById("porcentaje");
    if (porcentaje.length < 1 ) {
        mostrarModal("Escribe el porcentaje de avance del proyecto");        
        return;
    }
    fechaInicio =document.getElementById("fechaInicio");
    if (fechaInicio.length < 1 || fechaInicio.length <= 3) {
        mostrarModal("No puedes dejar la fecha de incio del proyecto en blanco");        
        return;
    }
    flImage =document.getElementById("flImage");
    
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
    municipio =document.getElementById("municipio");
    if (municipio.length == 0) {
        mostrarModal("Elige el municipio donde se desarrolla el proyecto");        
        return;
    }
    
    document.getElementById("editingProject").submit();
}

function formatearFecha(fecha) {
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
        mostrarModal("Debes elegir un proyecto para mostrar las gráficas correspondientes");
        return;
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
                console.log(data)
                var container = $('#contractorsContainer');
                container.empty();
                var row = $('<div class="row"></div> '); 
                var titleRow = $('<div class="row"></div>');
                console.log(data);
                if (data.cuenta == 0) {
                    console.log("entre a no hay accesos")
                    mostrarModal("No hay accesos este día");
                     
                    var title = $('<div class="col-12"><h2>No hay accesos este día</h2></div>');
                    titleRow.append(title);
                    container.append(titleRow);

                }else{
                    console.log("entre a hacer la grafica");
                    data.registro.forEach(function (registro, index) {
                        container.append(row);
                        var chartId = "semi-workers-" + idProyecto + "-" + index;
                        var card = $(
                            '<div class="col-6">' +
                                '<div class="card">' +
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
                        
                        var options = {
                            series: [registro.cuenta_checkin],//],//[empresas.cuenta_checkin],
                            chart: {
                                type: "radialBar",
                                offsetY: -20,
                                sparkline: {
                                    enabled: false,
                                }
                            },
                            plotOptions: {
                                radialBar: {
                                    startAngle: -90,
                                    endAngle: 90,
                                    track: {
                                        background: "rgba(255, 255, 255, 0.5)",
                                        strokeWidth: "97%",
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
                                            fontSize: "22px",
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
                                showForSingleSeries: false,
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
                            colors: ["#727cf5"],
                            labels: [],
                            yaxis: {
                                min: 0,
                                max: 50,
                              },
                        };

                        (chart = new ApexCharts(document.querySelector("#" + chartId), options)).render();
                        $(".apexcharts-legend").text('');
                        
                    });
    
                    var title = $('<div class="col-12"><h2>Total de accesos '+data.cuenta+'</h2></div>');
                    titleRow.append(title);
                    container.append(titleRow);
                }
                
               
            }
        });

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
        mostrarModal("Debes elegir un proyecto para mostrar las gráficas correspondientes");
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
            console.log(data);
            if (data.cuenta == 0) {
                console.log("entre a no hay accesos")
                mostrarModal("No hay accesos este día");
                    
                var title = $('<div class="col-12"><h2>No hay accesos este día</h2></div>');
                titleRow.append(title);
                container.append(titleRow);

            }else{
                console.log("entre a hacer la grafica");
                data.registro.forEach(function (registro, index) {
                    container.append(row);
                    var chartId = "semi-workers-" + idProyecto + "-" + index;
                    var card = $(
                        '<div class="col-6">' +
                            '<div class="card">' +
                                '<div class="card-body">' +
                                    '<div dir="ltr">' +
                                        '<div id="' + chartId + '" class="apex-charts" data-colors="#727cf5"></div>' +
                                    '</div>' +
                                    '<div id="'+chartId+'text"></div>'+
                                '</div>' +
                                '<div class="d-flex justify-content-between align-items-center card-body py-2 border-top border-light">' +
                                    '<span class="badge badge-lg bg-light text-secondary rounded-pill me-1">' + registro.empresa + '</span>' +
                                    '<span class="badge badge-lg bg-light text-secondary rounded-pill me-1">' + registro.puesto + '</span>' +
                                '</div>' +
                            '</div>' +
                        '</div>');
                    
                    row.append(card);
                    console.log(registro.puesto + " cuenta " + registro.cuenta_checkin);
                    $("#"+chartId+"text").text(registro.cuenta_checkin + ' de ' + data.cuenta);
                    var options = {
                        series: [registro.cuenta_checkin],//],//[empresas.cuenta_checkin],
                        chart: {
                            type: "radialBar",
                            offsetY: -20,
                            sparkline: {
                                enabled: false,
                            }
                        },
                        plotOptions: {
                            radialBar: {
                                startAngle: -90,
                                endAngle: 90,
                                track: {
                                    background: "rgba(255, 255, 255, 0.5)",
                                    strokeWidth: "97%",
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
                                        fontSize: "22px",
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
                        colors: ["#727cf5"],
                        labels: [],
                        yaxis: {
                            min: 0,
                            max: 50,
                            },
                    };
                    
                    (chart = new ApexCharts(document.querySelector("#" + chartId), options)).render();
                    
                    
                });

                var title = $('<div class="col-12"><h2>Total de accesos '+data.cuenta+'</h2></div>');
                titleRow.append(title);
                container.append(titleRow);
            }
            
            
        }
    });
}
