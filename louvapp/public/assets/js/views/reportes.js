
function getSelectdata(){

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
                    mostrarModal("NO HAY ACCESOS ESTE DÍA");
                     
                    var title = $('<div class="col-12"><h2>NO HAY ACCESOS ESTE DÍA</h2></div>');
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
                            series: [registro.cuenta_checkin],
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
                                show: false,
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
                            labels: [],
                            yaxis: {
                                min: 0,
                                max: 50,  // Establece el límite máximo en 50
                            },
                        };
                        
                        (chart = new ApexCharts(document.querySelector("#" + chartId), options)).render();
                        $(".apexcharts-legend").text('');
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
    
                    var title = $('<div class="col-12"><h2>TOTAL DE ACCESOS '+data.cuenta+'</h2></div>');
                    titleRow.append(title);
                    container.append(titleRow);
                }
                
               
            }
        });
}
