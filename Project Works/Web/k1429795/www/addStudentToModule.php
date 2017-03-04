<?php

include("header.php");
$boolean = TRUE;
if($_SESSION["usertype"]=="lecturer"){
if ( isset($_POST['moduleid']) && isset($_POST['studentid'])) {
	
	$sql = "SELECT moduleid FROM usermodule WHERE userid=:userid";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array (
	':userid' => htmlentities($_POST['studentid'])));
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		if ($row['moduleid']==htmlentities($_POST['moduleid'])){
			echo ('he/she is already in that Module');
			$boolean = FALSE;
			break;
		}
		
	}
if($boolean==TRUE){
    $sql = "INSERT INTO usermodule (userid, moduleid) 
              VALUES (:userid, :moduleid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':userid' => htmlentities($_POST['studentid']),
        ':moduleid' => htmlentities($_POST['moduleid'])));

}
}
echo ('
<div class="col-sm-9">
      <div class="well">
<p>Add A New Student to Modules</p>
<form method="post">
<p>Student ID :
<input type="text" name="studentid" ></p>
<p>Moudle ID :
<input type="text" name="moduleid"></p>
<p><input type="submit" value="Add Student to Module"/></p>
</form>
<br>	  

</div></div>
</body></html>');

}else {
	header('Location: home.php');
	return;
}?>