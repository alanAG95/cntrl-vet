
<link href='css/main.css' rel='stylesheet' />
<script src='js/main.js'></script>
<script src='js/es.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
    });
</script>
<div class="container">
    <div class="row">
        <div class="page-header"><h2></h2></div>
        <div class="pull-left form-inline"><br>
            <div class="btn-group">
                <button class="btn" data-calendar-nav="today">Citas</button>
            </div>
            <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="day">Visitas</button>
            </div>

        </div>
        <div class="pull-right form-inline"><br>
            <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
        </div>
    </div><hr>
    <div class="row">
        <div id="calendario"></div> <!-- Aqui se mostrara nuestro calendario -->
            <br><br>
    </div>
</div>