<?php include "db.php" ?>

<?php include "register.php" ?>

<?php


$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["user_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	$check = getimagesize($_FILES["user_image"]["tmp_name"]);
	
    if($check !== false) {
       
        $uploadOk = 1;
	
    } else {
       
        $uploadOk = 0;
    }
	
	
	// Check if file already exists
if (file_exists($target_file)) {
    
    $uploadOk = 0;
}
// Check file size
if ($_FILES["user_image"]["size"] > 500000) {
   
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
	
	
   
	
		$image = $_FILES['user_image']['tmp_name'];
		$imgContent = addslashes(file_get_contents($image));
		
		move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file); 
       
		
function validate_data($data)
 {
	global $conn;
	
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn,$data);
  
  return $data;    
 }

 $name = validate_data( $_POST['user_name'] );
 $mobile = validate_data( $_POST['user_mobile'] );
 $email = validate_data( $_POST['user_email'] );
 $password = validate_data( $_POST['user_password'] );
 $city = validate_data( $_POST['user_city'] );
 $address = validate_data( $_POST['user_address'] );
 $gender = validate_data( $_POST['user_gender'] );
 $file = validate_data($imgContent);
 
 /*$name = $_POST['user_name'];
 $mobile = $_POST['user_mobile'] ;
 $email = $_POST['user_email'];
 $password =$_POST['user_password'];
 $city = $_POST['user_city'];
 $address = $_POST['user_address'];
 $gender = $_POST['user_gender'];*/
 
 $duplicate_query = mysqli_query($conn, "SELECT * FROM user_data WHERE user_email='".$email."'");
 $numrows = mysqli_num_rows($duplicate_query);
 if($numrows > 0)
 { 

	echo "This account already exists";
	
 }else{
		
		$insertdata="INSERT INTO user_data(user_name,user_mobile,user_email,user_password,user_city,user_address,user_gender,user_image) 
 VALUES('{$name}','{$mobile}','{$email}','{$password}','{$city}','{$address}','{$gender}','{$file}')";
 
 
 
 if(!$insertdata){
	 
	 die("Query failed: ".mysqli_error($connect));
 }
 else{
	 
 $result = mysqli_query($conn,$insertdata);
 
 
	
 }  
}
}

?>