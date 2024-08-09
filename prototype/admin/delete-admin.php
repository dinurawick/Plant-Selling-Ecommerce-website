<?php
include('../config/constant.php');

//Deleting the admin's ID 
$id = $_GET['id'];

// Create SQL Query to delete the admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// Redirect To manage admin page 
$res =  mysqli_query($conn, $sql);

//Check whether query executed sucessfully or not
if($res==true)
{
    //echo "admin has been deleted";
    $_SESSION['delete'] = "<div class='success'>Admin was deleted Sucessfully.</div>";
    //Redirect to Admin Page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //echo "Failed to delete Admin";
    $_SESSION['delete'] = "<div class='error'>Admin was not deleted.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}

?>

