
 
function printErr(elemId,errMsg) 
{
document.getElementById(elemId).innerHTML = errMsg;
}
function validate_form()
{
	
	var first_name = document.getElementById("firstname").value.trim();
	var last_name  = document.getElementById("lastname").value.trim();
	var phone      = document.getElementById("phone_no").value.trim();
	var officeno   = document.getElementById("office_no").value.trim();
	var email      = document.getElementById("email").value.trim();
    var password   = document.getElementById("pass").value;
    var confirmpass= document.getElementById("confirmpass").value;
    var DOB        = document.getElementById("dob").value;
    var checkbox_18 =  document.getElementById('checkbox_sample18');
      var checkbox_19 =  document.getElementById('checkbox_sample19');
      var checkbox_20 =  document.getElementById('checkbox_sample20'); 
   	var gender = document.form1.gender.value;
   	var about =  document.getElementById('about');
    var Validate = true; 
	 // Validate name
    if(first_name == "") 
    {
        printErr("err", "Please enter your name");
        Validate=false;
    } 
    else 
    {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(first_name) === false) 
        {
            printErr("err", "Pleaerrse enter a valid name");
            Validate=false;
        } 
        else
        {
            printErr("err", "");
            
        }
    }
    if(last_name == "") 
    {
        printErr("err1","Please enter your last name");
        Validate=false;
    } 
    else
    {
        var regex1 = /^[a-zA-Z\s]+$/;                
        if(regex1.test(last_name) === false) {
            printErr("err1", "Please enter a valid name");
            Validate=false;
        } 
        else 
        {
            printErr("err1", "");
            
        }
    }
    if(phone == "") 
    {
        printErr("err2", "enter digit");
        Validate=false;
    } 
    else
    {
        var regex2= /^\d{10}$/;                
        if(regex2.test(phone) === false) {
            printErr("err2", "enter valid no");
            Validate=false;
        } 
        else 
        {
            printErr("err2", "");
            
        }
    }
    if(officeno == "") 
    {
        printErr("err3", "enter digit");
        Validate=false;
    } 
    else
    {
        var regex3= /^\d{3}$/;                
        if(regex3.test(officeno) === false) 
        {
            printErr("err3", "enter valid digit");
            Validate=false;
        } 
        else 
        {
            printErr("err3", "");
            
        }
    }
   if(email == "") 
    {
        printErr("err4", "invalid field");
        Validate=false;
    } 
    else
    {
        var regex4 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;                
        if(regex4.test(email) === false) 
        {
            printErr("err4", "enter valid id");
            Validate=false;
        } 
        else 
        {
            printErr("err4", "");
            
        }
    }
    if(password == "") 
    {
        printErr("err5", "enter the password");
        Validate=false;
    } 
    else
    {
         var regex5 = /^[A-Za-z0-9]\w{7,14}$/;
         if(regex5.test(password) === false)
         {        
          printErr("err5","enter valid password");
          Validate=false;
         }
         else
         {
         	printErr("err5","")
         }
    }
    if(confirmpass == "")
    {
    	printErr("err6","enter the password");
    	Validate=false;
    }
    else
    {
    	if(confirmpass != password)
    	{
    		printErr("err6","please enter same password");
    		Validate=false;
    	}
    	else
        {
        	printErr("err6","")
        }
    }
    if(gender == "")
    {
    	printErr("err7","please enter gender");
    	Validate=false;
    }
    else
    {
    	printErr("err7","");
    }
    if (!checkbox_18.checked && !checkbox_19.checked && !checkbox_20.checked) 
    {
 	 	printErr('err8',"Interest Required");
 	 	Validate=false;
 	}
 	 else
 	 {
 	 	printErr('err8',"");
 	 }   
 	if(about.value.trim() == '')
 	 {
 	 	printErr('err9',"Please Enter Something About You.");
 	 	Validate=false;
 	 }
 	 else
 	 {
 	 	printErr('err9',"");
 	 }
 	  if(DOB == "")
    {
    	printErr("dob_err","please select birthDate.");
    	Validate=false;
    }
    else
    {
    	printErr("dob_err","");
    }
    
	return Validate;

}
function getage(DOB) 
    { 
    var today = new Date();
    var birthDate = new Date(DOB);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    var y = (age) + (m/12);
    document.getElementById("age").value = y;
    }
  
