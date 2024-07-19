fetch('/SIGEFO/webapp/templates/header.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('headerContainer').innerHTML = data;
    });
fetch('/SIGEFO/webapp/templates/footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('footerContainer').innerHTML = data;
    });

function mostrarPassword() {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('password_icon');
    const isPasswordVisible = passwordInput.type === 'password';

    passwordInput.type = isPasswordVisible ? 'text' : 'password';
    passwordIcon.src = isPasswordVisible ? '/SIGEFO/webapp/assets/img/invisible.png' : '/SIGEFO/webapp/assets/img/visibilidad.png';
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
                    Swal.fire('Éxito', 'Inicio de Sesion Exitoso', 'success');
                    setTimeout(() => {
                        window.location.href = "/SIGEFO/perfil"
                    }, 2000)
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        })
    })
})