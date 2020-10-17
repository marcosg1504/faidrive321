$('#eje1').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        numero: {

            validators: {

                notEmpty: {

                    message: 'El numero es requerido'

                }

            }

        },      

    }

});

$('#eje3').bootstrapValidator({
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                }

            }

        },      
        apellido: {

            validators: {

                notEmpty: {

                    message: 'El apellido es obligatorio'

                }

            }

        },  
        edad: {
                       
            validators: {

                notEmpty: {

                    message: 'La edad es obligatorio'

                },
                between: {
                    min: 1,
                    max: 150,
                    message: 'la edad debe ser desde 1 a 150'
                }
                
                

            }

        },  

    }

});
$('#eje4').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'El nombre de usuario es requerido'

                }

            }

        },

        apellido: {

            validators: {

                notEmpty: {

                    message: 'el apellido es obligatorio'

                }

            }

        },
     

    }

});

$('#eje5').bootstrapValidator({
    //edadValor = document.getElementsByName("edad")[0].value,
  
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                }

            }

        },      
        apellido: {

            validators: {

                notEmpty: {

                    message: 'El apellido es obligatorio'

                }

            }

        },  
        edad: {
                
            
            validators: {

                notEmpty: {

                    message: 'La edad es obligatorio'

                }
                
                

            }

        },  
        direccion:{
            validators: {

                notEmpty: {

                    message: 'La direccion es obligatoria'

                }
                
                

            }
        }

    }

});

$('#eje6').bootstrapValidator({
    //edadValor = document.getElementsByName("edad")[0].value,
  
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                }

            }

        },      
        apellido: {

            validators: {

                notEmpty: {

                    message: 'El apellido es obligatorio'

                }

            }

        },  
        edad: {
                
            
            validators: {

                notEmpty: {

                    message: 'La edad es obligatorio'

                }
                
                

            }

        },  
        direccion:{
            validators: {

                notEmpty: {

                    message: 'La direccion es obligatoria'

                }
                
                

            }
        }

    }

});

$('#eje7').bootstrapValidator({
    //edadValor = document.getElementsByName("edad")[0].value,
  
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        
       
        num1: {
                
            
            validators: {

                notEmpty: {

                    message: 'debe ingresar un numero'

                }
                
                

            }

        },  
        num2:{
            validators: {

                notEmpty: {

                    message: 'debe ingresar un numero'

                }
                
                

            }
        }

    }

});

$('#eje8').bootstrapValidator({
    //edadValor = document.getElementsByName("edad")[0].value,
  
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        
       
        edad: {
                
            
            validators: {

                notEmpty: {

                    message: 'debe ingresar edad'

                }
                
                

            }

        },     

    }

});
/*var valor = document.getElementById("numero").min;
alert("el valor es"+valor);*/

$('#form1').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        clave: {

            validators: {
                stringLength: {
                    min: 8, max: 16,                   
                    message: 'la clave debe tener entre 8 y 16 caracteres',
                   
                    
                },
                regexp: {
                   /* /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/,*/
                    regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/,
                    message: '<br> debe contener un digito, una minuscula, una mayuscula'
                },

                notEmpty: {

                    message: 'la calve es requerida'

                }                

            }          

        },  
        miArchivo:{
            validators: {
            notEmpty: {

                message: 'es necesario cargar un archivo'

            }     }
        }    ,
        icono:{
            validators: {
            notEmpty: {

                message: 'es necesario elegir un icono'

            }     }
        }    ,
        nombreArchivo:{
            validators: {

                notEmpty: {

                    message: 'el nombre del archivo es necesario'

                }

            }

        }

    }

});


function validar_clave(contrasenna)
		{
			if(contrasenna.length >= 8)
			{		
				var mayuscula = false;
				var minuscula = false;
				var numero = false;
				var caracter_raro = false;
				
				for(var i = 0;i<contrasenna.length;i++)
				{
					if(contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90)
					{
						mayuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122)
					{
						minuscula = true;
					}
					else if(contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57)
					{
						numero = true;
					}
					else
					{
						caracter_raro = true;
					}
				}
				if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
				{
					return true;
				}
			}
			return false;
		}




