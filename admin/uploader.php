<?php

?>
<html><head><title>asv Uploader</title>
<script type="text/javascript">
function verifyifblank(field1,field2) {
var notok;
no_field1=field1=="";
no_field2=field2=="";
//alert("nomessage"+nomessage);
var errormessage="";
if (no_field1) {errormessage+=" Click the Choose File button to browse your file";}
if (no_field2 ) {errormessage+=" no entry2"}
if (no_field1 || no_field2) {alert("Please try again!" + errormessage + ".");
return false;}
else
{
return true;
}
}
</script>
<style>
.submit {
width:110px;
background-color:forestgreen;
color:white;
}
.frame1 {
background-color: #ffffff;
position: absolute;
top: 8%;
left: 30%;
frame-border:0;
width:70%;
height:400%;
scrolling:yes:
}
h4 {
color:white;
text-align:left;
background:forestgreen;
height:12px;
width:60px;
font-size:10;
font-family:Verdana;
}
button:hover,#register:hover,.submit:hover {
opacity: .6;
color:yellow;
}
</style>
</head>
<body leftmargin=0 rightmargin=0 topmargin=0 bottommargin=0 bgcolor='white'>
File Upload:
<br><form name="upload" enctype="multipart/form-data" action="uploader.php"
method="post">
<br><input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<input name="userfile" type="file" size=50 required />
<input name="submit" type="submit" value="Upload" class="submit"/>
</form>
<?php
if(!isset($_FILES["userfile"]["tmp_name"]))
{
exit;
}
if(!isset($_FILES))
exit;
$tempname = $_FILES["userfile"]["tmp_name"];
$type = $_FILES["userfile"]["type"];
$filename = $_FILES["userfile"]["name"];
$filesize = $_FILES["userfile"]["size"];
$extension=strtolower(substr($filename,-3));
if($filename){
echo "<br>Filename:<tt>".$filename."</tt>";
echo "<br>Filename extension:<tt>".$extension."</tt>";
echo "<br>File type:<tt>".$type."</tt>";
echo "<br>File size:<tt>".$filesize."</tt>";
$pathname=$filename;
}
if($extension=="mp3"
or $extension=="php"
or $extension=="htm" or $extension=="txt" or $extension=="jpg" or $extension=="png" or $extension=="gif" or $extension=="rar" or $extension=="zip" or $extension=="jpeg")
{ 
	if (file_exists ($filename))
	{
		$filename = "1$filename";
		$pathname = "$filename";
		$moveSuccessful = move_uploaded_file($tempname, $pathname);
	}
	else
	{
	$moveSuccessful = move_uploaded_file($tempname, $pathname);
	}
	
}
if($moveSuccessful)
{
echo "<br><br>FILE UPLOAD SUCCESSFULL.";
}
else 
{
echo "<br><br>ERROR";
}
?>