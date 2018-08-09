$(document).ready(function() {
    var table = $('#dataTables-users').DataTable({
        responsive: true,
        pageLength:10,
        sPaginationType: "full_numbers",
        oLanguage: {
            oPaginate: {
                sFirst: "<<",
                sPrevious: "<",
                sNext: ">",
                sLast: ">>"
            },
            "sLengthMenu": "Show _MENU_ users on page",
            "sZeroRecords": "Nothing to show.",
            "sInfo": "Showed _START_-_END_ from _TOTAL_",
            "sInfoEmpty": "Showed 0 from  0",
            "sInfoFiltered": "(filtered from _MAX_)",
            "sSearch": "Search:"
        }
    });

    var table_roles = $('#dataTables-roles').DataTable({
        responsive: true,
        pageLength:10,
        sPaginationType: "full_numbers",
        oLanguage: {
            oPaginate: {
                sFirst: "<<",
                sPrevious: "<",
                sNext: ">",
                sLast: ">>"
            },
            "sLengthMenu": "Show _MENU_ roles on page",
            "sZeroRecords": "Nothing to show.",
            "sInfo": "Showed _START_-_END_ from _TOTAL_",
            "sInfoEmpty": "Showed 0 from  0",
            "sInfoFiltered": "(filtered from _MAX_)",
            "sSearch": "Search:"
        }
    });

    $(window).resize(function(){

        $('#dataTables-users').DataTable();
        $('#dataTables-roles').DataTable();

    });

    $('#user_status_switch').change(function (e) {
        var user = $(this).attr('data-user');
        $.ajax({
            url: '/admin/user/change-status',
            data: {
                'id': user
            },
            method: 'POST'
        });
    });

    $('#user_role_switch input').change(function (e) {
        if (!$(this).attr('disabled')) {
            var user = $(this).attr('data-user');
            var role = $(this).attr('id');
            $.ajax({
                url: '/admin/user/change-role',
                data: {
                    'user': user,
                    'role': role
                },
                method: 'POST'
            });
        }
    });

    $('#change_ava').click(function (e) {
        e.preventDefault();
        $('#change_ava_form').click();
    });

    $('#change_ava_form').dropzone({
        url: '/admin/user/change-avatar',
        uploadMultiple: false,
        paramName: 'UserAvatarForm[avatar]',
        complete: function () {
            $.ajax({
                url: '/admin/user/get-avatar',
                method: 'POST',
                success: function (response) {
                    $('.userpicimg').attr('src', response);
                }
            });
        }
    });
});