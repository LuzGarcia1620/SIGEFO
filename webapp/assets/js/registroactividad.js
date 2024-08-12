if ($('#flag').val() === "1") {
    Swal.fire({
        title: 'Ojo Docente',
        text: "Sus datos ya se encuentran almacenados, haga click en registrarse para inscirbirse a esta actividad o puede editar sus datos",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    })
} else {
    Swal.fire({
        title: 'No se encontraron sus datos',
        text: "¿Desea registrarse?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, deseo registrarme'
    }).then((result) => {
        if (result.isDismissed){
            window.location.href = "/SIGEFO/"
        }
    })
}

document.addEventListener('DOMContentLoaded', function () {
    const formDocenteSave = document.getElementById('formDocenteSave');

    $('#formDocenteSave').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(formDocenteSave);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Docente se registro exitosamente.', 'success');
                    window.location.href = '/SIGEFO/';
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    })
})