document.getElementById('agregar-fecha-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const fechaAsistencia = document.getElementById('fechaAsistencia').value;
    
    if (fechaAsistencia) {
        const th = document.createElement('th');
        th.className = 'asistencia';
        th.style.backgroundColor = '#002E60';
        th.style.color = 'white';
        th.innerText = fechaAsistencia;
        th.style.borderTopLeftRadius = '10px';
        th.style.borderTopRightRadius = '10px';

        // Verifica si existe un encabezado de columna `trabajo`
        const trabajoHeader = document.querySelector('.trabajo') || document.querySelector('th.evaluacion');
        trabajoHeader.parentNode.insertBefore(th, trabajoHeader);

        const rows = document.querySelectorAll('#tablaAsistenciaBody tr');
        rows.forEach(row => {
            const td = document.createElement('td');
            td.innerHTML = '<input type="checkbox">';
            row.insertBefore(td, row.querySelector('.trabajo') || row.querySelector('.evaluacion'));
        });

        document.getElementById('fechaAsistencia').value = '';
    }
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
        const lastTrabajoCell = row.querySelectorAll('.trabajo');
        const td = document.createElement('td');
        td.innerHTML = '<input type="text" class="form-control" placeholder="Calificación">';
        row.insertBefore(td, row.querySelector('.evaluacion') || row.querySelector('td:last-child'));
    });
});
