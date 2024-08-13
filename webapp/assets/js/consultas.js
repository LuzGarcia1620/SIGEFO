document.addEventListener('DOMContentLoaded', function() {

});

function showInput(type) {
    const select = document.getElementById('dynamicSelect');
    let options = [];
    switch (type) {
        case 'year':
            options = [
                '<option value="">Seleccione el año</option>',
                '<option value="2021">2021</option>',
                '<option value="2022">2022</option>',
                '<option value="2023">2023</option>',
                '<option value="2024">2024</option>'
            ];
            break;
        case 'instructor':
            options = [
                '<option value="">Seleccione el instructor</option>',
                '<option value="Instructor1">Instructor 1</option>',
                '<option value="Instructor2">Instructor 2</option>',
                '<option value="Instructor3">Instructor 3</option>'
            ];
            break;
        case 'unit':
            options = [
                '<option value="">Seleccione la unidad académica</option>',
                '<option value="Unidad1">Unidad 1</option>',
                '<option value="Unidad2">Unidad 2</option>',
                '<option value="Unidad3">Unidad 3</option>'
            ];
            break;
        case 'teacher':
            options = [
                '<option value="">Seleccione el docente</option>',
                '<option value="Docente1">Docente 1</option>',
                '<option value="Docente2">Docente 2</option>',
                '<option value="Docente3">Docente 3</option>'
            ];
            break;
        case 'gender':
            options = [
                '<option value="">Seleccione el género</option>',
                '<option value="masculino">Masculino</option>',
                '<option value="femenino">Femenino</option>'
            ];
            break;
    }
    select.innerHTML = options.join('');
    document.getElementById("searchBtnContainer").style.display = 'block';
}

function showResults() {
    document.getElementById("resultTable").style.display = 'block'; // Muestra la tabla de resultados
}
