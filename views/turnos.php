<center>
<style>
    .form-check-inline {
        display: inline-block;
        margin-right: 10px; /* Espacio entre las casillas */
        padding-bottom: 50px;
    }
</style>
         <div class="d-flex">
        <div class="main-content">
            <h1><?php echo $titulo ?? '' ?></h1>
            <h1>Gestión de Turnos</h1>
            <form id="turnosForm">
                <!-- Combo Box de Prestación -->
                <div class="mb-3">
                    <label for="prestacion" class="form-label">Prestación</label>
                    <select class="form-select" id="prestacion">
                        <option selected>Seleccionar...</option>
                        <option value="1">Corte de Cabello</option>
                        <option value="2">Coloración</option>
                        <option value="3">Manicura</option>
                    </select>
                </div>
                <!-- Radio Buttons de Días -->
                <br>
            <div class="mb-3">
                <label class="form-label">Días</label>
                <br>
                <br>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="lunes" value="Lunes">
                        <label class="form-check-label" for="lunes">Lunes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="martes" value="Martes">
                        <label class="form-check-label" for="martes">Martes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="miercoles" value="Miércoles">
                        <label class="form-check-label" for="miercoles">Miércoles</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="jueves" value="Jueves">
                        <label class="form-check-label" for="jueves">Jueves</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="viernes" value="Viernes">
                        <label class="form-check-label" for="viernes">Viernes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="sabado" value="Sábado">
                        <label class="form-check-label" for="sabado">Sábado</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="dias" id="domingo" value="Domingo">
                        <label class="form-check-label" for="domingo">Domingo</label>
                    </div>
                </div>   
            </div>

                <!-- Inputs de Horas -->
                <div class="mb-3">
                    <label for="horaInicio1" class="form-label">Hora de inicio - 1ra Jornada</label>
                    <input type="time" id="horaInicio1" class="form-control">
                </div>
                <br>
                <div class="mb-3">
                    <label for="horaFin1" class="form-label">Hora de fin - 1ra Jornada</label>
                    <input type="time" id="horaFin1" class="form-control">
                </div>
                <br>
                <!-- Opción para múltiples jornadas -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="multipleJornadas">
                    <label class="form-check-label" for="multipleJornadas">¿Múltiples Jornadas?</label>
                </div>
                <!-- Contenedor de segunda jornada -->
                <br>
                <br>
                <div id="segundaJornada" style="display: none;">
                    <div class="mb-3">
                        <label for="horaInicio2" class="form-label">Hora de inicio - 2da Jornada</label>
                        <input type="time" id="horaInicio2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="horaFin2" class="form-label">Hora de fin - 2da Jornada</label>
                        <input type="time" id="horaFin2" class="form-control">
                    </div>
                </div>
                <!--Frecuencia-->
                <br>
                <br>
                <div class="form-group">
                    <label for="frecuencia">Frecuencia (minutos):</label>
                    <input type="number" class="form-control" id="frecuencia" required>
                </div>
                <!-- Tabla de Turnos -->
                <div class="mb-3">
                    <table class="table" id="tablaTurnos">
                        <thead>
                            <tr>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miércoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sábado</th>
                                <th>Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Horarios se generarán aquí -->
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" onclick="generarTabla()">Guardar</button>
            </form>
        </div>
    
        <script>
            document.getElementById('multipleJornadas').addEventListener('change', function() {
                document.getElementById('segundaJornada').style.display = this.checked ? 'block' : 'none';
            });
    
            function generarTabla() {
                const horaInicio1 = document.getElementById('horaInicio1').value;
                const horaFin1 = document.getElementById('horaFin1').value;
                const multipleJornadas = document.getElementById('multipleJornadas').checked;
                const horaInicio2 = multipleJornadas ? document.getElementById('horaInicio2').value : null;
                const horaFin2 = multipleJornadas ? document.getElementById('horaFin2').value : null;
                const frecuencia = parseInt(document.getElementById('frecuencia').value);
                const tabla = document.getElementById('tablaTurnos').querySelector('tbody');
    
                if (!horaInicio1 || !horaFin1 || isNaN(frecuencia) || (multipleJornadas && (!horaInicio2 || !horaFin2))) {
                    alert('Por favor, completa todos los campos.');
                    return;
                }
    
                tabla.innerHTML = ''; // Limpiar la tabla
    
                function generarHorarios(horaInicio, horaFin) {
                    const [inicioHoras, inicioMinutos] = horaInicio.split(':').map(Number);
                    const [finHoras, finMinutos] = horaFin.split(':').map(Number);
                    let currentHours = inicioHoras;
                    let currentMinutes = inicioMinutos;
                    const horarios = [];
    
                    while (currentHours < finHoras || (currentHours === finHoras && currentMinutes < finMinutos)) {
                        horarios.push(`${String(currentHours).padStart(2, '0')}:${String(currentMinutes).padStart(2, '0')}`);
                        currentMinutes += frecuencia;
                        if (currentMinutes >= 60) {
                            currentMinutes -= 60;
                            currentHours++;
                        }
                    }
    
                    return horarios;
                }
    
                const horarios1 = generarHorarios(horaInicio1, horaFin1);
                const horarios2 = multipleJornadas ? generarHorarios(horaInicio2, horaFin2) : [];
                const horarios = horarios1.concat(horarios2);
    
                horarios.forEach(horario => {
                    const row = document.createElement('tr');
                    for (let i = 0; i < 7; i++) {
                        const cell = document.createElement('td');
                        cell.innerText = horario;
                        row.appendChild(cell);
                    }
                    tabla.appendChild(row);
                });
            }
        </script>
</div>
<script src="js/turnos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</center>

</html>
