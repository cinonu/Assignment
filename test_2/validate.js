$(function() {

$.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
});


    $("#Example").validate({
         
         rules: {
                    name: 
                    {
                        required: true,
                        nowhitespace: true,
                        lettersonly: true,
                         
                       
                    },
                    email: 
                    {
                        required: true,
                        email:true,
                       


                    },

                    cno:

                    {
                      required:true,
                      number:true,
                      minlength:10, 
                      maxlength:10,
                    },

                    address: 

                    {
                        required: true,
                        lettersonly:true,
                         

                       
                    },
                    
                    image:

                    {
                    required: true,
                    accept:"jpg,png,jpeg,gif",

                    },

                    gender: 
                    
                    {
                        required: true,
                        
                    },

                 } 
                       

                    
                                        
         });
});
