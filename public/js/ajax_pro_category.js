$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-primary');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/editProCategory',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val()
            },
            success: function(data) {
                $('.category' + data.id).replaceWith(
                    "<tr class='category"+ data.id +"'>"+
                        "<td class='nowrap'>"+
                            "<strong>"+data.name+"</strong>"+
                        "</td>" +
                        "<td>"+data.time+"</td>"+
                        "<td data-order='1'>"+
                            "<a class='edit-modal btn-xs btn-info btn-pill' data-id='"+data.id +"' data-name='"+data.name+"' >Edit</a>"+
                        "</td>"+
                        "<td>"+
                            "<a class='delete-modal btn-xs btn-primary btn-pill' data-id='"+data.id +"' data-name='"+data.name+"' >Delete</a>"+
                        "</td>"+
                    "</tr>"
                    );
            }
        });
    });
    $("#add").click(function() {
        $.ajax({
            type: 'post',
            url: '/addProCategory',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
            },
            success: function(data) {

                $('#table').append(
                    "<tr class='category"+ data.id +"'>"+
                        "<td class='nowrap'>"+
                            "<strong>"+data.name+"</strong>"+
                        "</td>" +
                        "<td>"+data.time+"</td>"+
                        "<td data-order='1'>"+
                            "<a class='edit-modal btn-xs btn-info btn-pill' data-id='"+data.id +"' data-name='"+data.name+"' >Edit</a>"+
                        "</td>"+
                        "<td>"+
                            "<a class='delete-modal btn-xs btn-primary btn-pill' data-id='"+data.id +"' data-name='"+data.name+"' >Delete</a>"+
                        "</td>"+
                    "</tr>"
                );

            },

        });
        $('#name').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteProCategory',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.category' + $('.did').text()).remove();
            }
        });
    });
});