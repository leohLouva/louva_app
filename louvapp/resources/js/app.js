import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

    // Tu código Dropzone aquí
    
    const dropzone = new Dropzone("#dropzone",{
        dictDefaultMessage:"Sube aquí tu imagen",
        acceptedFiles:".png,.jpg,.jpeg,.gif,application/pdf",
        addRemoveLinks: true, //permite al usuario remover la imagen
        dictRemoveFile:"",
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

        console.log(response.message);
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

    const waitingDialog = {
        show: function() {
            document.getElementById("loaderProgress").classList.remove("hide");
        },
        hide: function() {
            document.getElementById("loaderProgress").classList.add("hide");
        }
    }
    
    
    // var waitingDialog = waitingDialog || (function ($) {
    //     'use strict';
    
    // 	// Creating modal dialog's DOM
    // 	var $dialog = $(
    // 		'<div class="modal " data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
    // 		'<div class="modal-dialog modal-m">' +
    // 		'<div class="modal-content">' +
    // 			'<div class="modal-header"><h3 id="titleDialog" style="margin:0;"></h3></div>' +
    // 			'<div class="modal-body">' +
    // 				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
    // 			'</div>' +
    // 		'</div></div></div>');
    
    // 	return {
    // 		/**
    // 		 * Opens our dialog
    // 		 * @param message Custom message
    // 		 * @param options Custom options:
    // 		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
    // 		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
    // 		 */
    // 		show: function (message, options) {
    // 			// Assigning defaults
    // 			if (typeof options === 'undefined') {
    // 				options = {};
    // 			}
    // 			if (typeof message === 'undefined') {
    // 				message = 'Processing';
    // 			}
    // 			var settings = $.extend({
    // 				dialogSize: 'm',
    // 				progressType: '',
    // 				onHide: null // This callback runs after the dialog was hidden
    // 			}, options);
    
    // 			// Configuring dialog
    // 			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
    // 			$dialog.find('.progress-bar').attr('class', 'progress-bar');
    // 			if (settings.progressType) {
    // 				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
    // 			}
    // 			$dialog.find('h3').text(message);
    // 			// Adding callbacks
    // 			if (typeof settings.onHide === 'function') {
    // 				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
    // 					settings.onHide.call($dialog);
    // 				});
    // 			}
    // 			// Opening dialog
    // 			$dialog.modal();
    // 		},
    // 		/**
    // 		 * Closes dialog
    // 		 */
    // 		hide: function () {
    // 			$dialog.modal('hide');
    // 		}
    // 	};
    
    // })(jQuery);
    function showDialog(title,txtMessage,type) {
      switch (type) {
        case undefined:
          type = BootstrapDialog.TYPE_DEFAULT;
          break;
        case "primary":
          type = BootstrapDialog.TYPE_PRIMARY;
          break;
        case "warning":
          type = BootstrapDialog.TYPE_WARNING;
          break;
        default:
        type = BootstrapDialog.TYPE_PRIMARY;
    
          break;
    
      }
    
      if(title == undefined || title == "") { title = "SAM Manager"; }
      if(txtMessage == undefined || txtMessage == "") { txtMessage = "Something wrong happened, contact an admin.";}
    
      //alert(title + " "+message +" "+ type);
      BootstrapDialog.show({
                     type: type,
                     title: title,
                     message: txtMessage,
    
                 });
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
      