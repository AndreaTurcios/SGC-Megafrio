<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../resources/css/agenda/agenda.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de SGC MEGAFRIO</title>
</head>
<body>
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

            <input id="eventTitleInput" placeholder="Titulo de evento" />

            <button id="saveButton">Guardar</button>
            <button id="cancelButton">Cancelar</button>
        </div>

        <div id="deleteEventModal">
            <h2>Evento</h2>

            <p id="eventText"></p>

            <button id="deleteButton">Borrar</button>
            <button id="closeButton">Cerrar</button>
        </div>
    </div>

    <div id="modalBackDrop"></div>

    <script src="../../resources/js/agenda_script.js"></script>
</body>
</html>