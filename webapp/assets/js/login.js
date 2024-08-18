function togglePassword(id, element) {
    const input = document.getElementById(id);
    const eyeIcon = element.querySelector("img");

    if (input.type === "password") {
        input.type = "text";
        eyeIcon.src = "/SIGEFO/webapp/assets/img/invisible.png";
    } else {
        input.type = "password";
        eyeIcon.src = "/SIGEFO/webapp/assets/img/visibilidad.png";
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');

    $('#loginForm').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(loginForm);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire({
                        title: 'Éxito',
                        text: 'Inicio de Sesion Exitoso',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    setTimeout(() => {
                        window.location.href = "/SIGEFO/perfil"
                    }, 2000);
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error en la solicitud.',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: 'Error',
                    text: 'Error en la solicitud.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        })
    })
})