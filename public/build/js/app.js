/*eslint-disable*/


/*
// Función para seleccionar tipo de formulario
function updateForm() {
    const registroTipo = document.getElementById('registroTipo').value;
    const formulario = document.getElementById('formularioRegistro');

    let formularioHTML = '';

    if (registroTipo === 'empresa') {
        formularioHTML = `
        <center>
        <form action="/crear-cuenta" method="POST">
        <div id="formularioRegistro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombreEmpresa">Nombre Empresa</label>
                        <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="Ingresar Nombre">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresar Apellido">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="15446559">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Código Postal</label>
                        <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Ingresar Codigo Portal">
                    </div>
                    <div class="form-group">
                        <label for="dniResponsable">DNI Responsable</label>
                        <input type="text" class="form-control" id="dniResponsable" name="dniResponsable" placeholder="Ingresar DNI">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresar Contraseña">
            </div>
        </div>
        <input type="submit" value="Registrarse" class="class="btn btn-primary btn-block"">
        </form>
        </center>
        `;
    } else {
        formularioHTML = `
        <form action="procedureRegistro.php" method="POST">
        <div id="formularioRegistro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresar Apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresar DNI" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar Telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="contraseña" placeholder="Ingresar Contraseña" required>
                    </div>
                </div>
            </div>
            </div>
            <input type="submit" value="Registrarse" class="class="btn btn-primary btn-block"">
        </form>
        `;
    }

    formulario.innerHTML = formularioHTML;
}
*/