<?php

include("header.php");
$boolean = TRUE;
if($_SESSION["usertype"]=="lecturer"){
if ( isset($_POST['courseid']) && isset($_POST['moduleid'])) {
	
	$sql = "SELECT moduleid FROM coursemodule WHERE courseid=:courseid";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array (
	':courseid' => htmlentities($_POST['courseid'])));
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		if ($row['moduleid']==htmlentities($_POST['moduleid'])){
			echo ('Module is already in This Course');
			$boolean = FALSE;
			break;
		}
		if ($row['moduleid']==htmlentities($_POST['moduleid'])){
			echo ('Module is already in This Course');
			$boolean = FALSE;
			break;
		}
		
	}

	
	if($boolean==TRUE){
    $sql = "INSERT INTO coursemodule(moduleid, courseid) 
              VALUES (:moduleid, :courseid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':moduleid' => htmlentities($_POST['moduleid']),
        ':courseid' => htmlentities($_POST['courseid'])));
}
}
echo('
<div class="col-sm-9">
      <div class="well">
<p>Add A Module into Course</p>
<form method="post">
<p>Module ID :
<input type="text" name="moduleid"></p>
<p>Course ID :
<input type="text" name="courseid"></p>
<p><input type="submit" value="Add Module to Course"/></p>
</form>
<br>
</div></div>
</body></html>');
}?>
	