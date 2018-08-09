$(document).ready(function () {
    $('#dataTables-faqs').DataTable({
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
            "sLengthMenu": "Show _MENU_ faqs on page",
            "sZeroRecords": "Nothing to show.",
            "sInfo": "Showed _START_-_END_ from _TOTAL_",
            "sInfoEmpty": "Showed 0 from  0",
            "sInfoFiltered": "(filtered from _MAX_)",
            "sSearch": "Search:"
        }
    });

    $(window).resize(function(){

        $('#dataTables-faqs').DataTable();

    });

    // УДАЛЕНИЕ СТРАНИЦЫ

    $('body').on('click', 'a[data-target=delete_faq_modal]', function(e) {
        e.preventDefault();
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('#delete_faq_modal .modal-body').html(name);
        $('#delete_faq_modal #delete_faq_button').attr('data-id', id);
        $('#delete_faq_modal').modal('show');
    });

    $('#delete_faq_modal #delete_faq_button').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/faq/delete',
            data: {'id': id},
            method: 'POST',
            success: function(response) {
                location.reload();
            }
        });
    });
});