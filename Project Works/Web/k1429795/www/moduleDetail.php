<?php


include("header.php");
echo '<style>
textarea{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;

	width: 100%;
}
</style>';

if ( isset($_POST['text'])&&isset($_POST['add'])) {
	$timestamp = date('Y-m-d H:i:s');
    $sql = "INSERT INTO announcement (moduleid, date, userid, text) 
              VALUES (:moduleid, :date, :userid, :text)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':moduleid' => htmlentities($_GET['id']),
        ':date' => $timestamp,
        ':userid' => $_SESSION['id'],
		':text' => htmlentities($_POST['text'])));
}

if($_SESSION["usertype"]=="lecturer"){
	$boolean = FALSE;
	$sql=("SELECT id FROM module WHERE id=:id");
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array(
	':id' => htmlentities($_GET['id'])
	));
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		if($row['id']==htmlentities($_GET['id'])){
			$boolean =TRUE;
			break;
		}
	}
	if($boolean==TRUE){
		
	if ( isset($_POST['delete'])&&isset($_POST['id'])) {
$sql = "DELETE FROM announcement WHERE id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['id']));
}
	
	

	  
	  
	  
	  
	  
	  	echo('<div class="col-sm-9">
      <div class="well"  >');
echo ('
<p>Add A New Announcement</p>
<form method="post" id="ok">
<textarea type="text" name="text" form="ok" rows="4" cols="50"></textarea></p>
<p><input type="submit" value="Add New" name="add"/></p>
<p>
</div></div>');

	echo('<div class="col-sm-9">
      <div class="well" >');
	  
	  
	  
	  
	  
	  
	  
	$filename = htmlentities($_GET['id']);
	echo 'Module ID: '.$filename;
	echo ('	</div></div>');	
	$stmt2 = $pdo->query("SELECT id, userid, moduleid, text, date FROM announcement");
while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
	if($row['moduleid']==$filename){
		echo('<br>'); 
		echo('<div class="col-sm-9" >
      <div class="well">');
		echo (htmlentities($row['text']));
		echo ('<br>');
		$stmt3 = $pdo->query("SELECT name FROM users WHERE id=".$row['userid']);
while ($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){
		echo ('-by '.$row2['name']);
		echo ('<br>-Posted On : '.$row['date']);
		echo('<br><form method="post"><input type="hidden" ');
    echo('name="id" value="'.$row['id'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("</form>");
		echo ('</div></div>');
}
$boolean = TRUE;}

}if ($boolean == FALSE)
{
	echo ('No Such Module Exist Mate ');
}

	}else{
		echo('No Such Module Exist my friend');
	}







} else if($_SESSION["usertype"]=="student"){
	$true = false;
	$ids = $_SESSION['id'];
		$i=0;
	$filename = htmlentities($_GET['id']);
	echo('<div class="col-sm-9">
      <div class="well">');
	  	$sql = "SELECT moduleid, userid FROM usermodule WHERE userid=:userid";
	$stmt3 = $pdo->prepare($sql);
	$stmt3->execute(array (
	':userid' => $ids));
	while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)){
	$module[$i] = $row['moduleid'];
      $i = $i+1;	
	}
	foreach($module as $x=>$x_value){
		if($filename==$x_value){
				echo 'Module ID: '.$filename;
	echo ('	</div></div>');	
	$stmt2 = $pdo->query("SELECT userid, moduleid, text, date FROM announcement");
while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
	if($row['moduleid']==$filename){
		echo('<br>'); 
		echo('<div class="col-sm-9">
      <div class="well">');
		echo htmlentities($row['text']);
		echo ('<br>');
			$sql = "SELECT name FROM users WHERE id=:id";
	$stmt3 = $pdo->prepare($sql);
	$stmt3->execute(array (
	':id' => $row['userid']));
while ($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){
		echo ('-by '.$row2['name']);
		echo ('<br>-Posted On : '.$row['date']);
		echo ('	</div></div>');
}}
}
			$true =TRUE;
			break;
		}
	}
	if ($true==FALSE){
		echo ('You Are Not In This MOdule Mate');
	}
} 

?>
</body>
</html>