<?php
include("header.php");

 if($_SESSION["usertype"]=="lecturer"){
		echo('<div class="col-sm-9">
      <div class="well"  >');
echo ('
<h1>Add Neew Course Work</h1>

<form action="upload.php" method="POST" enctype="multipart/form-data">
         <input type="file" name="file" />
         <input type="submit"/>
      </form>

</div></div>');

echo('
<div class="col-sm-9">
      <div class="well"  >
<h1> Download Files </h1>
');
$dir = "/home/k1429795/www/upload/*.txt";
$remove = "/home/k1429795/www/upload/";
foreach (glob($dir) as $filename) {
	  $filetod = str_replace("/home/k1429795/www/upload/" , "" , $filename);
   // echo "$filename size " . filesize($filename) . "\n";
echo('<form action="download.php" method="POST"><input type="hidden" ');
    echo('name="filename" value="'.$filetod.'">'."\n");
    echo('<input type="submit" value="'.$filetod.'" name="download">');
    echo("</form>");
	
	}

	  
	  

echo('
</div></div>
 ');




echo('
</body>
</html>
');
 }elseif($_SESSION["usertype"]=="student"){
	 echo('
<div class="col-sm-9">
      <div class="well"  >
<h1> Download Files </h1>
');
$dir = "/home/k1429795/www/upload/*.txt";
$remove = "/home/k1429795/www/upload/";
foreach (glob($dir) as $filename) {
	  $filetod = str_replace("/home/k1429795/www/upload/" , "" , $filename);
   // echo "$filename size " . filesize($filename) . "\n";
echo('<form action="download.php" method="POST"><input type="hidden" ');
    echo('name="filename" value="'.$filetod.'">'."\n");
    echo('<input type="submit" value="'.$filetod.'" name="download">');
    echo("</form>");
	
	}

	  
	  

echo('
</div></div>
 ');
 
echo ('<!DOCTYPE html>
<html>

<head>
</head>
<body>
<form name="redirect">
<center>
<font face="Arial">You will be redirected in<br><br>
<form>
<input type="text" size="3" name="redirect2">
</form>
seconds</b></font>
</center>

<script>
<!--



var targetURL="home.php"
//change the second to start counting down from
var countdownfrom=10


var currentsecond=document.redirect.redirect2.value=countdownfrom+1
function countredirect(){
if (currentsecond!=1){
currentsecond-=1
document.redirect.redirect2.value=currentsecond
}
else{
window.location=targetURL
return
}
setTimeout("countredirect()",1000)
}

countredirect()
//-->
</script>

</body>
</html>
');
echo('

</body>
</html>
');
	 
 }else{
	 header('location: index.php');
 }
?>