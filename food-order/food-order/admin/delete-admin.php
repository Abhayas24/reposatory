<?php
include('""/config/constants.php');
$id=$_GET['id'];
$sql="DELETE FROM tbl_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
//echo "Admin Deleted";
$_SESSION['delete']="Admin Deleted Successfully";
header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
//echo "Admin Not Deleted";
$_SESSION['delete']="Failed To Delete";
header('location:'.SITEURL.'admin/manage-admin.php');
}
?>