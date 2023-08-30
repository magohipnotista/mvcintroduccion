// VALIDACION EMAIL REPETIDO CON AJAX
$('.emailrep').on("change",function () {
    $(".alert").remove();
    var email = $(this).val();
    var datos = new FormData();
    datos.append("validarEmail", email);
    $.ajax({
        url: "ajax/formularios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta == 0) {
            } else {
                swal("Oops!", "El correo ya está en uso. Seleccione uno diferente", "info")
                    .then(() => {
                        setTimeout(function () {
                            location.reload();
                        }, 1);
                    });
            }
        }
    });
})