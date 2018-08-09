$(document).ready(function () {
    $('#dataTables-lineup').DataTable({
        responsive: true,
        pageLength:10,
        ordering: false,
        sPaginationType: "full_numbers",
        oLanguage: {
            oPaginate: {
                sFirst: "<<",
                sPrevious: "<",
                sNext: ">",
                sLast: ">>"
            },
            "sLengthMenu": "Show _MENU_ items on page",
            "sZeroRecords": "Nothing to show.",
            "sInfo": "Showed _START_-_END_ from _TOTAL_",
            "sInfoEmpty": "Showed 0 from  0",
            "sInfoFiltered": "(filtered from _MAX_)",
            "sSearch": "Search:"
        }
    });

    $(window).resize(function(){

        $('#dataTables-lineup').DataTable();

    });

    // УДАЛЕНИЕ СТРАНИЦЫ

    $('body').on('click', 'a[data-target=delete_lineup_modal]', function(e) {
        e.preventDefault();
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('#delete_lineup_modal .modal-body').html(name);
        $('#delete_lineup_modal #delete_lineup_button').attr('data-id', id);
        $('#delete_lineup_modal').modal('show');
    });

    $('#delete_lineup_modal #delete_lineup_button').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/lineup/delete',
            data: {'id': id},
            method: 'POST',
            success: function(response) {
                location.reload();
            }
        });
    });
});