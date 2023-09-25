//import './bootstrap';
//import ApexCharts from 'apexcharts';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzoneUser = new Dropzone("#dropzoneUser",{
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
            this.options.thumbnail.call(this, imagePublicated,'{uploads/usuarios/${imagePublicated.name}');

            imagePublicated.previewElement.classList.add(
                
            );
        }else{
            console.log("elase")
        }

    }
});

dropzoneUser.on('success', function(file,response){
    console.log(response);
    document.querySelector('[name="flImage"]').value = response.imagen;
});

dropzoneUser.on("complete", function(file) {
    console.log("imagen guadada complete on");
    console.log(file)
    //myDropzone.removeFile(file);
});

dropzoneUser.on('removedfile', function(response){
    console.log(response);
    //dropzoneUser.removeFile('uploads/usuarios/'+removingImg);
    document.querySelector('[name="flImage"]').value = '';
    
});


