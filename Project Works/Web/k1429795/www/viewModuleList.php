<?php

include("header.php");
if ( isset($_POST['delete']) && isset($_POST['id']) ) {
    $sql = "DELETE FROM module WHERE id = :zip";
	    $stmt2 = $pdo->prepare($sql);
    $stmt2->execute(array(':zip' => $_POST['id']));
	  $sql = "DELETE FROM usermodule WHERE moduleid=:zip";
	    $stmt1 = $pdo->prepare($sql);
		    $stmt1->execute(array(':zip' => $_POST['id']));
		 $sql = "DELETE FROM coursemodule WHERE moduleid=:zip";
	    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['id']));
	
}
echo ('<div class="col-sm-9">
      <div class="well">
');
if($_SESSION["usertype"]=="lecturer"){
		echo "<br>";
    echo '<div class="table-responsive"> <table class="table table-bordered">
	<thead>
	<tr>
	<th>Module ID</th>
	<th>Module Name</th>
	</tr>
	</thead>';
	$stmt = $pdo->query("SELECT id, name FROM module");
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
}
else{
	
	header('Location: home.php');
	return;
}
?>
