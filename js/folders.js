function addFolder() {
    var folder = $('#nameFolder').val(); //Almacena el valor del campo "Nombre de Carpeta"
    if (folder == "") {
        swal("Uups!", "Debe ingresar el nombre para la nueva Carpeta", "info");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: "folder=" + folder,
            url: "../process/folders/addfolder.php",
            success: function (answer) {
                answer = answer.trim(); //Eliminar espacios al principio o al final de la cadena
                if (answer == 1) {
                    $('#tableFoldersManager').load("folders/tablefolder.php"); //Recarga la tabla
                    $('#nameFolder').val("");
                    swal(":)", "Carpeta agregada con éxito", "success");
                } else {
                    swal(":(", "Falló al agregar carpeta", "error");
                }
            }
        });
    }
}

function deleteFolder(idFolder) {
    idFolder = parseInt(idFolder);
    if (idFolder < 1) {
        swal("Uups!", "Esa carpeta no existe :(", "error");
        return false;
    }else{
        /************************************************/
            swal({
                    title: "¿Está seguro?",
                    text: "Una vez eliminada esta Carpeta, no podrá recuperarse!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            data: "idFolder=" + idFolder,
                            url: "../process/folders/deletefolder.php",
                            success:function(answer){
                                answer = answer.trim();
                                if (answer == 1) {
                                    $('#tableFoldersManager').load("folders/tablefolder.php"); //Recarga la tabla
                                    swal(":)", "La carpeta ha sido eliminada!", {
                                        icon: "success",
                                    });
                                } else{
                                    swal(":(", "Falló al eliminar la carpeta!", "error");
                                }
                            }                              
                        });
                    }
                });
        /************************************************/
    }
}

function editFolder(idFolder) {
    $.ajax({
        type:"POST",
        data:"idFolder=" + idFolder,
        url: "../process/folders/editfolder.php",
        success:function(answer) {
            answer = jQuery.parseJSON(answer);
            //console.log(answer); *** sólo para pruebas **
            $('#idFolder').val(answer['idFolder']);  //el primer idFolder viene de views/folders.php y el segundo idFolder viene de class/Folder.php (en el array)
            $('#updateFolder').val(answer['folderName']);  //el updateFolder viene de views/folders.php y el folderName viene de class/Folder.php (en el array)
        }
    })
}

function updateFolder() {
    if ($('#updateFolder').val() == "") {
        swal(":(", "Campo vacío!", "error");
        return false;
    }else{
        $.ajax({
            type: 'POST',
            data: $('#frmUpdateFolder').serialize(),
            url: "../process/folders/updatefolder.php",
            success:function(answer) {
                answer = answer.trim();
                
                if (answer == 1) {
                    $('#tableFoldersManager').load("folders/tablefolder.php"); //Recarga la tabla
                    swal(":)", "Carpeta actualizada con éxito!", "success");
                }else{
                    swal(":(", "Falló al actualizar!", "error");
                }
            }
        })
    }
}