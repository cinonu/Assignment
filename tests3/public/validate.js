
$(document).ready(function () {

$.validator.addMethod(
"regex",
function(value, element, regexp) {
var check = false;
var re = new RegExp(regexp);
return this.optional(element) || re.test(value);
},""
);
ignore: "#hidden"

$.validator.addMethod('filesize', function (value, element, param) {
return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0} bytes.');
// validate signup form on keyup and submit
$("#form").validate({
errorElement: 'label',
errorClass: 'text-danger',
rules:
{

firstname:
{
required:true,
},

lastname:
{
required:true,
},


email:
{
required:true,
email:true,

},

phonenumber:
{
required:true,
regex:'^[+0-9]*$',
minlength:10,
maxlength:14,

},

city:
{
required:true,
},

gender:
{
required:true,
},
age:
{
 required:true,
},

picture:
{
required:true,
accept: "jpg,png",
filesize:20000,
},

},
messages:
{
firstname:
{
required:"please enter first name.",
},
secondname:
{
required:"please enter last name.",
},
email:
{
required:"please enter your email."
},
phonenumber:
{
required:"please enter your contact.",
},
city:
{
required:"please select city."
},
gender:
{
required:"please select gender."
},
age:
{
required:"please enter age."
},
picture:
{
required:"<br>please select image.",
accept:"<br>only jpg,png files allowed."
}
}

});
});