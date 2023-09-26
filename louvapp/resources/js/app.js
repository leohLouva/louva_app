
//import './bootstrap';
//import ApexCharts from 'apexcharts';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage:"Sube aquí tu imagen",
    acceptedFiles:".png,.jpg,.jpeg,.git,PNG",
    addRemoveLinks: true,
    dictRemoveFile:"Borrar Archivo",
    maxFiles:1,
    uploadMultiple: false,

    init: function(){
        const response = "";
        if(document.querySelector('[name="flImage"]').value.trim()){
            const imagePublicated = {};
            imagePublicated.size = 1234;
            imagePublicated.name =  document.querySelector('[name="flImage"]').value = response.imagen;
            
            this.options.addedfile.call(this, imagePublicated);
            //this.options.thumbnail.call(this, imagePublicated,'{uploads/proyectos/${imagePublicated.name}');

            imagePublicated.previewElement.classList.add(
                
            );
        }else{

            console.log("elase")
        }

    }
});

dropzone.on('success', function(file,response){
    console.log(" SUCCESSS")
    console.log(response);
    document.querySelector('[name="flImage"]').value = response.imagen;
});

dropzone.on("error", function(file,message) {
    console.log(message)
    //myDropzone.removeFile(file);
});

dropzone.on('removedfile', function(response){
    console.log(response);
    //dropzone.removeFile('uploads/usuarios/'+removingImg);
    document.querySelector('[name="flImage"]').value = '';
});
