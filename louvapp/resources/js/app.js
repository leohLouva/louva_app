import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

    // Tu código Dropzone aquí
    
    const dropzone = new Dropzone("#dropzone",{
        dictDefaultMessage:"Sube aquí tu imagen",
        acceptedFiles:".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true, 
        dictRemoveFile:"Borrar",
        maxFiles:15,
        parallelUploads:10,
        uploadMultiple:false,

        init: function(){
            const response = "";
            
            if(document.querySelector('[name="flImage"]').value.trim()){
                console.log("Flimage ya tiene dato");
                
            }else{
                console.log("FLIMAGE no tiene datossssss")   
            }
    
        }
    });

    dropzone.on('success', function(file,response){

        mostrarModal('BIEN HECHO!',response.message,'1');
        setTimeout(function () {
            if(response.redirect == '0'){

            }else{
                window.location.href = response.redirect;
            }
        }, 2000);
        document.querySelector('[name="flImage"]').value = response.imagen;
    });
    
    dropzone.on("error", function(file,response) {
        //mostrarModal("No se ha guardado la imagen, asegúrate que elegiste un contratista antes de subir la imagen ")
        mostrarModal(response.message)
        //myDropzone.removeFile(file);
    });
    
    dropzone.on('removedfile', function(response){
        console.log("borrando imagen");
        console.log(response);
        document.querySelector('[name="flImage"]').value = '';
    });

    const waitingDialog = {
        show: function() {
            document.getElementById("loaderProgress").classList.remove("hide");
        },
        hide: function() {
            document.getElementById("loaderProgress").classList.add("hide");
        }
    }
    
    
    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
      }
      

      