$(document).ready(function () {
    $('.del').click(function () {
        var id=$(this).data('id');
        $.ajax(
            {
                type : 'GET',
                url : "/admin/user/"+id,
                async : false,
                data : id,
                success : function (data) {
                    window.location.reload();
                }
            }
        );
    });
});