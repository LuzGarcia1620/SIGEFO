document.addEventListener('DOMContentLoaded', function() {
    const agregarUserBtn = document.getElementById('agregarUserBtn');
    const buscarInput = document.getElementById('buscarInput');
    const cardContainer = document.querySelector('.card-container');

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

    function actualizarListaUsuarios() {
        fetch('')
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    cardContainer.innerHTML = '';
                    data.forEach(usuario => {
                        const card = document.createElement('div');
                        card.className = 'card my-2';
                        card.style.width = '18rem';
                        card.innerHTML = `
                            <div class="card-body">
                                <h5 class="card-title">${usuario.nombre} ${usuario.paterno} ${usuario.materno}</h5>
                                <p class="card-text">Usuario: ${usuario.usuario}</p>
                                <p class="card-text">Correo: ${usuario.correo}</p>
                                <p class="card-text">Rol: ${usuario.rol}</p>
                                <div class="button-container">
                                    <button class="button edit-btn" onclick="editarUsuario(${usuario.idUsuario})">Editar</button>
                                    <button class="button deactivate-btn">Desactivar</button>
                                    <button class="button delete-btn" onclick="eliminarUsuario(${usuario.idUsuario})">Eliminar</button>
                                </div>
                            </div>
                        `;
                        cardContainer.appendChild(card);
                    });
                } else {
                    Swal.fire('Error', 'No se pudo obtener la lista de usuarios.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'No se pudo obtener la lista de usuarios.', 'error');
            });
    }

    function sendFormData(event) {
    event.preventDefault();

    var formData = new FormData(document.getElementById('userForm'));

    fetch('../../../src/controller/user/UserController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        console.log(result); // Verifica el resultado aquí
        if (result.trim() === 'success') {
            Swal.fire('Success', 'User saved successfully!', 'success');
            // Recarga la página o actualiza la lista de usuarios
        } else {
            Swal.fire('Error', 'Failed to save user.', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'An error occurred.', 'error');
    });
}

    
});