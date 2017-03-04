<?php
session_start();
include("header.php");
if($_SESSION["usertype"]=="lecturer"){
	$studentid = htmlentities($_POST['studentid']);
	$sql = "SELECT moduleid FROM usermodule WHERE userid=:sid";
$sql = "SELECT moduleid FROM usermodule WHERE userid=:sid";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array (
	':sid' => $studentid));
	
echo ('<div class="col-sm-9">
      <div class="well">
        <h4>Search Result </h4>
        <p>Student '.$studentid.' Module ID</p>');
 echo '
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
	<tr>
	<th>Student ID</th>
	<th>ModuleID</th>
	</tr>
	</thead>
';
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo '<tbody>
	<tr>
	<th scope="row">';
	echo ($studentid);
	echo '<td>';
	echo( htmlentities($row['moduleid']));
	echo '</td></tr></tbody></ttable></div>';
	

}


echo('</body>
	</html>');
}else{
	header('Location: home.php');
	return;
}
?>