
<?php include "db.php" ?>

<?php  
session_start();//session starts here  
  
?>  


<!DOCTYPE html>

<html>

<head>

<title>Task</title>

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

</head>



<body>

<div class="container">



<form class="col-sm-offset-3 col-sm-6" method="POST">

<h3>Login</h3><br>

	<div class="form-group">
	<label>Email id</label>
	<input type="text" name="user_email" id="user_email" class="form-control input-sm">
	</div>
	
	<div class="form-group">
	<label>Password</label>
	<input type="password" name="user_password" id="user_password" class="form-control input-sm">
	</div>

	<div class="form-group text-center">
						
	<button type="submit" name="login" id="login" class="btn btn-primary">Login</button>
	<button id="rstbtnlogin" type="reset" class="btn btn-danger">Reset</button>
							
	<hr>
	<p><a href="register.php"><u>Don't have an account? Create one!<u></a></p>
						
	</div>
	
<!--New user Register Link -->

</form>

<script>

$(document).ready(function(){

 $("#rstbtnlogin").click(function(){	
 
 $("#user_email").val("");
 $("#user_password").val("");
 
	
 });	
	
});

</script>

<?php
if(isset($_POST["login"])){
 
 $user_email = $_POST['user_email'];
 $user_password = $_POST['user_password'];
 
 $user_email = mysqli_real_escape_string($conn,$user_email);
$user_password = mysqli_real_escape_string($conn,$user_password);
 
 //Selecting database
 $matchQuery = "SELECT * FROM user_data WHERE user_email='{$user_email}' AND user_password='{$user_password}'";
 $matchResult = mysqli_query($conn,$matchQuery);
 $numrows = mysqli_num_rows($matchResult);
 if($numrows !=0)
 {
 while($row = mysqli_fetch_assoc($matchResult))
 {
 $dbuser_name=$row['user_name'];
 $dbuser_email=$row['user_email'];
 $dbuser_password=$row['user_password'];
 }
 if($user_email == $dbuser_email && $user_password == $dbuser_password)
 {
$_SESSION['user_name'] = $dbuser_name;
$_SESSION['user_email'] = $dbuser_email;
 //Redirect Browser
 header("Location:welcome.php");
 }
 }

 else
 {
 echo "Invalid Username or Password!";
 }
 }
 

?>

</div>

</body>
</html>