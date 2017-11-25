//
// Main javascript
//
// Initialize plugins

$(function() {
    "use strict";

    // Initialize
    Switch();  // 2. Switches
    Toggle();  // 3. Toggles

    $.fn.datepicker.languages['es-ES'] = {
        format: 'dd/mm/yyyy',
        days: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
        daysShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
        daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
        weekStart: 1,
        months: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthsShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']
    };

    // 9. datepicker
    if ($('[data-toggle="datepicker"]').length) {
        $('[data-toggle="datepicker"]').datepicker({
            language: 'es-ES'
        });
    }

}); 
