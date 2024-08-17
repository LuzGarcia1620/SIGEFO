
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = "block";
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = "none";
}

// Función para cerrar el modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

/* SweetAlert para eliminar la actividad al hacer clic en la imagen
document.getElementById('deleteActivityImage').addEventListener('click', function() {
    Swal.fire({
        title: "¿Está seguro que desea eliminar",
        text: "No podrá deshacer esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            // Lógica para eliminar la actividad
            Swal.fire("Eliminado!", "La actividad ha sido eliminada.", "success");
        }
    });
});*/

// Mostrar campo "Otra Modalidad" si selecciona "Otro"
function toggleOtraModalidad(select) {
    var otraModalidad = document.getElementById("otraModalidad");
    if (select.value === "otro") {
        otraModalidad.style.display = "block";
    } else {
        otraModalidad.style.display = "none";
    }
}

// Calcular duración total
function calcularDuracionTotal() {
    var presencial = parseInt(document.getElementById('presencial').value) || 0;
    var enLinea = parseInt(document.getElementById('enLinea').value) || 0;
    var independiente = parseInt(document.getElementById('independiente').value) || 0;
    var duracion = presencial + enLinea + independiente;
    document.getElementById('duracion').value = duracion;
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('presencial').addEventListener('input', calcularDuracionTotal);
    document.getElementById('enLinea').addEventListener('input', calcularDuracionTotal);
    document.getElementById('independiente').addEventListener('input', calcularDuracionTotal);
    const formSuperAdmin = document.getElementById('formSuperAdmin');
    const formSuperAdminUpdate = document.getElementById('formSuperAdminUpdate');
    const formSuperAdminSend = document.getElementById('formSuperAdminSend');
    const formSuperAdminDelete = document.getElementById('formSuperAdminDelete');

    $('#formSuperAdmin').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(formSuperAdmin);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Formulario agregado exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    });

    $('.btnUpdateAc').on('click', (e) => {
        e.preventDefault();
        Swal.fire({
            title: 'Confirmación Actualización',
            text: "¿Esta seguro de actualizar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, actualizar'
        }).then((result) => {
            if (result.isConfirmed)
                actualizarActividad()
        });
    });

    //Metodo con AJAX para mostrar las alertas indicando el estado de la actualación del Usuario
    const actualizarActividad = () => {
        const formData = new FormData(formSuperAdminUpdate);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Actividad actualizada exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    }

    $('.btnSendAc').on('click', (e) => {
        e.preventDefault();

        Swal.fire({
            title: 'Confirmación de Envio',
            text: "¿Esta seguro de enviar la Actividad?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Enviar'
        }).then((result) => {
            if (result.isConfirmed)
                enviarActividad()
        });
    });

    const enviarActividad = () => {
        const formData = new FormData(formSuperAdminSend);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Actividad enviada al publico exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    }

    $('.btnDeleteAc').on('click', (e) => {
        e.preventDefault();

        Swal.fire({
            title: 'Confirmación de Eliminación',
            text: "¿Esta seguro de eliminar la Actividad?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar'
        }).then((result) => {
            if (result.isConfirmed)
                eliminarActividad()
        });
    });

    const eliminarActividad = () => {
        const formData = new FormData(formSuperAdminDelete);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Actividad Eliminada exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    }
});

//contador de palabras
function countWords() {
    const textInput = document.getElementById('presentacion');
    const wordCountDisplay = document.getElementById('wordCountDisplay');
    const words = textInput.value.split(/\s+/).filter(word => word.length > 0);
    const wordCount = words.length;

    wordCountDisplay.textContent = `Palabras: ${wordCount} / 500`;

    if (wordCount > 500) {
        wordCountDisplay.classList.add('word-count');
    } else {
        wordCountDisplay.classList.remove('word-count');
    }
}

document.querySelector('form').addEventListener('submit', function (event) {
    const wordCount = document.getElementById('presentacion').value.split(/\s+/).filter(word => word
        .length > 0).length;

    if (wordCount > 500) {
        event.preventDefault();
        alert('El texto no debe superar las 500 palabras.');
    }
});