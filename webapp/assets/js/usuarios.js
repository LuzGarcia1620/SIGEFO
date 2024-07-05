document.addEventListener('DOMContentLoaded', function() {
    const agregarUserBtn = document.getElementById('agregarUserBtn');
    const buscarInput = document.getElementById('buscarInput');
    const cardContainer = document.querySelector('.card-container');
    const agregarUsuarioForm = document.getElementById("userForm")

    // Buscar usuarios
    document.getElementById('buscarInput').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var cards = document.querySelectorAll('.card');
        cards.forEach(function(card) {
            var cardText = card.textContent.toLowerCase();
            card.style.display = cardText.includes(searchTerm) ? '' : 'none';
        });
    });

    // Mostrar el modal para agregar usuario
    agregarUserBtn.addEventListener('click', function() {
        $('#agregarUsuariosModal').modal('show');
    });

    // Mostrar alertas cuando se guarda un Usuario
    $('#userForm').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(agregarUsuarioForm);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Usuario agregado exitosamente.', 'success');
                    $('#agregarUsuariosModal').modal('hide');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    });



    window.eliminarUsuario = function(idUsuario) {
        console.log('Intentando eliminar usuario con ID:', idUsuario); // <-- Añadir
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('../../../src/controller/user/UserController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        'action': 'delete',
                        'idUsuario': idUsuario
                    })
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Respuesta del servidor:', data); // <-- Añadir
                    if (data === 'success') {
                        Swal.fire('Eliminado', 'El usuario ha sido eliminado.', 'success');
                        actualizarListaUsuarios();
                    } else {
                        Swal.fire('Error', 'No se pudo eliminar el usuario.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Error en la solicitud.', 'error');
                });
            }
        });
    };
    

    function editarUsuario(idUsuario) {
        fetch(`?idUsuario=${idUsuario}`)
            .then(response => response.json())
            .then(data => {
                if (data && data.idUsuario) {
                    document.getElementById('idUsuarioEditar').value = data.idUsuario;
                    document.getElementById('nombreEditar').value = data.nombre;
                    document.getElementById('apellidoPaternoEditar').value = data.paterno;
                    document.getElementById('apellidoMaternoEditar').value = data.materno;
                    document.getElementById('usuarioEditar').value = data.usuario;
                    document.getElementById('correoEditar').value = data.correo;
                    document.getElementById('rolEditar').value = data.idRol;
                    $('#editarUsuario').modal('show'); // Corrige el id del modal
                } else {
                    Swal.fire('Error', 'No se pudo obtener los datos del usuario.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'No se pudo obtener los datos del usuario.', 'error');
            });
    }
});