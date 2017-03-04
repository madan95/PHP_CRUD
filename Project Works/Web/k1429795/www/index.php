<?php
session_start();

require_once "connection.php";
$emailErr = $passwordErr = "";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
if(empty($_POST['email'])){
		$emailErr = " Email is Required";
	}else {
		$email = htmlentities($_POST["email"]);
		 // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
	}else{
	if (empty($_POST['password'])){
		$passwordErr = " Password Cannot be Empty";
	}
else {
if(isset($_POST['email'])&& isset($_POST['password'])){
	unset($_SESSION["account"]);
	
    $sql = "SELECT name, id, usertype FROM users
        WHERE email = :em AND password = :pw";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':em' => htmlentities($_POST['email']), 
        ':pw' => hash("MD5", htmlentities($_POST['password']))));
		
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	if($row==FALSE){
		$_SESSION["error"]= "Wrong username or password.";
		header('Location: index.php');
		return;
	}else{
		if($row['id']==1){
			$_SESSION['id']=1;
			$_SESSION['admin']=TRUE;
			header('Location: populateuser.php');
			return;
		}else{
	    $_SESSION["usertype"]=$row['usertype'];
		$_SESSION["success"]="Logged in.";
		$_SESSION["name"]=$row['name'];
		$_SESSION["id"]=$row['id'];
		$_SESSION["email"]=$row['email'];
		header('Location: home.php');
        return;
		}
	}

}
}
	}
	}
}

?>
<!DOCTYPE html>
<html>
<head>

     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>LMS</title>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
</head>
<style>
.error {color :#FF0000;}
body {
      background-image:url("images/f.jpg");
      background-repeat:no-repeat;
      background-size:cover;
      
}
</style>
</div>

<div class="container">     
     
  <center><img src="images\university.jpg" class="img-responsive"></center>
</div>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">            
            <img src="images\unilogo1.jpg" class="img-responsive" align="right" width="150" height="50" />
            <br>
            <br>
            <br>

            <h3 class="text-center"><i><b>L</b>earning <b>M</b>anagement <b>S</b>ystem</i></h3>
                        </div>
			

            			<?php
					    if ( isset($_SESSION["error"]) ) {
        echo('<p style="color:red">'.
             $_SESSION["error"]."</p>\n");
        unset($_SESSION["error"]);
    }
	if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

echo('
            <div class"modal-body">
                <form class="col-md-12 center-block" method="post" >
                     <div class="form-group">
                         <br>
                         <input type="text" class="form-control input-lg" placeholder="Email" name="email" >
						 <span class="error">*'.$emailErr.'</span>
                             <input type="password" class="form-control input-lg" placeholder="Password" name="password">
 <span class="error">*'.$passwordErr.'</span>                               
							   <input type="submit" class="btn btn-block btn-lg btn-primary" value="Login">
                           </div>
                                 </form>
                                 <div class="modal-footer">
                                     <div class="col-md-17">
                                      
                                     </div>
                                 </div>

</body>

</html>
');
?>