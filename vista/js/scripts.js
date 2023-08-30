$("#mistareas").on('click', function () {
    if ($('.mistareas').is(":visible")) {
        $('.mistareas').hide();
        $('.todas_tareas').show();
        $(this).text("Mis Tareas");
    } else {
        $('.mistareas').show();
        $('.todas_tareas').hide();
        $(this).text("Todas Las Tareas");
    }

})