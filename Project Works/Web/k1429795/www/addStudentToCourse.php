<?php

include("header.php");
$boolean = TRUE;
$courseid = $studentid = "";
if($_SESSION["usertype"]=="lecturer"){
if ( isset($_POST['courseid']) && isset($_POST['studentid'])) {
	$courseid = htmlentities($_POST['courseid']);
	$studentid = htmlentities($_POST['studentid']);
	$sql = "SELECT courseid FROM usercourse WHERE userid=:userid";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array (
	':userid' =>$studentid));
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		if ($row['courseid']==$courseid){
			echo ('he/she is already in that course');
			$boolean = FALSE;
			break;
		}
		
	}
	if($boolean==TRUE){
    $sql = "INSERT INTO usercourse (userid, courseid) 
              VALUES (:userid, :courseid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':userid' => $studentid,
        ':courseid' => $courseid));
}
}
echo('
<div class="col-sm-9">
      <div class="well">
<p>Add A New Student to Course</p>
<form method="post">
<p>Student ID :
<input type="text" name="studentid"  ></p>
<p>Course ID :
<input type="text" name="courseid" ></p>
<p><input type="submit" value="Add Student to Course"/></p>
</form>
<br>

</div></div>
</body></html>');
}else{
	header('Location: home.php');
	return;
}?>