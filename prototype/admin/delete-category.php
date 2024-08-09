<?php
     include('../config/constant.php');
     
     if(isset($_GET['id']) AND isset($_GET['image_name']))
     {
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        //Remove the physical file from folder
         if($image_name != "")
        {
            //image is available so remove it
            $path = "../images/category/".$image_name;
            //remove img
            $remove = unlink($path);
 
            //if the img was not removed, error msg 
            if($remove==false)
            {
               //set the session
               $_SESSION['remove'] = "<div class='error'>Failed to remove image.</div>";

               header('location:'.SITEURL.'admin/manage-category.php');
               //Stop the process
               die();

            }

        }
        
        //Delet data from the DB
        $sql = "DELETE FROM category_table WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether or not the data was deleted
        if($res==true)
        {
           $_SESSION['delete'] = "<div class='success'>Category Deleted!</div>";
           //redirect
           header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Category was not Deleted.</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-category.php');             
        }
     }
     else
     {
        //Redirect to manage category page 
        header('location:'.SITEURL.'admin/manage-category.php');
     }

?>