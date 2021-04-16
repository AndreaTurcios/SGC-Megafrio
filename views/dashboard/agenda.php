<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>



<div id="container">
    <div class="box">
        <div id="header">
            <div id="monthDisplay"></div>
            <div>
                <button id="backButton">Atrás</button>
                <button id="nextButton">Siguiente</button>
            </div>
        </div>

        <div id="weekdays">
            <div>Domingo</div>
            <div>Lunes</div>
            <div>Martes</div>
            <div>Miércoles</div>
            <div>Jueves</div>
            <div>Viernes</div>
            <div>Sábado</div>
        </div>

        <div id="calendar"></div>
    </div>

    <div id="newEventModal">
        <h2>Nuevo evento</h2>

        <input id="eventTitleInput" placeholder="Tarea" />

        <select id="est-select">
            <option disabled selected>Seleccionar un estado</option>
            <option value="1">En proceso</option>
            <option value="2">Finalizada</option>
        </select>

        <select id="cli-select">
            <option disabled selected>Seleccionar un cliente</option>
            <option value="1">Zachery C. Horton</option>
            <option value="2">Naomi J. Fitzpatrick</option>
            <option value="3">Mariko Z. Casey</option>
            <option value="4">Timon K. Macias</option>
        </select>

        <select id="emp-select">
            <option disabled selected>Seleccionar un empleado</option>
            <option value="1">Gregory H. Maxwell</option>
            <option value="2">Ramona I. Woodk</option>
            <option value="3">Teagan I. Grimes</option>
            <option value="4">Duncan X. Fitzgerald</option>
            <option value="5">Deborah S. Pearson</option>
        </select>

        <select id="ser-select">
            <option disabled selected>Seleccionar un tipo de servicio</option>
            <option value="1">Mantenimiento</option>
            <option value="2">Instalacion</option>
            <option value="3">Revision</option>
            <option value="4">Verificacion de zonas</option>
            <option value="5">Atencion al cliente</option>
        </select>

        <form name="formulario" method="post" action="/send.php">
            <!-- Campo de entrada de fecha -->
            Selecciona la fecha de programación:
            <input type="date" name="fecha" min="2000-01-01" max="2023-12-31" step="2" />
            <br>
            <!-- Campo de entrada de hora -->
            Selecciona la hora de programación:
            <input type="time" name="hora" min="18:00" max="21:00" step="3600" />

            <!-- Campo de entrada de fecha provisional-->
            Selecciona la fecha provisional:
            <input type="date" name="fecha-pro" min="2000-01-01" max="2023-12-31" step="2" />
            <br>
            <!-- Campo de entrada de provisional -->
            Selecciona la hora provisional:
            <input type="time" name="hora-pro" min="18:00" max="21:00" step="3600" />
        </form>

        <br>

        <button id="saveButton">Guardar</button>
        <button id="cancelButton">Cancelar</button>
    </div>

    <div id="deleteEventModal">
        <h2>Tarea</h2>

        <p id="eventText"></p>

        <button id="editButton">Modificar</button>
        <button id="deleteButton">Borrar</button>
        <button id="closeButton">Cerrar</button>
    </div>
</div>

<div id="modalBackDrop"></div>



<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>