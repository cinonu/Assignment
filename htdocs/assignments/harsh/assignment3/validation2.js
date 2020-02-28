

$('#butt').click(function(){
  
	
	var first_name = $("#fname").val().trim();
	var last_name  = $("#lname").val().trim();
	var phone      = $("#pno").val().trim();
	var officeno   = $("#no").val().trim();
 var email      = $("#email").val().trim();
    var password   = $("#pass").val().trim();
 var confirmpass= $("#confirmpass").val().trim();
    var dob= $("#dob").val();
    var about =  $("#about").val().trim();
    var male = $("#residence1").is(":checked");
    var female = $("#residence2").is(":checked");
     var checkbox_18 =  $("#checkbox_18").is(":checked");
      var checkbox_19 =  $("#checkbox_19").is(":checked");
      var checkbox_20 =  $("#checkbox_20").is(":checked");
    var validate=true;

 if(first_name == "")
 {
 	$("#err1").text("required text");
 	validate=false;
     
 }
 else
 {
 	$("#err1").text("");
 }
 if(last_name == "")
 {
 	$("#err2").text("required text");
 	validate=false;
     
 }
 else
 {
 	$("#err2").text("");
 }
 if(phone == "") 
    {
        $("#err3").text("required text");
        validate=false;
    } 
    else
    {
        var regex2= /^\d{10}$/;                
        if(regex2.test(phone) === false) {
            $("#err3").text("required text");
            validate=false;
        } 
        else 
        {
            $("#err3").text("");
            
        }
    }
     if(officeno == "") 
    {
        $("#err4").text("required text");
        validate=false;
    } 
    else
    {
        var regex2= /^\d{3}$/;                
        if(regex2.test(officeno) === false) {
            $("#err4").text("required text");
            validate=false;
        } 
        else 
        {
            $("#err4").text("");
            
        }
    }
    if(email == "") 
    {
        $("#err5").text("required text");
        validate=false;
    } 
    else
    {
        var regex2= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;                
        if(regex2.test(email) === false) {
            $("#err5").text("required text");
            validate=false;
        } 
        else 
        {
            $("#err5").text("");
            
        }
    }
    if(password == "") 
    {
        $("#err6").text("required text");
        Validate=false;
    } 
    else
    {
         var regex5 = /^[A-Za-z0-9]\w{7,14}$/;
         if(regex5.test(password) === false)
         {        
          $("#err6").text("required text");
          Validate=false;
         }
         else
         {
         	$("#err6").text("");
         }
    }
    if(confirmpass == "")
    {
    	$("#err7").text("required text");
    	Validate=false;
    }
    else
    {
    	if(confirmpass != password)
    	{
    		$("#err7").text("required text");
    		Validate=false;
    	}
    	else
        {
        	$("#err7").text("");
        }
    }
    if(dob == "")
    {
        $("#dob_err").text("required text");
        validate=false;
    }
    else
    {
       $("#dob_err").text("");
       var today = new Date();
        var birthDate = new Date(dob);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        var y = (age) + (m/12);
        $("#age").val(y);
    }
    if(about== '')
     {
        $("#err9").text("Please Enter Something About You.");
        validate=false;
     }
     else
     {
        $("err9").text("");
     }
     if(!(male || female))
     {
        $("#err10").text("please select one gender");
        validate=false;
     }
     else
     {
        $("#err10").text("");
     }
     if(!(checkbox_18 || checkbox_19 || checkbox_20 ))
     {
        $("#err11").text("please select one ");
        validate=false;
     }
     else
     {
        $("#err11").text("");
     }



 
 return validate;

});

