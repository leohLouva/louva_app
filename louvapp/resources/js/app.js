import './bootstrap';
import dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage:"Sube aquí tu imagen",
    acceptedFiles:".png,.jpg,.jpeg,.git",
    addRemoveLinks: true,
    dictRemoveFile:"Borrar Archivo",
    uploadMultiple: false,
});

dropzone.on('sending', function(file,xhr,formData){
    console.log(file);
});
