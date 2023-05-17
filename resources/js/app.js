import './bootstrap';
import Alpine from 'alpinejs';
import Dropzone from "dropzone";

window.Alpine = Alpine;

Alpine.start();

Dropzone.autoDiscover = false; //Desactivar auto

if(document.getElementById("dropzone")) {
    
    const dropzone = new Dropzone("#dropzone", {
        dictDefaultMessage: "Sube aquí tus archivos",
        acceptedFiles: ".png,.jpg,.jpeg,.pdf,.doc,.docx,.ppt,.pptx,.mp4,.avi,.mov,.wmv",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar archivo",
        maxFilesize: 10,
    });

    var contador = 0; //Contador para los multiples archivos que se suban en la evidencia
    
    //Cuando se sube un archivo
    dropzone.on('success', function(file, response) {
        contador++;
        //Se crea un input oculto y aumentara el contador
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'archivo[' + contador + ']';
        input.value = response.archivos;
        document.querySelector('#archivos').appendChild(input);
    })
    //Cuando se elimina
    dropzone.on('removedfile', function(file) {
        var nombreArchivo = file.name;

        contador--;
        var input = document.querySelector('[name="archivo[' + (contador + 1) + ']"]');
        input.parentNode.removeChild(input);
    })
}
