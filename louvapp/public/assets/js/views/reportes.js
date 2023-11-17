var charts = {};
var chart; // Declara la variable en un ámbito más amplio

function getGraphicByProyect(){

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var idProyecto = $('#idProyecto').val();
    var fechaRegistro = $('#fechaInicio').val();

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
                var container = $('#contractorsContainer');
                container.empty();
                var row = $('<div class="row"></div> '); 
                var titleRow = $('<div class="row"></div>');
                console.log("por proyecto");
                console.log(data);
                if (data.cuenta == 0) {
                    mostrarModal("ALERTA","NO HAY ACCESOS ESTE DÍA",2);
                     
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
                    
    
                    var title = $('<div class="col-12"><h2>TOTAL DE ACCESOS '+data.cuenta+'</h2></div>');
                    titleRow.append(title);
                    container.append(titleRow);
                }
                
               
            }
        });

}

function formatearFecha(fecha) {
    var dia = fecha.getDate();
    var mes = fecha.toLocaleString('default', { month: 'short' });
    mes = mes.charAt(0).toUpperCase() + mes.slice(1); 
    var anio = fecha.getFullYear();
    return dia + "-" + mes + "-" + anio;
}

function graficaPorPuesto(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var idProyecto = $('#idProyecto').val();
    var fechaRegistro = $('#fechaInicio').val();
  
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
                var container = $('#contractorsContainer');
                container.empty();
                var row = $('<div class="row"></div> '); 
                var titleRow = $('<div class="row"></div>');
                console.log(data);
                if (data.cuenta == 0) {
                    mostrarModal("NO HAY ACCESOS ESTE DÍA");
                    var title = $('<div class="col-12"><h3>NO HAY ACCESOS ESTE DÍA</h3></div>');
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
                    
    
                    var title = $('<div class="col-12"><h2>TOTAL DE ACCESOS '+data.cuenta+'</h2></div>');
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