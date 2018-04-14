
Sobek = {
    defaultDateTimeFormat: 'YYYY-MM-DD HH:mm',
    defaultDateFormat: 'YYYY-MM-DD',

    recordTypes: {
        typeSinistreConstruction: {
            name: 'SINISTRE CONSTRUCTION / DOMMAGE OUVRAGE'
        },
        typeSinistreFlotte: {
            name: 'SINISTRE FLOTTE'
        },
        typeSinistreDommageBien: {
            name: 'SINISTRE DOMMAGE AUX BIENS'
        },
        typeSinistreMarchandise: {
            name: 'SINISTRE MARCHANDISE'
        },
        typeSinistreRC: {
            name: 'SINISTRE RC'
        }
    },

    warrantyTypes: {
        typeGarantieAutre: {
            name: 'Autre'
        },
        typeGarantieBrisGlace: {
            name: 'Bris de glace'
        },
        typeGarantieBrisMachine: {
            name: 'Bris de machine'
        },
        typeGarantieChocVehicule: {
            name: 'Choc de véhicule terrestre à moteur'
        },
        typeGarantieDegatsEaux: {
            name: 'Dégâts des eaux'
        },
        typeGarantieEvenementClimatique: {
            name: 'Événement climatique / Catastrophe naturelle'
        },
        typeGarantieIncendie: {
            name: 'Incendie'
        },
        typeGarantieVandalisme: {
            name: 'Vandalisme'
        },
        typeGarantieVol: {
            name: 'Vol'
        }
    }
};

// Activate Select2 plugin
$('select').select2();

$("input:checkbox, input:radio").uniform();

$(function(){
    // Display time picker
    $('.daterange-time-single').daterangepicker({
        timePicker: true,
        singleDatePicker: true,
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        maxDate: new Date(),
        locale: {
            format: Sobek.defaultDateTimeFormat,
            "applyLabel": "Apply",
            "cancelLabel": "Annuler",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "S",
            "daysOfWeek": ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            "monthNames": ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            "firstDay": 1
        }

    });
    // Display time picker
    $('.daterange-no-time-single').daterangepicker({
        timePicker: false,
        singleDatePicker: true,
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        locale: {
            format: Sobek.defaultDateFormat,
            "applyLabel": "Apply",
            "cancelLabel": "Annuler",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "S",
            "daysOfWeek": ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
            "monthNames": ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            "firstDay": 1
        }

    });
    $('.french_picker_search').pickadate({
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        today: false,
        clear: false,
        close: false,
        formatSubmit: 'yyyy-mm-dd',
        format: 'yyyy-mm-dd',
        selectYears: false,
        selectMonths: false
    });

    // Ripple effect
    $(".btn:not(.disabled):not(.multiselect.btn-default):not(.bootstrap-select .btn-default), .navigation li:not(.disabled) a, .nav > li:not(.disabled) > a, .sidebar-user-material-menu > a, .sidebar-user-material-content > a, .select2-selection--single[class*=bg-], .breadcrumb-elements > li:not(.disabled) > a, .wizard > .actions a, .ui-button:not(.ui-dialog-titlebar-close), .ui-tabs-anchor:not(.ui-state-disabled), .plupload_button:not(.plupload_disabled), .fc-button, .pagination > li:not(.disabled) > a, .pagination > li:not(.disabled) > span, .pager > li:not(.disabled) > a, .pager > li:not(.disabled) > span").ripple({
        dragging: false,
        adaptPos: false,
        scaleMode: false
    });

    // Unbind ripple in Datepaginator
    $('.dp-item, .dp-nav, .sidebar-xs .sidebar-main .navigation > li > a').ripple({unbind: true});

    $(document).on('click', '.sidebar-control', function() {
        if($('body').hasClass('sidebar-xs')) {
            $('.sidebar-main .navigation > li > a').ripple({unbind: true});
        }
        else {
            $('.sidebar-main .navigation > li > a').ripple({unbind: false});
        }
    });
});
$('.voir_documents_btn').on('click',function(e){
    var id = $(this).prop('id');
    console.log('btn clicked '+id+' ==> selector : .record_'+id+'_files');
    $('.et_pb_row_2.et_pb_row.record_'+id+'_files').css('display','block');
    return false;
})
$(".legitRipple").ripple();