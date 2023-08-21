<?php include('partials/menu.php'); ?>
<div class="main-content"> <div class="wrapper"> <h1>Add Category</h1>
<br><br>
<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>
<!-- Add Category Form Starts --> 
<form action="" method="POST" enctype="multipart/form-data">
<table class="tbl-30">
<tr>
<td>Title: </td>
<td>
<input type="text" name="title" placeholder="Category Title">
</td>
</tr>
<td>Select Image: </td>
<td>
<input type="file" name="image"> 
</td>
</tr>
<tr>
<td>Featured: </td>
<td>
<input type="radio" name="featured" value="Yes"> Yes 
<input type="radio" name="featured" value="No"> No
</td>
</tr>
<tr>
<td>Active: </td>
<td>
<input type="radio" name="active" value="Yes"> Yes 
<input type="radio" name="active" value="No"> No
</td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
</td>
</tr>
</table>
</form>
<?php
//CHeck whether the Submit Button is clicked or Not 
if(isset($_POST['submit']))
{
$title= $_POST['title'];
//For Radio input, we need to check whether the button is selected or not 
if(isset($_POST['featured']))
{
    //Get the Value from form 
    $featured= $_POST['featured'];
} 
    else
    {
    //Set the Default Value
     $featured="No";
    }
    if(isset($_POST['active']))
{  
    $active= $_POST['active'];
} 
    else
    {
     $active="No";
    }
    if(isset($_FILES['image']['name']))
    {
        $image_name=$_FILES['image']['name'];
        if($image_name!="")
        {

        $ext=end(explode('.',$image_name));
        $image_name="Food_Category_".rand(000,999).'.'.$ext;

        $source_path=$_FILES['image']['tmp_name'];
        $destination_path="../images/category/".$image_name;
    $upload=move_uploaded_file($source_path,$destination_path);
    if($upload==false)
    {
        $_SESSION['upload']="<div class='error'> Failed To Upload Image.</div>";
        header('location:'.SITEURL.'admin/add-category.php');
        die();
    }
    }
}
    else
    {
        $image_name="";
    }
    //2. Create SQL Query to Insert Category into Database 
    $sql = "INSERT INTO tbl_category SET 
    title='$title', 
    image_name='$image_name',
    featured='$featured', 
    active='$active'
";
//3. Execute the Query and Save in Database 
$res= mysqli_query($conn, $sql);
//4. Check whether the query executed or not and data added or not 
if($res==true)
{
//Query Executed and Category Added
$_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>"; 
//Redirect to Manage Category Page 
header('location:'.SITEURL. 'admin/manage-category.php');
}
else
{
//Failed to Add Category
$_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>"; 
//Redirect to Manage Category Page 
header('location:' .SITEURL. 'admin/add-category.php'); 
}
}
?>
</div>
</div>
<?php include('partials/footer.php');?>