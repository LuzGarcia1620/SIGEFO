document.addEventListener('DOMContentLoaded', function() {
    const agregarUserBtn = document.getElementById('agregarUserBtn');
    const agregarUsuarioForm = document.getElementById('agregarUsuarioForm');
    const editarUsuarioForm = document.getElementById('editarUsuarioForm');
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

    // Envío del formulario para agregar usuario
    agregarUsuarioForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(agregarUsuarioForm);
        formData.append('accion', 'agregar');

        fetch('', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Éxito', 'Usuario agregado exitosamente.', 'success');
                    $('#agregarUsuariosModal').modal('hide');
                    actualizarListaUsuarios();
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            });
    });

    function editarUsuario(idUsuario) {
        fetch(`?idUsuario=${idUsuario}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('idUsuarioEditar').value = data.idUsuario;
                document.getElementById('nombreEditar').value = data.nombre;
                document.getElementById('apellidoPaternoEditar').value = data.paterno;
                document.getElementById('apellidoMaternoEditar').value = data.materno;
                document.getElementById('usuarioEditar').value = data.usuario;
                document.getElementById('correoEditar').value = data.correo;
                document.getElementById('rolEditar').value = data.idRol;
                $('#editarUsuariosModal').modal('show');
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'No se pudo obtener los datos del usuario.', 'error');
            });
    }

    function eliminarUsuario(idUsuario) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('', {
                        method: 'POST',
                        body: new URLSearchParams({
                            'accion': 'eliminar',
                            'idUsuario': idUsuario
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Eliminado', 'El usuario ha sido eliminado.',
                                'success');
                            actualizarListaUsuarios();
                        } else {
                            Swal.fire('Error', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error', 'Error en la solicitud.', 'error');
                    });
            }
        });
    }

    function actualizarListaUsuarios() {
        fetch('')
            .then(response => response.json())
            .then(data => {
                cardContainer.innerHTML = '';
                data.forEach(usuario => {
                    const card = document.createElement('div');
                    card.className = 'card';
                    card.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${usuario.nombre} ${usuario.paterno} ${usuario.materno}</h5>
                    <p class="card-text">Usuario: ${usuario.usuario}</p>
                    <p class="card-text">Correo: ${usuario.correo}</p>
                    <button onclick="editarUsuario(${usuario.idUsuario})" class="btn btn-primary">Editar</button>
                    <button onclick="eliminarUsuario(${usuario.idUsuario})" class="btn btn-danger">Eliminar</button>
                </div>
            `;
                    cardContainer.appendChild(card);
                });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'No se pudo obtener la lista de usuarios.', 'error');
            });
    }

    actualizarListaUsuarios();
});