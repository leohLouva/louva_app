//import './bootstrap';
//import ApexCharts from 'apexcharts';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage:"Sube aquí tu imagen",
    acceptedFiles:".png,.jpg,.jpeg,.git",
    addRemoveLinks: true,
    dictRemoveFile:"Borrar Archivo",
    uploadMultiple: false,

    init: function(){
        //const response = "";

        if(document.querySelector('[name="flImage"]').value.trim()){
            const imagePublicated = {};
            imagePublicated.size = 1234;
            imagePublicated.name =  document.querySelector('[name="flImage"]').value = response.imagen;

            this.options.addedfile.call(this, imagePublicated);
            this.options.thumbnail.call(this, imagePublicated,'{uploads/${imagePublicated.name}');

            imagePublicated.previewElement.classList.add(
                'dz-success',
                'dz-complete'
            );

        }
    }
});

dropzone.on('success', function(file,response){
    console.log(response);
    document.querySelector('[name="flImage"]').value = response.imagen;
});

dropzone.on('removedfile', function(){
    document.querySelector('[name="flImage"]').value = '';
    
});