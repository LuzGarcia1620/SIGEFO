document.querySelector(".seleccionado").addEventListener("click", function () {
  this.nextElementSibling.classList.toggle("mostrar");
});

document.querySelectorAll(".opciones div").forEach((item) => {
  item.addEventListener("click", function () {
    document.querySelector(".seleccionado").textContent = this.textContent;
    document.querySelector(".opciones").classList.remove("mostrar");
  });
});

document
  .getElementById("standard-select")
  .addEventListener("change", function () {
    const value = this.value;
    const content = document.getElementById("content");

    if (value === "subir") {
      content.innerHTML = `
                        <div class="card mx-auto extra-margin-top" style="max-width: 500px;">
                            <div class="card-header bg-white text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" viewBox="0 0 512 419.116">
                                    <defs>
                                        <clipPath id="clip-folder-new">
                                            <rect width="512" height="419.116"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="folder-new" clip-path="url(#clip-folder-new)">
                                        <path id="Union_1" data-name="Union 1" d="M16.991,419.116A16.989,16.989,0,0,1,0,402.125V16.991A16.989,16.989,0,0,1,16.991,0H146.124a17,17,0,0,1,10.342,3.513L227.217,57.77H437.805A16.989,16.989,0,0,1,454.8,74.761v53.244h40.213A16.992,16.992,0,0,1,511.6,148.657L454.966,405.222a17,17,0,0,1-16.6,13.332H410.053v.562ZM63.06,384.573H424.722L473.86,161.988H112.2Z" fill="var(--c-action-primary)" stroke="" stroke-width="1"></path>
                                    </g>
                                </svg>
                                <h5 class="card-title mt-2">Subir Lista</h5>
                            </div>
                            <div class="card-body text-center">
                                <button class="upload-area btn btn-outline-secondary w-100 py-5">
                                    <span class="upload-area-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 340.531 419.116">
                                            <g id="files-new" clip-path="url(#clip-files-new)">
                                                <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="var(--c-action-primary)"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="upload-area-title d-block mt-3">Arrastre los archivos a subir</span>
                                    <span class="upload-area-description d-block">Puede subir sus archivos dando<br /><strong>Click aquí</strong></span>
                                </button>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-success">Subir</button>
                            </div>
                        </div>
                    `;
    } else if (value === "ver") {
      content.innerHTML = `
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Correo Electrónico</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Unidad Académica</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí puedes agregar filas de ejemplo o dejar que se carguen dinámicamente -->
                            </tbody>
                        </table>
                    `;
    } else {
      content.innerHTML = "";
    }
  });
