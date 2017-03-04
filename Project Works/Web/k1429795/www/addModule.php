<?php

include("header.php");
if($_SESSION["usertype"]=="lecturer"){
if(isset($_POST['mname'])){
    $sql = "INSERT INTO module (name) 
              VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => htmlentities($_POST['mname'])));
}
echo('
<div class="col-sm-9">
      <div class="well">
<p>Add A New Module</p>
<form method="post">
<p>Name:
<input type="text" name="mname" ></p>
<p><input type="submit" value="Add New Module"/></p>
</form>
</div></div>
</body></html>
');
}else  {
	header('Location: home.php');
	return;
}?>