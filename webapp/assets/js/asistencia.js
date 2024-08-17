document.getElementById('agregar-fecha-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const fechaAsistencia = document.getElementById('fechaAsistencia').value;

    const lastFechaHeader = document.querySelectorAll('.evaluacion');
    const th = document.createElement('th');
    th.className = 'evaluacion';
    th.style.backgroundColor = '#009475';
    th.style.color = 'white';
    th.innerText = fechaAsistencia;
    th.style.borderTopLeftRadius = '10px';
    th.style.borderTopRightRadius = '10px';

    const referenceHeader = document.querySelector('.evaluacion') || document.querySelector('th:last-child');
    referenceHeader.parentNode.insertBefore(th, referenceHeader);

    const rows = document.querySelectorAll('#tablaAsistenciaBody tr');
    rows.forEach(row => {
        const td = document.createElement('td');
        td.style.border = 'none'; // Estilo opcional para asegurarse de que no afecte la apariencia
        row.insertBefore(td, row.querySelector('.evaluacion') || row.querySelector('td:last-child'));
    });
});

document.getElementById('agregar-trabajo-btn').addEventListener('click', function() {
    const lastTrabajoHeader = document.querySelectorAll('.trabajo');
    const th = document.createElement('th');
    th.className = 'trabajo';
    th.style.backgroundColor = '#009475';
    th.style.color = 'white';
    th.innerText = 'Trabajo';
    th.style.borderTopLeftRadius = '10px';
    th.style.borderTopRightRadius = '10px';

    const referenceHeader = document.querySelector('.evaluacion') || document.querySelector('th:last-child');
    referenceHeader.parentNode.insertBefore(th, referenceHeader);

    const rows = document.querySelectorAll('#tablaAsistenciaBody tr');
    rows.forEach(row => {
        const td = document.createElement('td');
        td.style.border = 'none'; // Estilo opcional para asegurarse de que no afecte la apariencia
        row.insertBefore(td, row.querySelector('.evaluacion') || row.querySelector('td:last-child'));
    });
});

function openModal(idModal) {
    const modal = document.getElementById(idModal);
    if (modal) {
        modal.style.display = "block";
    }
}

function closeModal(idModal) {
    const modal = document.getElementById(idModal);
    if (modal) {
        modal.style.display = "none";
    }
}

window.onclick = function(event) {
    const modal = document.getElementById("modaleditar");
    if (event.target == modal) {
        closeModal();
    }
}

$('#formUpdIns').on('submit', (e) => {
    e.preventDefault();
    const formData = new FormData(document.getElementById('formUpdIns'));

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