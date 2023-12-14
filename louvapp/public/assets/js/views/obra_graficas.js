var charts = {};
var chart; 
function getHistorico(){

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var idProyecto = $('#idProyecto').val();
    var fechaInicio = document.getElementById("dateStart").value;
    var fechaFin = document.getElementById("dateEnd").value;

    $.ajax({
        type: 'POST',
        url: proyectoEmpresasRoute,
        data: {
            idProyecto: idProyecto,
            fechaInicio:fechaInicio,
            fechaFin:fechaFin,
            _token: csrfToken
        },
        success: function (data) {
            
            //Agregamos el total de trabajadores en el div cuentaTrabajadores de hoy
            document.getElementById("cuentaTrabajadores").textContent = data.cuenta;
            //Cargamos la grafica principal -> grafica de barras
            graficaPrincipal(data);
            
            var formattedData = {
                    x: data.historico.map(item => item.date),
                    y: data.historico.map(item => item.total_checkins),
                };

            var options = {
                            series: [{
                                    name: 'TOTAL DE FT',
                                    data: formattedData.y
                            }],
                            colors : ["#fa5c7c"],
                                chart: {
                                type: 'area',
                                stacked: false,
                                height: 350,
                                zoom: {
                                type: 'x',
                                enabled: true,
                                autoScaleYaxis: true
                                },
                                toolbar: {
                                autoSelected: 'zoom'
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            markers: {
                                size: 7,
                            },
                            title: {
                                text: 'FUERZA DE TRABAJO HISTORICO',
                                align: 'left'
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                shadeIntensity: 1,
                                inverseColors: true,
                                opacityFrom: 0.5,
                                opacityTo: 0.3,
                                stops: [0, 90, 100]
                                },
                            },
                            yaxis: {
                                min: 0, 
                                max: 20,
                                labels: {
                                    
                                },
                                title: {
                                text: 'TOTALES'
                                },
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: formattedData.x
                            },
                            tooltip: {
                                shared: true,
                                y: {
                                
                                }
                            }
                };            
        colors = ((chart = new ApexCharts(document.querySelector("#line-chart-zoomable"), options)).render(),["#fa5c7c"]);

        const puestosTotales = {};

        // Iterar sobre los datos y acumular totales
        data.registro.forEach((registro) => {
            const puesto = registro.puesto;
            const total = registro.checkin_trabajadores;
        
            if (!puestosTotales[puesto]) {
                puestosTotales[puesto] = 0;
            }
        
            puestosTotales[puesto] += total;
        });
        
        
        document.getElementById("puestosContainer").innerHTML = "";
        let filaActual = null;
        for (const [puesto, total] of Object.entries(puestosTotales)) {
            if (!filaActual) {
                filaActual = document.createElement("div");
                filaActual.classList.add("d-flex", "flex-row");
            }
        
            const nuevoElemento = document.createElement("div");
            nuevoElemento.classList.add("puesto-container", "mr-2");
            nuevoElemento.innerHTML = `<div class="avatar-md rounded">
                <span class="avatar-title bg-success-lighten text-dark border border-success rounded-circle h3 my-0 total-${total}">${total}</span>
                ${puesto}
            </div>`;
        
            filaActual.appendChild(nuevoElemento);
        
            if (filaActual.children.length === 4) {
                document.getElementById("puestosContainer").appendChild(filaActual);
                filaActual = null;
            }
        }
        
        if (filaActual) {
            document.getElementById("puestosContainer").appendChild(filaActual);
        }
        

        }
    });
    
        
}

function graficaPrincipal(registro){
    const datosAcomodados = {
        categories: [],
        series: [],
        totalEstimado: []
    };
        console.log(registro);
      registro.registro.forEach((resultado) => {
        const empresa = resultado.empresa;
        const puesto = resultado.puesto;
        const totalEstimado = resultado.ft_programado;
        const trabajadores = resultado.checkin_trabajadores;


        // Agregar empresa a categories si aún no está presente
        if (!datosAcomodados.categories.includes(empresa)) {
            datosAcomodados.categories.push(empresa);
            datosAcomodados.totalEstimado.push(totalEstimado);
            datosAcomodados.series.forEach((serie) => {
                serie.data.push(0);
            });
        }
        
        let serieExistente = datosAcomodados.series.find((serie) => serie.name === puesto);
        if (serieExistente) {
          serieExistente.data[datosAcomodados.categories.indexOf(empresa)] += trabajadores;
        } else {
            const nuevaSerie = {
                name: puesto,
                data: Array(datosAcomodados.categories),//.length).fill(1),
                total:datosAcomodados.totalEstimado,
              };
          nuevaSerie.data[datosAcomodados.categories.indexOf(empresa)] = trabajadores;
          datosAcomodados.series.push(nuevaSerie);
        }

        

    });
        const colores = ['#727cf5', '#0acf97', '#fa5c7c', '#6c757d', '#39afd1', '#32CD32', '#F52EDD', '#8A2BE2'];
        const position = datosAcomodados.categories.length - 1;
        
        
    
    dataColors = $("#stacked-bar").data("colors");


    const options = {
        series: [],
        plotOptions: {
          bar: {
            horizontal: true,
            dataLabels: {
              position: 'center'
            }
          },
        },
        dataLabels: {
          total: {
            enabled: true,
            //enabledOnSeries: [datosAcomodados.categories.length],
            textAnchor: 'left',
            offsetX: 0,
            style: {
              fontSize: '13px',
              fontWeight: 900
            }
          },
          formatter: function (_val, opt) {
                let series = opt.w.config.series;
                let idx = opt.dataPointIndex;
                let seriesIndex = opt.seriesIndex;
                    
                    console.log(opt);

                // Verifica si es el último punto de datos en la serie
                /*if (idx === series[seriesIndex].data.length - 1) {
                    const total = series.reduce((total, self) => total + self.data[idx], 0);
                    const totalSinDecimales = parseInt(total);
                    totalFinal = (totalSinDecimales / datosAcomodados.totalEstimado[idx]) * 100;
    
                    console.log('Total: ' + totalSinDecimales + ' de ' + datosAcomodados.totalEstimado[idx]);
                    return '' + totalSinDecimales + ' de ' + datosAcomodados.totalEstimado[idx] + ' = ' + parseInt(totalFinal) + '% ';
                }
    
                return ''; */
            
            
          },
            offsetX: 0,
            style: {
                fontSize: '13px',
                fontWeight: 900,
                position: 'absolute',
                right: '10',
                transform: 'translateX(100%)',
                colors: ["#FFF"],
            }
        },
        chart: {
          type: 'bar',
          height: 350,
          stacked: true,
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        title: {
            text:  registro.fechaInicio + ' AL ' + registro.fechaFin
        },
        xaxis: {
            categories: datosAcomodados.categories,
            labels: {
                formatter: function (val) {
                    return parseInt(val) + " FT"
                }
            }
        },
        yaxis: {
            title: {
                text: ''
            },
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return val + " TRABAJADOR (ES)"
            },
            
          }
      },
      fill: {
            opacity: 1,
        },
        legend: {
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 40
        }
      };

    registro.registro.forEach((resultado, index) => {
        const empresa = resultado.empresa;
        const puesto = resultado.puesto;
        const trabajadores = resultado.checkin_trabajadores;

        if (!options.series[index]) {
            options.series[index] = {};
        }

        options.series[index].name = puesto;
        options.series[index].data = Array(datosAcomodados.categories.length).fill(0);
        options.series[index].color = colores[index % colores.length];
        options.series[index].data[datosAcomodados.categories.indexOf(empresa)] = trabajadores;
    });

    const chart = new ApexCharts(document.querySelector("#stacked-bar"), options);
    console.log(options);
    chart.render();
    chart.updateOptions({
        //series: datosAcomodados.series,
    });
  
}



function getFormatDate(date) {
    var currentDate = new Date();
    
    currentDate.setDate(currentDate.getDate());

    var dd = currentDate.getDate();
    var mm = currentDate.getMonth() + 1;
    var yyyy = currentDate.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }

    var formattedDate = dd + '-' + mm + '-' + yyyy;

    return formattedDate;

}