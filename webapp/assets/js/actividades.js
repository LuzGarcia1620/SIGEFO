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

document.addEventListener('DOMContentLoaded', function () {
    const formSuperAdmin = document.getElementById('formSuperAdmin');

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
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    });
})