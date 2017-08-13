<script type="text/javascript">
function savepic()
{
//can perform client side field required checking for "fileToUpload" field
$.ajaxFileUpload
(
{
url:'doajaxfileupload.php',
secureuri:false,
fileElementId:'fileToUpload',
dataType: 'json',
success: function (data, status)
{
if(typeof(data.error) != 'undefined')
{
if(data.error != '')
{
alert(data.error);
}else
{
alert(msg); // returns location of uploaded file
}
}
},
error: function (data, status, e)
{
alert(e);
}
}
)
return false;
}
</script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="ajaxfileupload.js"></script>
<input type="file" name="fileToUpload" id="fileToUpload" />
<input type="button" value="Save" onclick="savepic()" />
