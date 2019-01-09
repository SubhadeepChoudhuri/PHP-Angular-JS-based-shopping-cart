

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






<script type="text/javascript">
		
			function validate()
			{
			
				//step1: fetch the value of respective textboxes
				//and store it in to respective variables
				
				
				
				var name = document.getElementById("user_name").value.trim();
				
				if(name=="")
				{
				
						
						
						document.getElementById("user_name").style.borderColor="red";
						document.getElementById("nameerror").innerHTML="Invalid Name";
						
					return false;	
						
						
						
				}else{
				
						document.getElementById("user_name").style.borderColor="";
						document.getElementById("nameerror").innerHTML="";
				}
				//name validation end here
				
				var mobile = document.getElementById("user_mobile").value.trim();
				
				if((mobile=="") || (mobile.length !=10) || (isNaN(mobile)))
				{
				
						
						
						document.getElementById("user_mobile").style.borderColor="red";
						document.getElementById("mobileerror").innerHTML="Invalid Mobile no";
						
						return false;
						
				}else{
				
						document.getElementById("user_mobile").style.borderColor="";
						document.getElementById("mobileerror").innerHTML="";
				}
				//mobile no validation end here
				
				var email = document.getElementById("user_email").value.trim();
				
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if((email=="") || (!filter.test(email)))
				{
				
						
						
						document.getElementById("user_email").style.borderColor="red";
						document.getElementById("user_email").innerHTML="Invalid Email";
						
					return false;	
						
				}else{
				
						document.getElementById("user_email").style.borderColor="";
						document.getElementById("emailerror").innerHTML="";
				}
				//email validation end here
				
				var password = document.getElementById("user_password").value.trim();
				
				if(password=="")
				{
				
						
						
						document.getElementById("user_password").style.borderColor="red";
						document.getElementById("passworderror").innerHTML="Invalid Password";
						
					return false;	
						
				}else{
				
						document.getElementById("user_password").style.borderColor="";
						document.getElementById("passworderror").innerHTML="";
				}
				//password validation end here
				
				var city = document.getElementById("user_city").value.trim();
				
				if(city=="")
				{
				
						
						
						document.getElementById("user_city").style.borderColor="red";
						document.getElementById("cityerror").innerHTML="Invalid City";
						
					return false;	
						
				}else{
				
						document.getElementById("user_city").style.borderColor="";
						document.getElementById("cityerror").innerHTML="";
				}
				//city validation end here
				
				var address = document.getElementById("user_address").value.trim();
				
				if(address=="")
				{
				
						
						
						document.getElementById("user_address").style.borderColor="red";
						document.getElementById("addresserror").innerHTML="Invalid Address";
						
					return false;
					
				}else{
				
						document.getElementById("user_address").style.borderColor="";
						document.getElementById("addresserror").innerHTML="";
				}
				//address validation end here
				
				var gender1 = document.getElementById("male").checked;
				var gender2 = document.getElementById("female").checked;
				
				if(gender1 == false && gender2 == false)
				{
				
						
					
						document.getElementById("gendererror").innerHTML="<br>Please Select gender";
						
						return false;
			
						
				}else{
				
						document.getElementById("gendererror").innerHTML="";
				}
				//gender validation end here
				
				/*var image_name = $('#user_image').val(); 
				var extension = $('#user_image').val().split('.').pop().toLowerCase();  
				
           if(image_name == "")  
           {  
				
				status = false;
				
				document.getElementById("imageerror").innerHTML="<br>Please Select Image";
               
               
           }

			
                else if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
			
					status = false;
					
                     document.getElementById("imagerror").innerHTML="<br>Invalid Image type";
                     $('#user_image').val('');  
                     
                }  */
				
			
			var tnc = document.getElementById("tnc").checked;
				
				if(tnc==false)
				{
				
						
						
						
						document.getElementById("tncerror").innerHTML="<br>Please Select";
						
					return false;
						
				}else{
				
						document.getElementById("tncerror").innerHTML="";
				}
				//tnc validation end here
				
	
			
			
			}
	
		</script>
</head>

<body>

<div class="container">

<form class="col-sm-offset-3 col-sm-6" method="POST" action="insertdata.php" enctype="multipart/form-data" onsubmit="return validate()">

<h3>Register</h3><br>

	<div class="form-group">
	<label>Full Name</label>
	<input type="text" name="user_name" id="user_name" class="form-control input-sm">
	<i id="nameerror"></i>
	</div>
	
	<div class="form-group">
	<label>Mobile No</label>
	<input type="text" name="user_mobile" id="user_mobile" class="form-control input-sm" maxlength="10">
	<i id="mobileerror"></i>
	</div>	
	
	<div class="form-group">
	<label>E-Email</label>
	<input type="text" name="user_email" id="user_email" class="form-control input-sm">
	<i id="emailerror"></i>
	</div>
	
	<div class="form-group">
	<label>Password</label>
	<input type="password" name="user_password" id="user_password" class="form-control input-sm">
	<i id="passworderror"></i>
	</div>
		
		<div class="form-group">
			<label>City</label>
			<select class="form-control input-sm" name="user_city" id="user_city">
				<option value="">Choose City</option>
				<option value="bangalore">Bangalore</option>
				<option value="pune">Pune</option>
				<option value="mumbai">Mumbai</option>
			</select>
			<i id="cityerror"></i>
		</div>
		
	<div class="form-group">
	<label>Address</label>
	<textarea class="form-control" name="user_address" id="user_address"></textarea>
	<i id="addresserror"></i>
	</div>
	
	<div class="form-group">
	<label>Gender:</label>
	<input type="radio" name="user_gender" value="male">Male
<input type="radio" name="user_gender" value="female">Female
	<i id="gendererror"></i>
	</div>
	
	<!--<div class="form-group">
	<label>Select image to upload:</label> 
    <input type="file" name="user_image" id="user_image">
	<i id="imageerror"></i>
	</div>-->
	
	<div class="form-group">
	<label>T&C </label>
	<input type="checkbox" id="tnc"/>
	I agree
	<i id="tncerror"></i>
	</div>
	
	
						<div class="form-group text-center">
						
							<button type="submit" name="register" id="register" class="btn btn-primary">Register</button>
							<!--<button id="rstbtnregister" type="reset" class="btn btn-danger">Reset</button>-->
							
							<hr>
							<a href="login.php"><u>Login<u></a>
						
						</div>
						
						</form>
			
	<script>
/*	$(document).ready(function(){

 $("#rstbtnregister").click(function(){	
 
 $("#user_name").val("");
 $("#user_mobile").val("");
 $("#user_email").val("");
 $("#user_password").val("");
 $("#user_city").val("");
 $("#user_address").val("");
 $("#user_gender").val("");
 $("#user_image").val("");
 $("#tnc").val("");
	
 });	
	
});*/

</script>

</div>

<br><br>

</body>

</html>

		
		  
		 
		  
	

