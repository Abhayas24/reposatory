<?php include('partials/menu.php'); ?>
<div class="main-content"> <div class="wrapper">
<h1>Add Admin</h1>
<br> <br>
<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
?>
<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>Full Name: </td>
<td>
    <input type="text" name="full_name" placeholder="Enter Your Name"></td>
</tr>
<tr>
<td>Username: </td>
<td>
<input type="text" name="username" placeholder="Your Username"></td>
</td>
</tr>
<tr>
<td>Password: </td>
<td>
<input type="password" name="password" placeholder="Your Password"></td>
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
</td>
</tr>
</table>
</form>

<?php include('partials/footer.php'); ?>

<?php
   //Process the Value from Form and Save it in Database
   //Check whether the submit button is clicked or not
if(isset($_POST['submit']))
 {
   //Button Clicked 
   //echo "Button clicked";
   // Get the data from form
   $full_name=$_POST['full_name'];
   $username=$_POST['username'];
   $password=md5($_POST['password']);// Password encryption with MD5

   //SQl query to save data in the database
   //2. SQL Query to Save the data into database

$sql = "INSERT INTO tbl_admin SET
full_name='$full_name',
username='$username',
password='$password'
";

//3. Executing Query and Saving Data into Database

$res = mysqli_query($conn, $sql) or die(mysqli_error());

//4. Check whether the (Query is Executed) data is inserted or not and display appropriate message if($res=TRUE)
if($res==TRUE)
{
//Data Inserted
//echo "Data Inserted";
//Create a session variable to display message
$_SESSION['add']= "Admin Added Successfully";
//Redirect Page To Manage admin
header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
//FAiled to Insert DAta 
//echo "Faile to Insert Data";
//Create a session variable to display message
$_SESSION['add']= "Failed To Add Admin";
//Redirect Page To Manage admin
header("location:".SITEURL.'admin/manage-admin.php');
}
 }
?>