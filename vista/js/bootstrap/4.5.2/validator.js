
$('#login').bootstrapValidator({
    
    
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {
        
        uslogin: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                }

            }

        },    

    }

});
