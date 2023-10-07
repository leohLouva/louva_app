import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

    // Tu código Dropzone aquí
    
    const dropzone = new Dropzone("#dropzone",{
        dictDefaultMessage:"Sube aquí tu imagen",
        acceptedFiles:".png,.jpg,.jpeg,.gif,application/pdf",
        addRemoveLinks: true, //permite al usuario remover la imagen
        dictRemoveFile:"Borrar Archivo",
        maxFiles:15,
        parallelUploads:10,
        uploadMultiple:false,

        init: function(){
            const response = "";
            
            if(document.querySelector('[name="flImage"]').value.trim()){
                console.log("Flimage ya tiene dato");
                
            }else{
                console.log("entra el else de init")   
            }
    
        }
    });

    dropzone.on('success', function(file,response){
        console.log(" SUCCESSS")
        console.log(response); 
        document.querySelector('[id="folderName"]').value = response.folderName;
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

  