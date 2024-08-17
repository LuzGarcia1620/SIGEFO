document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const mappings = {
        'anio': 'inputYear',
        'instructor': 'inputIns',
        'unidad': 'inputUnit',
        'docente': 'inputDoc',
        'act': 'inputGen'
    };

    Object.entries(mappings).forEach(([param, id]) => {
        if (urlParams.has(param)) {
            setTimeout(() => document.getElementById(id).click(), 100);
        }
    });
});

/*document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const anio = urlParams.get('anio');
    const instructor = urlParams.get('instructor');
    const unidad = urlParams.get('unidad');
    const docente = urlParams.get('docente');
    const genero = urlParams.get('act');

    if (anio) {
        setTimeout(() => {
            document.getElementById('inputYear').click()
        }, 100);
    }

    if (instructor) {
        setTimeout(() => {
            document.getElementById('inputIns').click()
        }, 100);
    }

    if (unidad) {
        setTimeout(() => {
            document.getElementById('inputUnit').click()
        }, 100);
    }

    if (docente) {
        setTimeout(() => {
            document.getElementById('inputDoc').click()
        }, 100);
    }

    if (genero) {
        setTimeout(() => {
            document.getElementById('inputGen').click()
        }, 100);
    }
});*/

const showSelect = (visibleId, tableVisibleId) => {
     const selectIds = ['selectYear', 'selectInstructor', 'selectUnit', 'selectTeacher', 'selectGender'];
     const tableIds = ['resultTableYear', 'resultTableInstructor', 'resultTableUnit', 'resultTableDocente', 'resultTableGender'];
     selectIds.forEach(id => {
         document.getElementById(id).style.display = (id === visibleId) ? 'block' : 'none';
     });

     tableIds.forEach(id => {
         document.getElementById(id).style.display = (id === tableVisibleId) ? 'block' : 'none';
     });
 }
