<?php
//Include Constants File 
include('config/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])) 
{
$id= $_GET['id'];
$image_name= $_GET['image_name'];
//Remove the physical image file is available 
if($image_name != "")
{
//Image is Available. So remove it 
$path = "../images/food/".$image_name;
//REmove the Image 
$remove= unlink($path);
//IF failed to remove image then add an error message and sto 
if($remove==false)
{
$_SESSION['upload']="<div class='error'>Failed To Remove Image.</div>";
header('location:'.SITEURL.'admin/manage-food.php');
die();
}
}
$sql="DELETE FROM tbl_food WHERE id=$id";
$res=mysqli_query($conn, $sql);
if($res==true)
{
    $_SESSION['delete']="<div class='success'>Food Deleted Successfully.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
else
{
    $_SESSION['delete']="<div class='error';>Failed To Delete Food</div>";
    header('location:'.SITEURL.'admin/manage-food.php');  
}
}
else
{
    $_SESSION['unauthorize']="<div class='error';>Unauthorize Acces</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>