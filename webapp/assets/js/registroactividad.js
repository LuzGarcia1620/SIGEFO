if ($('#flag').val() === "1") {
    Swal.fire({
        title: '¡Atención!',
        text: "Sus datos ya se encuentran almacenados, haga clic en registrarse para inscribirse a esta actividad y también puede editar sus datos ",
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