<?php
include("header.php");	
?>


<div class="col-sm-9">
      <div class="well">
        <h4><b>Welcome <?php
echo $_SESSION["name"];
?>
        <p></b><br>
Your ID is <?php echo $_SESSION["id"];?>.</h4></p>
    


<?php
	
 if($_SESSION["usertype"]=="student"){
	 
	 echo "<br>";
    echo ' <table class="table table-bordered">
	<thead>
	<tr>
	<th>Course ID</th>
	<th>Course Name</th>
	</tr>
	</thead>';
	$stmt = $pdo->query("SELECT userid, courseid FROM usercourse");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	if($row['userid']==$_SESSION["id"]){
	echo('	<tbody>
	<tr>
	<th scope="row">');
	echo($row['courseid']);
    echo("</th>");
	$_SESSION["courseid"]=$row['courseid'];
	$stmt2 = $pdo->query("SELECT id, name FROM course");
while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
	if($row['id']==$_SESSION["courseid"]){
    echo "<td>";
	echo($row['name']);
    echo("</td></tr></tbody></ttable>");
	}
	}	
}
}
	echo "<br>";
    echo '  <div class="table-responsive"><table class="table table-bordered">
	<thead>
	<tr>
	<th>Module ID</th>
	<th>Module Name</th>
	<th>Select Module</th>
	</tr>
	</thead>';
$stmt2 = $pdo->query("SELECT userid, moduleid FROM usermodule");
while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
	if($row['userid']==$_SESSION["id"]){
			echo('	<tbody>
	<tr>
	<th scope="row">');
		echo ($row['moduleid']);
		$_SESSION['moduleid']=$row['moduleid'];
		$stmt3=$pdo->query("SELECT id, name FROM module");
		while ($row=$stmt3->fetch(PDO::FETCH_ASSOC)){
		if($row['id']==$_SESSION["moduleid"]){
		echo "<td>";
		echo ($row['name']);
		 echo("</td><td>");
		 echo('<form method="get"><input type="hidden" ');
    echo('name="moduleid" value="'.$row['id'].'">'."\n");
echo('<a href="moduleDetail.php?id='.htmlentities($row['id']).'" class="btn btn-info btn-block">Select</a>');
    echo("\n</form>\n");
	echo("</tr></tbody></ttable></div>");

		}
	}
}
}
}?>


<?php
 if($_SESSION["usertype"]=="lecturer"){
	 	 echo "<br>";
    echo ' <table class="table table-bordered">
	<thead>
	<tr>
	<th>Course ID</th>
	<th>Course Name</th>
	</tr>
	</thead>';
	$stmt = $pdo->query("SELECT userid, courseid FROM usercourse");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	if($row['userid']==$_SESSION["id"]){
	echo('	<tbody>
	<tr>
	<th scope="row">');
	echo($row['courseid']);
    echo("</th>");
	$_SESSION["courseid"]=$row['courseid'];
	$stmt2 = $pdo->query("SELECT id, name FROM course");
while ( $row = $stmt2->fetch(PDO::FETCH_ASSOC) ) {
	if($row['id']==$_SESSION["courseid"]){
    echo "<td>";
	echo($row['name']);
    echo("</td></tr></tbody></ttable>");
	}
	}	
}
}
	 	echo "<br>";
    echo ' <div class="table-responsive"> <table class="table table-bordered">
	<thead>
	<tr>
	<th>Module ID</th>
	<th>Module Name</th>
	<th>Select Module</th>
	</tr>
	</thead>';
$stmt2 = $pdo->query("SELECT userid, moduleid FROM usermodule");
while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
	if($row['userid']==$_SESSION["id"]){
		echo('	<tbody>
	<tr>
	<th scope="row">');
		echo ($row['moduleid']);
		$_SESSION['moduleid']=$row['moduleid'];
		$stmt3=$pdo->query("SELECT id, name FROM module");
		while ($row=$stmt3->fetch(PDO::FETCH_ASSOC)){
		if($row['id']==$_SESSION["moduleid"]){
		echo "<td>";
		echo ($row['name']);
		 echo("</td><td>");
		echo('<a href="moduleDetail.php?id='.htmlentities($row['id']).'" class="btn btn-info btn-block">Select</a>');
        echo("</tr></tbody></ttable></div>       </div>
				   
              </div>");
 }}}}}
 		 
	

?>

			 
  </body>
</html>