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

document.getElementById('presencial').addEventListener('input', calcularDuracionTotal);
document.getElementById('enLinea').addEventListener('input', calcularDuracionTotal);
document.getElementById('independiente').addEventListener('input', calcularDuracionTotal);

// Manejo de la navegación entre secciones del formulario
let currentStep = 0;
const formSections = document.querySelectorAll('.form-section');
const sectionTitles = [
    'Datos Generales',
    'Características de la Actividad Formativa',
    'Modalidad',
    'Requerimientos para el Desarrollo de la Actividad'
];

function showStep(step) {
    formSections.forEach((section, index) => {
        section.style.display = index === step ? 'block' : 'none';
    });
    document.getElementById('section-title').textContent = sectionTitles[step];
}

function nextStep() {
    if (currentStep < formSections.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
}

// Inicializar el formulario mostrando la primera sección
showStep(currentStep);

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

fetch("../../templates/header.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("headerContainer").innerHTML = data;
    });

document.addEventListener('DOMContentLoaded', function () {
    const formInstructor = document.getElementById('formInstructor');

    $('#formInstructor').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(formInstructor);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Formulario agregado exitosamente.', 'success');
                    /*$('#agregarUsuariosModal').modal('hide');
                    location.reload();*/
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