<?php include('config/constants.php'); ?>

<html>
<head>
<title>Login- Food Order System</title>

</head>
<style>

	* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error{
                        
  text=align:center;
  padding: 2%;
  color: #ff6b81;
    }
  .success{
   text=align:center;
    padding: 2%;
  color: #2ed573;
  }
</style>
<b><h1 style="color:#ff6b81;font-size:70px;text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome To Admin Panel&nbsp;&nbsp;&nbsp;&nbsp; <width="128" height="128"></h1></b>
<body>
<div class="header">
    <h1 style="color:black;font-size:50px;text-align:center;">Login</h1>
</div>
</br></br>
    <?php
       if(isset($_SESSION['login']))
          {
            echo$_SESSION['login'];
            unset($_SESSION['login']);
          }
            if(isset($_SESSION['no-login-message']))
             {
               echo $_SESSION['no-login-message'];
               unset($_SESSION['no-login-message']);
             }
      ?>
        </br></br>
       <!--Login Form Starts Here-->
        <form action="" method="POST" class="text-center">
        <div class="input-group">
  		<label><b>Username</b></label>
  		<input type="text" name="username" >
  	</div>
    <div class="input-group">
  		<label><b>Password</b></label>
  		<input type="password" name="password">
  	</div>
    <div class="input-group">
           <input type="submit" class="btn" name="submit" value="Login">
            </div> 
            <h5 style="color:black;text-align:center;">Created By =Arin & Abhay</h5>

</h5>
          </br></br>
</form>
       <!--Login Form Ends Here-->
</div>
</body>
</html>
<?php

   //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
     {
       //process for login
       // get data from login form
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $raw_password = md5($_POST['password']);
       $password = mysqli_real_escape_string($conn, $raw_password);

       //sql to check whether the username and password exist or not
         $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
         
       //execute the query
         $res = mysqli_query($conn, $sql);

       //count rows to check whether the user exist or not
         $count = mysqli_num_rows($res);
         
         if($count==1)
         {
           //user available and login success
             $_SESSION['login'] = "<div class='success'>Login Successful</div>";
             $_SESSION['user'] = $username;
           // redirect to home page
             header('location:'.SITEURL.'admin/');
         }
         else
         {
               //user not available and login failed
     $_SESSION['login'] = "<div class='error'>Username or Password did not match</div>";
           // redirect to home page
             header('location:'.SITEURL.'admin/login.php');
         }

   } 
?>