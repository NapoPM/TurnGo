<?php

    include_once __DIR__ . '/../templates/alertas.php';
?>
<div class="card container mt-5 col-md-8 justify-content-center  card">
        <div class="card-header text-center">
            <h3>Registrarse</h3>
        </div>
        <div class="card-body">
                <div id="formularioRegistro">
                    <!-- Aca va el formulario -->
        <form action="/crear-cuenta" method="POST">
        <div id="formularioRegistro">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombreEmpresa">Nombre Empresa</label>
                        <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" value="<?php s($usuario->nombreEmpresa) ?>" placeholder="Ingresar Nombre">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php s($usuario->nombre) ?>" placeholder="Ingresar Nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php s($usuario->apellido) ?>" placeholder="Ingresar Apellido">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php s($usuario->telefono) ?>" placeholder="15446559">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php s($usuario->email) ?>" placeholder="ejemplo@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="codigoPostal">Código Postal</label>
                        <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" value="<?php s($usuario->codigoPostal) ?>" placeholder="Ingresar Codigo Portal">
                    </div>
                    <div class="form-group">
                        <label for="dniResponsable">DNI Responsable</label>
                        <input type="text" class="form-control" id="dniResponsable" name="dniResponsable" value="<?php s($usuario->dniResponsable) ?>" placeholder="Ingresar DNI">
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
                </div>
        </div>
    </div>