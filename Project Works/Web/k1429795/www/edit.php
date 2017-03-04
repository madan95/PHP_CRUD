
<?php
session_start();
if (isset($_SESSION["admin"])){
	require_once "connection.php";

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

if ( isset($_POST['name']) && isset($_POST['email'])
      && isset($_POST['password']) && isset($_POST['id']) ) {
    $sql = "UPDATE users SET name = :name,
             email = :email, password = :password
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => htmlentities($_POST['name']),
        ':email' => htmlentities($_POST['email']),
        ':password' => hash("MD5", htmlentities($_POST['password'])),
        ':id' => htmlentities($_POST['id'])));
    header( 'Location: populateuser.php' ) ;
    return;
}
$stmt = $pdo->prepare("SELECT * FROM users where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location: index.php' ) ;
    return;
}

$n = htmlentities($row['name']);
$e = htmlentities($row['email']);
$p = htmlentities($row['password']);
$id = htmlentities($row['id']);
echo ('
<div class="col-sm-9">
      <div class="well">
<p>Edit User</p>
<form method="post">
<p>Name : <input type="text" name="name" value='.$n.'></p>
<p>Email : <input type="text" name="email" value='.$e.'></p>
<p>Password : <input type="text" name="password" value='.$p.'></p>
<input type="hidden" name="id" value='.$id.'>
<p><input type="submit" value="Update"/>
<a href="populateuser.php">Cancel</a></p>
</form>
  </div>
      </div>
</body>
</head>
');

}else {
		header('Location: index.php');
	return;
}
?>