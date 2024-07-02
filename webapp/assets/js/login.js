fetch('./templates/header.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('headerContainer').innerHTML = data;
            });
        fetch('./templates/footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footerContainer').innerHTML = data;
            });

            function mostrarPassword() {
                const passwordInput = document.getElementById('password');
                const passwordIcon = document.getElementById('password_icon');
                const isPasswordVisible = passwordInput.type === 'password';
    
                passwordInput.type = isPasswordVisible ? 'text' : 'password';
                passwordIcon.src = isPasswordVisible ? './Assets/img/invisible.png' : './Assets/img/visibilidad.png';
            }
    
            // Evitar la alerta en la carga de la página
            document.addEventListener('DOMContentLoaded', () => {
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('error') === '1') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Usuario o contraseña incorrectos.',
                    });
                }
            });
    
            // Enviar el formulario usando JavaScript
            document.getElementById('loginForm').addEventListener('submit', (event) => {
                event.preventDefault();
    
                const form = event.target;
                const formData = new FormData(form);
                const request = new XMLHttpRequest();
    
                request.open('POST', form.action, true);
                request.onload = function () {
                    if (request.status === 200) {
                        const responseURL = request.responseURL;
                        const urlParams = new URLSearchParams(responseURL.split('?')[1]);
                        if (urlParams.get('error') === '1') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Usuario o contraseña incorrectos.',
                            });
                        } else {
                            window.location.href = 'perfil.php';
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al procesar la solicitud.',
                        });
                    }
                };
                request.send(formData);
            });