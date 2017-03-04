<?php
session_start();
if (isset($_SESSION["admin"])){
	require_once "connection.php";
function test_input($data){
	$data= trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
echo ('
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kingston University</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style>
.error {color :#FF0000;}
</style>
<body>
    <div id="header">
        <div class="logo"><a href="populateuser.php">LMS<span>  Kingston University</span></a></div>
    </div>
	
	<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
	<br>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="logout.php">Logout</a></li>
      </ul><br>
    </div>
    <br>');
require_once "connection.php";
$name = $email ="";
if($_SESSION['id']==1){
	$emailErr = $passwordErr = $nameErr= $usertypeErr = "";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_POST['delete'])){
		//do nothing 
	}else{	
	if (empty($_POST['name'])){
		$nameErr = "Name cannot be Empty mate";
	}else{
     // check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/", htmlentities($_POST['name']))) {
       $nameErr = "Only letters and white space allowed"; 
     }
	 
	 if(empty($_POST['email'])){
		$emailErr = " Email is Required";
	}else {
		$email = htmlentities($_POST["email"]);
		 // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
	   
	}
	if (empty($_POST['password'])){
		$passwordErr = " Password Cannot be Empty";
	}else {
		if (empty($_POST['usertype'])){
			$usertypeErr = "Choose one user type mate";
		}else{
			if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['password'])&& isset($_POST['usertype'])) {
		 $name = test_input($_POST['name']);
		 $email = test_input($_POST['email']);
		 $password = test_input($_POST['password']);
		
    $sql = "INSERT INTO users (name, email, password, usertype) 
              VALUES (:name, :email, :password, :usertype)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
	
        ':name' => $name,
        ':email' => $email,
        ':password' =>  hash("MD5",$password),
		':usertype' => $_POST['usertype']));
}
			
		}
	}
	}}

	}


}




if ( isset($_POST['delete']) && isset($_POST['id']) ) {
    $sql = "DELETE FROM users WHERE id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['id']));
}



echo ('<div class="col-sm-9">
      <div class="well">
        <h4>Admin Board</h4>
        <p>Welcome Admin</p>');
 echo '
 <div class="table-responsive">
 <table class="table table-bordered">
	<thead>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>UsetType</th>
	<th>Email</th>
	<th>Password</th>
	<th>Edit</th>
	<th>Delete</th>
	</tr>
	</thead>
';
$stmt = $pdo->query("SELECT name, email, password, id, usertype FROM users");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) { 
echo '	<tbody>
	<tr>
	<th scope="row">';  
	echo htmlentities($row["id"]);
	echo '<td>';
	echo htmlentities($row["name"]);
	echo '<td>';
	echo htmlentities($row["usertype"]);
	echo '</td><td>';
	echo htmlentities($row["email"]);
	echo '</td><td>';
	echo htmlentities($row["password"]);
	echo '</td><td>';
    echo ('<a href="edit.php?id='.htmlentities($row['id']).'">Edit</a>');
	echo '</td><td>';
	echo('<form method="post"><input type="hidden" ');
    echo('name="id" value="'.$row['id'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("</form>");	
	echo('</tr>');
		echo ('</tr></tbody></ttable></div>');
	
		}

echo('
</table>
<br>
<p>Add A New User</p>
<form method="post">
<p>Name:
<input type="text" name="name" size="40"></p>
 <span class="error">*'.$nameErr.'</span>
<p>Email:
<input type="text" name="email"></p>
 <span class="error">*'.$emailErr.'</span>
<p>Password:
<input type="password" name="password"></p>
 <span class="error">*'.$passwordErr.'</span>
<p>User Type:<br>
<input type="radio" name="usertype" value="lecturer">
Lecturer<br>
<input type="radio" name="usertype" value="student">
Student
<span class="error">*'.$usertypeErr.'</span>
<p><input type="submit" value="Add New"/></p>
</form>
<p>
  </div>
      </div>
</body>
</head>');
}}else {
		header('Location: index.php');
	return;
}

?>
