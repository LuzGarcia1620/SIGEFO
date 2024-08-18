document.addEventListener('DOMContentLoaded', function () {
    const agregarUserBtn = document.getElementById('agregarUserBtn');
    const agregarUsuarioForm = document.getElementById("userForm");
    const deleteUsuarioForm = document.getElementById("deleteUserForm");
    const updateUsuarioForm = document.getElementById("editarUsuarioForm");
    const changeUsuarioForm = document.getElementById("changeUserForm")
    const editarUserBtns = document.getElementsByClassName('buttonUpdate');
    const borrarUserBtns = document.getElementsByClassName('buttonErase');
    const changeUserBtns = document.getElementsByClassName('buttonDisable')

    // Buscar usuarios
    document.getElementById('buscarInput').addEventListener('input', function () {
        var searchTerm = this.value.toLowerCase();
        var cards = document.querySelectorAll('.card');
        cards.forEach(function (card) {
            var cardText = card.textContent.toLowerCase();
            card.style.display = cardText.includes(searchTerm) ? '' : 'none';
        });
    });

    // Mostrar el modal para agregar usuario
    agregarUserBtn.addEventListener('click', function () {
        $('#agregarUsuariosModal').modal('show');
    });

    //Metodo con AJAX para mostrar las alertas indicando el estado del registro del Usuario
    $('#userForm').on('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(agregarUsuarioForm);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Usuario agregado exitosamente.', 'success');
                    $('#agregarUsuariosModal').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }, 2000)

                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    });

    /*
    * Funcionalidad para que cada boton de 'editar' muestre el modal para editar el Usuario,
    * y que en ese modal aparesca la información del usuario
    */
    Array.from(editarUserBtns).forEach((btn) => {
        btn.addEventListener('click', function () {

            const card = this.closest('.card');
            const idUsuario = card.getAttribute('data-id');
            const nombreCompleto = card.querySelector('.card-title').textContent.trim().split(' ');
            const nombre = nombreCompleto[0];
            const apellidoPaterno = nombreCompleto[1];
            const apellidoMaterno = nombreCompleto[2];
            const usuario = card.querySelector('.card-text').textContent.split(': ')[1];
            const correo = card.querySelectorAll('.card-text')[1].textContent.split(': ')[1];

            document.getElementById('idUsuarioU').value = idUsuario;
            document.getElementById('nombreEditar').value = nombre;
            document.getElementById('apellidoPaternoEditar').value = apellidoPaterno;
            document.getElementById('apellidoMaternoEditar').value = apellidoMaterno;
            document.getElementById('usuarioEditar').value = usuario;
            document.getElementById('correoEditar').value = correo;

            $('#editarUsuario').modal('show');
        });
    });

    //Metodo que muestra una alerta de confirmación cuando se registra un Usuario
    $('#btnUpdate').on('click', (e) => {

        Swal.fire({
            title: 'Confirmación Actualización',
            text: "¿Esta seguro de actualizar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, actualizar'
        }).then((result) => {
            if (result.isConfirmed)
                actualizarUsuario()
        });
    });

    //Metodo con AJAX para mostrar las alertas indicando el estado de la actualación del Usuario
    const actualizarUsuario = () => {
        const formData = new FormData(updateUsuarioForm);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Usuario actualizado exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    }

    /*
    * Funcionalidad para que cada boton de 'eliminar' muestre una alerta de confirmación para borrar el Usuario,
    * y cargue el id del Usuario
    */
    Array.from(borrarUserBtns).forEach((btn) => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const card = this.closest('.card');
            const idUsuario = card.getAttribute('data-id');

            document.getElementById('idUsuarioE').value = idUsuario;

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed)
                    eliminarUsuario();
            });
        });
    })

    //Metodo con AJAX para mostrar las alerta indicando el estado de la eliminación del Usuario
    const eliminarUsuario = () => {
        const formData = new FormData(deleteUsuarioForm);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Usuario eliminado exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    }

    Array.from(changeUserBtns).forEach((btn) => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const card = this.closest('.card');
            const idUsuario = card.getAttribute('data-id');
            document.getElementById('idUsuarioC').value = idUsuario;
            const status = card.getAttribute('data-status');
            console.log(status)
            if (status === "1") {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Se deshabilitará este usuario",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, deshabilitar'
                }).then((result) => {
                    if (result.isConfirmed)
                        changeStatusUsuario();
                });
            } else {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Se habilitará este usuario",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, habilitar'
                }).then((result) => {
                    if (result.isConfirmed)
                        changeStatusUsuario();
                });
            }
        });
    })

    const changeStatusUsuario = () => {
        const formData = new FormData(changeUsuarioForm);

        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response, status, xhr) {
                if (xhr.status === 200) {
                    Swal.fire('Éxito', 'Se cambio el status exitosamente.', 'success');
                    location.reload();
                } else {
                    Swal.fire('Error', 'Ocurrió un error en la solicitud.', 'error');
                }
            },
            error: function (xhr, status, error) {
                Swal.fire('Error', 'Error en la solicitud.', 'error');
            }
        });
    }

});

function cerrarModalAgregarUsuario() {
    $('#agregarUsuariosModal').modal('hide');
}

// Función para cerrar el modal de editar usuario
function cerrarModalEditarUsuario() {
    $('#editarUsuario').modal('hide');
}