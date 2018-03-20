$(document).ready(function() {
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
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addComment',
            data: {
                '_token': $('input[name=_token]').val(),
                'content': $('input[name=content]').val(),
                'post_id': $('input[name=post_id]').val()
            },
            success: function(data) {

                $('#commentlist').append("" +
                    "<li class='media comment"+data.commentId+"'>"+
                        "<a class='media-left' href='/profile/"+data.user_id+"'>"+
                            "<img class='media-object' width='32' height='32' src="+ data.image+ ">"+
                        "</a>"+
                        "<div class='media-body'>"+
                            "<span class='media-link'>"+
                                "<a href='/profile/"+data.user_id+"'>"+data.username+' '+"</a>"+
                            "</span>"+
                            "<span class='media-content'>"+ data.content +"</span>"+
                            "<div class='media-actions'>"+
                            "<span aria-hidden='true'>"+ data.time+ " · </span>"+
                            "<a class='delete-modal' data-id="+"'"+data.commentId+"'"+" data-name="+ data.content+">Delete</a>"+
                            "</div>"+
                        "</div>"+
                    "</li>"
                );
            },

        });
        $('#content').val('');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteComment',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text(),
            },
            success: function(data) {
                $('.comment' + $('.did').text()).remove();
            }
        });
    });

});