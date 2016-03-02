/**
 * Created by Dima on 07.10.2015.
 */
$(document).ready(function(){

    $("#search_id").validate({
        rules:{
            search_name:{
                required: true,
                minlength: 3,
                maxlength:25
            }

        },
        messages:{
            search_name:{
                required: "Required for fill",
                minlength: "Must contain at least 3 symbols",
                maxlength : "Max symbols - 30"
            }
        }
    });
});



