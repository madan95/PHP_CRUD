<?php

include("header.php");
if($_SESSION["usertype"]=="lecturer"){
echo('<div class="col-sm-9">
      <div class="well">
        <h4>Search Student Module </h4>
        <p>Your Uniqe ID is '.$_SESSION["id"].'.</p>
		<form method="post" action="studentinfo.php">
<p>Student ID:
<input type="text" name="studentid" ></p>
<p><input type="submit" value="Search Student Module"/></p>
</form>
      </div>
      </div>');
}

if($_SESSION["usertype"]=="lecturer"){
	echo ('<div class="col-sm-9">
      <div class="well">');
	echo "<br>";
    echo ' 
	<div class="table-responsive"><table class="table table-bordered">
	<thead>
	<tr>
	<th>Student ID</th>
	<th>Student Name</th>
	<th>Student Email</th>
	</tr>
	</thead>';
	$stmt = $pdo->query("SELECT id, name, email FROM users WHERE usertype='student'");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		echo('	<tbody>
	<tr>
	<th scope="row">');
	echo(htmlentities($row['id']));
	echo ('<td>');
	echo htmlentities($row['name']);
	echo ('</td><td>');
	echo htmlentities($row['email']);
	echo ('</tr></tbody></ttable></div>');
}
echo ('</div></div>');
echo('</body></html>');
}else {
	
	header('Location: home.php');
	return;
}
?>
