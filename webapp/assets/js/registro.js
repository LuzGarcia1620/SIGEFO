fetch("../../templates/header.html")
  .then((response) => response.text())
  .then((data) => {
    document.getElementById("headerContainer").innerHTML = data;
  });
fetch("../../templates/footer.html")
  .then((response) => response.text())
  .then((data) => {
    document.getElementById("footerContainer").innerHTML = data;
  });

  document.getElementById('email-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const email = document.getElementById('email').value;
    
    // Llamada AJAX a PHP para verificar el correo en la base de datos
    fetch('/src/controller/checkEmail.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ email: email }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            // Si el correo existe, continuar con el registro
            document.getElementById('registration-form').style.display = 'block';
        } else {
            // Si el correo no existe, mostrar el SweetAlert
            Swal.fire({
                title: 'No se encontraron sus datos',
                text: '¿Desea registrarse?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Registrarse',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mostrar el formulario de registro
                    document.getElementById('registration-form').style.display = 'block';
                } else {
                    // Redirigir a la pantalla anterior
                    window.location.href = 'info.php';
                }
            });
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});