<?php
//Include Constants File 
include('config/constants.php');
//echo "Delete Page"; 
//Check whether the id and image_name value is set or not 
if(isset($_GET['id']) AND isset($_GET['image_name'])) 
{
$id= $_GET['id'];
$image_name= $_GET['image_name'];
//Remove the physical image file is available 
if($image_name != "")
{
//Image is Available. So remove it 
$path="../images/category/".$image_name;
//REmove the Image 
$remove= unlink($path);
//IF failed to remove image then add an error message and sto 
if($remove==false)
{
$_SESSION['remove']="<div class='error'>Failed To Remove Category Image.</div>";
header('location:'.SITEURL.'admin/manage-category.php');
die();
}
}
$sql="DELETE FROM tbl_category WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
    $_SESSION['delete']="<div class='success'>Category Deleted Successfully.</div>";
    header('location:'.SITEURL.'admin/manage-category.php');
}
else
{
    $_SESSION['delete']="<div class='error;>Failed To Delete Category</div>";
    header('location:'.SITEURL.'admin/manage-category.php');  
}
}
else
{
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>