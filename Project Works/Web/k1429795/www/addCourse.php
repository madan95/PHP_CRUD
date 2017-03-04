<?php

include("header.php");
if($_SESSION["usertype"]=="lecturer"){
if(isset($_POST['cname'])){
    $sql = "INSERT INTO course (name) 
              VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => htmlentities($_POST['cname'])));
}
echo('
<div class="col-sm-9">
      <div class="well">
<p>Add A New Course</p>
<form method="post">
<p>Name:
<input type="text" name="cname"></p>
<p><input type="submit" value="Add New Course"/></p>
</form>
</div></div>
</body></html>
');
}else {
	header('Location: home.php');
	return;
}?>