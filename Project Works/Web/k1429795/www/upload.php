<?php

if(isset($_FILES['file']) ){
	$file = $_FILES['file'];
	//FILE PROPERTIES
	$file_name = $file['name'];
	$file_tmp = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];
	//Work out the file extension_loaded
	$file_ext = explode('.',$file_name);
	$file_ext = strtolower(end($file_ext));
	
	$allowed = array('txt');
	
	if(in_array($file_ext, $allowed)){
		if($file_error ==0){
			if($file_size <=600000)
			//$file_name_new = uniqid('', true).'.'.$file_ext;
		 $file_name_new = $file_name;
		 $file_destination = '/home/k1429795/www/upload/' .$file_name_new;
		 
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file_destination))
			{
				echo ('Sucessfully Uploaded');			}			
		
	}
}
header ('location: uploadfile.php');
	}else{
	 header('location: index.php');
 }
?>
