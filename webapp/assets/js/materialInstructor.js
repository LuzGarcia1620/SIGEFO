document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    
    fetch('upload.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(data => {
        alert(data);
        updateFileList();
    }).catch(error => console.error('Error:', error));
});

function updateFileList() {
    fetch('get_files.php')
        .then(response => response.json())
        .then(data => {
            var select = document.getElementById('uploadedFiles');
            select.innerHTML = '<option value="">Seleccione un archivo</option>';
            data.forEach(file => {
                var option = document.createElement('option');
                option.value = file.path;
                option.textContent = file.name;
                select.appendChild(option);
            });
        });
}
