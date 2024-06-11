<center>
   <!-- Contenido principal -->
    <div class="main-content">
        <h2><?php echo $titulo ?? '' ?></h2>

        <form id="servicio-form">
            <div class="form-group">
                <label for="nombre">Nombre del Servicio:</label>
                <input type="text" class="form-control" id="nombreServicio" required>
            </div>
            <div class="form-group">
                <label for="imagen">Agregue Imagen</label>
                <input type="file" class="form-control" id="imagenServicio">
            </div>
            <div class="form-group">
                <label for="categoria">Categoría del Servicio:</label>
                <select class="form-control" id="categoria" required>
                    <option value="">Seleccionar categoría</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Estética">Estética</option>
                    <option value="Salud">Salud</option>
                    <!-- Agregar más opciones según sea necesario -->
                </select>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción del Servicio:</label>
                <textarea class="form-control" id="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio del Servicio:</label>
                <input type="number" class="form-control" id="precio" required>
            </div>
            <button type="button" class="btn btn-primary" id="agregarServicio">Agregar Servicio</button>
            <button type="button" class="btn btn-secondary" id="cancelar-btn">Cancelar</button>
        </form>

        <!-- Inicio de la sección de servicios agregados -->
        <div>
            <h2>Servicios Agregados</h2>
            <div id="listaServicio" class="card-columns">
                <!-- Aquí se agregarán las cards dinámicamente -->
            </div>
        </div>
        <!-- Fin de la sección de servicio agregados -->
    </div>





    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            // Array para almacenar los servicios
            var servicios = [];

            // Función para habilitar o deshabilitar un servicio
            function habilitarDeshabilitar(servicioIndex) {
                servicios.splice(servicioIndex, 1);  // Eliminar el servicio de la lista
                actualizarLista();
            }

            // Función para actualizar la lista de servicios
            function actualizarLista() {
                var listaServicio = $("#listaServicio");
                listaServicio.empty();

                for (var i = 0; i < servicios.length; i++) {
                    var servicio = servicios[i];
                    var card = `
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">${servicio.nombre}</h4>
                            <img src="#" class="card-img-top" alt="...">
                            <h6 class="card-subtitle mb-2 text-muted"><strong>Categoria: </strong>${servicio.categoria}</h6>
                            <p class="card-text"><strong>Descripción: </strong>${servicio.descripcion}</p>
                            <p class="card-text"><strong>Precio:</strong> $${servicio.precio}</p>
                            <button class="btn btn-danger" onclick="habilitarDeshabilitar(${i})">Deshabilitar</button>
                            <button class="btn btn-danger" onclick="habilitarDeshabilitar(${i})">Editar</button>
                        </div>
                    </div>`;

                    listaServicio.append(card);
                }
            }

            // Manejar el evento de agregar servicio
            $("#agregarServicio").click(function () {
                var nombreServicio = $("#nombreServicio").val();
                var categoria = $("#categoria").val();
                var descripcion = $("#descripcion").val();
                var precio = $("#precio").val();

                if (nombreServicio && categoria && descripcion && precio) {
                    var servicio = {
                        nombre: nombreServicio,
                        categoria: categoria,
                        descripcion: descripcion,
                        precio: precio,
                        habilitado: true
                    };

                    servicios.push(servicio);

                    // Limpiar los campos del formulario
                    $("#nombreServicio").val("");
                    $("#categoria").val("");
                    $("#descripcion").val("");
                    $("#precio").val("");

                    // Actualizar la lista de servicio
                    actualizarLista();
                }
            });

            // Manejar el evento de cancelar
            $("#cancelar-btn").click(function () {
                // Limpiar los campos del formulario
                $("#nombreServicio").val("");
                $("#categoria").val("");
                $("#descripcion").val("");
                $("#precio").val("");
            });
        });
    </script>
</center>
