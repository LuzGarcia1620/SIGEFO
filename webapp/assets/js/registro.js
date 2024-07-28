document.addEventListener('DOMContentLoaded', function () {
    const formEmail = document.getElementById('email-form');
    const formRegisterModal = document.getElementById('');

    $('#email-form').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(formEmail);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire({
                        title: 'OjoDocente',
                        text: "Ud ya esta registrado",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        //cancelButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed)
                            nextStep();
                    });
                    //location.reload();
                } /*else {
                    Swal.fire({
                        title: 'No se encontraron sus datos',
                        text: "¿Desea Registrarse?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, Deseo Registrarme'
                    }).then((result) => {
                        if (result.isConfirmed)
                            nextStep();
                    });
                }*/
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: 'No se encontraron sus datos',
                    text: "¿Desea Registrarse?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Deseo Registrarme'
                }).then((result) => {
                    if (result.isConfirmed)
                        nextStep();
                });
            }
        })
    })
})

function openModal(modalId) {
    modalId.style.display = 'block';
}

let currentStep = 0;
const formSections = document.querySelectorAll('.form-section');
const sectionTitles = [
];

function showStep(step) {
    formSections.forEach((section, index) => {
        section.style.display = index === step ? 'block' : 'none';
    });
    //document.getElementById('section-title').textContent = sectionTitles[step];
}

function nextStep() {
    if (currentStep < formSections.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
}