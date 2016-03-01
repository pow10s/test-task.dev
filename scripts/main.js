/**
 * Created by Dima on 07.10.2015.
 */
$(document).ready(function(){

    $("#reg_form").validate({

        rules:{

            user_name:{
                required: true,
                minlength: 4,
                maxlength: 16
            },

            password:{
                required: true,
                minlength: 6,
                maxlength: 16
            },

            email:{
                required: true,
                minlength: 6,
                maxlength: 25
            }
        }

    });

});



