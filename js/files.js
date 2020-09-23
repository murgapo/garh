function agregarArchivos(){
    var formData = new FormData(document.getElementById('frmAgregarArchivos')); //Objeto nativo de JS que permite enviar archivos
    $.ajax({
        url: "../process/files/savefiles.php",
        type: "POST",
        datatype: "html", //Para evitar meter los controles uno por uno, para que reconozca el formulario como un HTML aunque traiga archivos
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) { //Función de JQuery para guardar archivos
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmAgregarArchivos')[0].reset(); //Reinicia el formulario despues de agregar archivos
                $('#tableFilesManager').load("files/tablefile.php");
                swal(":)","Archivo agregado con éxito!","success");
            } else{
                swal(":(", "Falló al agregar el archivo", "error");
            }
        }
    });
}

function eliminarArchivos(codigoArchivo) {
    swal({
        title: "¿Está seguro?",
        text: "Una vez eliminado el archivo, no podrá recuperarse!!!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:"POST",
                    data:"codigoArchivo=" + codigoArchivo,
                    url:"../process/files/deletefiles.php",
                    success:function (respuesta) {
                        respuesta = respuesta.trim(); //Elimina espacios al inicio/final de la cadena
                        if (respuesta == 1) {
                            $('#tableFilesManager').load("files/tablefile.php");
                            swal("El archivo ha sido eliminado con éxito!", {
                                icon: "success",
                            });  
                        }else{
                            swal("El archivo no pudo ser eliminado!", {
                                icon: "error",
                            });  
                        }                                         
                    }
                });
            }
        });
}

function obtenerArchivoID(codigoArchivo) {
    //alert(codigoArchivo);
    $.ajax({
        type:"POST",
        data:"codigoArchivo="+codigoArchivo,
        url:"../process/files/getfile.php",
        success:function(answer) {
            $('#archivoObtenido').html(answer);
        }
    });
}