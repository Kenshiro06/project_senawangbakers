<?php 
    //$DATABASE_HOST = 'localhost';
	//$DATABASE_USER = 'root';
	//$DATABASE_PASS = '';
	//$DATABASE_NAME = 'dbmentor';
	//$db = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
	include 'config.php';
   //session_start();
   
      //if (mysqli_connect_errno($db)){
     // echo "Failed to connect to MySQL: " . mysqli_connect_error();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($link,$_POST['username']);
      $mypassword = mysqli_real_escape_string($link,$_POST['password']); 
      
      $sql = "SELECT * FROM tbllogin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("$myusername");
         //$_SESSION['login_user'] = $myusername;
         
         header("location: newMain.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
