
    
    /*$( '#proyecto' ).select2( {
        theme: 'bootstrap-5'
    } );
    $( '#categoria' ).select2( {
        theme: 'bootstrap-5'
    } );*/

    function getValueSelectPro(){
        proyecto = $("#proyecto").val();
    }

    function getValueSelectCat(){
        categoria = $("#categoria").val();
    }

    function mostrarModal(errorMsj) {
        var paragraph = document.getElementById("msj");
    
        while (paragraph.firstChild) {
            paragraph.removeChild(paragraph.firstChild);
        }
        
        var text = document.createTextNode(errorMsj);
        paragraph.appendChild(text);
        $('#modalMsj').modal('show');
    }

    var numeroDeDivs = 2;

    function duplicateForm() {
        suma = sumarPorcentajes();

        if(parseFloat(suma) < 100){
            console.log("tu suma es " + parseFloat(suma));
        }else{
            mostrarModal("No puedes agregar otra actividad su tus actividades acumulan el 100%");
            return; 
        }


         var tabla = document.getElementById("historial");
         var newRow = tabla.insertRow();

        selectProyecto = document.querySelectorAll("select[name='proyecto[]']")
        var valoresSeleccionadosPro = [];
        var valorSeleccionadoPro = [];

        for (var i = 0; i < selectProyecto.length; i++) {
            var valorSeleccionadoPro = selectProyecto[i].value;
            if (valorSeleccionadoPro !== "" && valorSeleccionadoPro !== "0") {
                valoresSeleccionadosPro.push(valorSeleccionadoPro);;
            } else {
                mostrarModal("Debes elegir un proyecto!!");
                //document.getElementById("form_to_bitacora_1").style.display = "";
                return; 
            }
        }

        selectCategoria = document.querySelectorAll("select[name='categoria[]']")
        var valoresSeleccionadosCate = [];
        var valorSeleccionadoCate = [];

        for (var i = 0; i < selectCategoria.length; i++) {
            var valorSeleccionadoCate = selectCategoria[i].value;
            if (valorSeleccionadoCate !== "" && valorSeleccionadoCate !== "0") {
                valoresSeleccionadosCate.push(valorSeleccionadoCate);
            } else {
                mostrarModal("Debes elegir una categoria!!");
                return; 
            }
        }

        porcentaje = document.querySelectorAll("input[name='porcentaje[]']");
        var valoresPorcentaje = [];
        var valorPorcentaje = [];
        for (var i = 0; i < porcentaje.length; i++) {
            var valorPorcentaje = porcentaje[i].value;
            valoresPorcentaje.push(valorPorcentaje);;
            if (valorPorcentaje === "" || parseFloat(valorPorcentaje) === 0 || parseFloat(valorPorcentaje) > 100){
                mostrarModal("No puedes dejar el porcentaje vacio antes de agregar otra actividad, ni agregarlo como CERO");
                return;
            }
        }

           
            // Agrega celdas a la fila con los valores del div anterior
            var cellProyecto = newRow.insertCell(0);
            cellProyecto.innerHTML = valoresSeleccionadosPro.join(", ");

            var cellCategoria = newRow.insertCell(1);
            cellCategoria.innerHTML = valoresSeleccionadosCate.join(", ");

            var cellPorcentaje = newRow.insertCell(2);
            cellPorcentaje.innerHTML = valoresPorcentaje.join(", ");
            document.getElementById("historial").style.display = "block";


            var originalDiv = document.querySelector("#form_to_bitacora_1");
            var clonedDiv = originalDiv.cloneNode(true);
            var divAnterior = numeroDeDivs - 1;
            document.getElementById("form_to_bitacora_"+divAnterior).style.display = "none";
            clonedDiv.id = "form_to_bitacora_" + numeroDeDivs;
            
            console.log("numero de divs: " + numeroDeDivs);

            var selectProyecto = clonedDiv.querySelector("#proyecto");
            var selectCategoria = clonedDiv.querySelector("#categoria");
            var inputs = clonedDiv.querySelectorAll("input[type='number']");
            var span = clonedDiv.querySelector("#miContenedor");
            span.textContent = numeroDeDivs;
            for (var j = 0; j < inputs.length; j++) {
                inputs[j].name = "porcentaje[]"; 
                inputs[j].value = "";// 100-suma;
            }
        
            // Agregamos el nuevo div clonado al documento
            originalDiv.parentNode.appendChild(clonedDiv);
            //mostramos el div clonado. 
            document.getElementById("form_to_bitacora_" + numeroDeDivs).style.display = "";

            //Agregamos el un span con el total de porcentaje que llevas agregado
            spanSuma = document.getElementById("porcentajeTotal");
            spanSuma.textContent = 'Tu porcentaje actual '+ suma + '%';
            numeroDeDivs++;


        
    }

  

    function sumarPorcentajes() {
        var porcentajes = document.querySelectorAll('input[name="porcentaje[]"]');
        var suma = 0;

        for (var i = 0; i < porcentajes.length; i++) {
            var porcentaje = parseFloat(porcentajes[i].value); // Convertir a número

            if (!isNaN(porcentaje)) {
                suma += porcentaje;
            }
        }
        return suma;
    }


    function enviarForm(){
        selectProyecto = document.querySelectorAll("select[name='proyecto[]']")
        var valoresSeleccionadosPro = [];
        var valorSeleccionadoPro = [];

        for (var i = 0; i < selectProyecto.length; i++) {
            var valorSeleccionadoPro = selectProyecto[i].value;
            if (valorSeleccionadoPro !== "" && valorSeleccionadoPro !== "0") {
                valoresSeleccionadosPro.push(valorSeleccionadoPro);;
            } else {
                mostrarModal("Debes elegir un proyecto antes de enviar tus actividades!!");
                //document.getElementById("form_to_bitacora_1").style.display = "";
                return; 
            }
        }

        selectCategoria = document.querySelectorAll("select[name='categoria[]']")
        var valoresSeleccionadosCate = [];
        var valorSeleccionadoCate = [];

        for (var i = 0; i < selectCategoria.length; i++) {
            var valorSeleccionadoCate = selectCategoria[i].value;
            if (valorSeleccionadoCate !== "" && valorSeleccionadoCate !== "0") {
                valoresSeleccionadosCate.push(valorSeleccionadoCate);
            } else {
                mostrarModal("Debes elegir una categoria antes de enviar tus actividades!!");
                //document.getElementById("form_to_bitacora_1").style.display = "";
                return; 
            }
        }

        porcentaje = document.querySelectorAll("input[name='porcentaje[]']");
        var valoresPorcentaje = [];
        var valorPorcentaje = [];
        for (var i = 0; i < porcentaje.length; i++) {
            var valorPorcentaje = porcentaje[i].value;
            valoresPorcentaje.push(valorPorcentaje);;
            if (valorPorcentaje === "" || parseFloat(valorPorcentaje) === 0 || parseFloat(valorPorcentaje) > 100){
                mostrarModal("No puedes dejar el porcentaje vacio antes de agregar otra actividad, ni agregarlo como CERO");
                return;
            }
        }
        
        
        document.getElementById("form_bitacora").submit();

    }