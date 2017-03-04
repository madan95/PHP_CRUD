<?php

include("header.php");
if ( isset($_POST['delete']) && isset($_POST['id']) ) {
    $sql = "DELETE FROM course WHERE id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['id']));
	  $sql1 = "DELETE FROM coursemodule WHERE courseid = :zip";
	    $stmt1 = $pdo->prepare($sql1);
     $stmt1->execute(array(':zip' => $_POST['id']));
		  $sql2 = "DELETE FROM usercourse WHERE courseid = :zip";
	    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute(array(':zip' => $_POST['id']));
}
echo ('<div class="col-sm-9">
      <div class="well">
');
if($_SESSION["usertype"]=="lecturer"){
		echo "<br>";
    echo ' <div class="table-responsive"><table class="table table-bordered">
	<thead>
	<tr>
	<th>Course ID</th>
	<th>Course Name</th>
	</tr>
	</thead>';
	$stmt = $pdo->query("SELECT id, name FROM course");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		echo('	<tbody>
	<tr>
	<th scope="row">');
	echo(htmlentities($row['id']));
	echo ('<td>');
	echo htmlentities($row['name']);
	echo ('</td><td>');
		echo('<form method="post"><input type="hidden" ');
    echo('name="id" value="'.$row['id'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("</form>");	
	echo ('</tr></tbody></ttable></div>');
}

echo ('</div></div>
</body></html>');
}else {
	header('Location: home.php');
	return;
}
?>
