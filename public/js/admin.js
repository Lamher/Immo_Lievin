$(function () {
    // Tables pagination
    $('#table-admin').DataTable({
        responsive: true,
        "pagingType": "simple",
        "pageLength": 15,
        "searching": false,
        "bLengthChange": false,
        "language": {
            "info": "_START_ à _END_ sur _TOTAL_",
            "infoEmpty": "0 à 0 sur 0",
            "paginate": {
                "first": "Première page",
                "last": "Dernière page",
                "next": "Suivant",
                "previous": "Précédent"
            }
        },
    });
    $('.dataTables_length').addClass('bs-select');
    if ($(window).width() < 980) {
        $('#table-admin').addClass('table-responsive');
    } else {}
    $(window).resize(function () {
        /*If browser resized, check width again */
        if ($(window).width() < 980) {
            $('#table-admin').addClass('table-responsive');
            $('html').addClass('mobile');
        } else {
            $('#table-admin').removeClass('table-responsive');
        }
    });

    $( "#datepicker-start" ).datepicker();
    $( "#datepicker-start" ).datepicker("option", "dateFormat", "yy-mm-d");
    $( "#datepicker-end" ).datepicker();
    $( "#datepicker-end" ).datepicker("option", "dateFormat", "yy-mm-d");


    $('#btn-xml').on('click', function(e){
        e.preventDefault();
        let start = $('#datepicker-start').val();
        let end = $('#datepicker-end').val();
        $.ajax({
            url: "http://localhost/Immo_Lievin/public/admin/index/ajaxXml/",
            method: "POST",
            data: {
                start: start,
                end: end,
            },
            success: function (data) {
                $('#resultXml').html('Le fichier XML a été généré avec succès.')
            }
        });
    })
})