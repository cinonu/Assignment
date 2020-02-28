$('#butt').click(function(){
	

var name = $("#name").val().trim();
var address =$("#address").val().trim();
var male = $("#re1").is(":checked");
var female = $("#re2").is(":checked");
var vali = true;


if(name == "")
{
	$("#err").text("enter the name");
	vali=false;
}
else
{
	$("#err").text("");

}
if(address=="")
{
	$("#err1").text("enter the address");

}
else
{
	$("#err1").text("");
}
if(!(male || female))
     {
        $("#err2").text("please select one gender");
        validate=false;
     }
     else
     {
        $("#err2").text("");
     }
return vali;


});