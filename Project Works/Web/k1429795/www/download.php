<?php
if(isset($_POST['download'])&&isset($_POST['filename'])){
$file = "upload/".$_POST['filename'];

// Force the download
header('Content-Disposition: attachment; filename="'. basename($file) . '"');
header("Content-Length: " . filesize($file));
header("Content-Type: application/octet-stream;");
readfile($file);
}else{
	 header('location: index.php');
 }
?>