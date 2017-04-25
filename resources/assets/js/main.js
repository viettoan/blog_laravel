$(document).ready(function () {
    //delete with ajax
    $(".del").click(function () {
        var id=$(this).data("id");
        $.ajax(
            {
                type : "GET",
                url : "/admin/user/"+id,
                async : false,
                data : id,
                success : function (data) {
                    window.location.reload();
                }
            }
        );
    });

    //search 
    $("#search").keyup(function(){
       if($(this).val().length>0){
            
            $.ajax({
                type : "GET",
                url : '/admin/user/search',
                async : false,
                data : {'search':$(this).val()} ,
                success : function (data) {
                   
                        $("#result").html(data);

                }
            });
       }
       else 
       {
         $("#result").html(''); 
       } 
        
    })
});