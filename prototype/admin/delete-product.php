<?php

   include ('../config/constant.php');

   if(isset($_GET['id']) && isset($_GET['image_name']))
   {
      //delete the product

      //get the id and img name
      $id = $_GET['id'];
      $image_name = $_GET['image_name'];

      //remove the img if available
      if($image_name!="")
      {
          //remove from folder
          //get the path
          $path = "../images/products/".$image_name;
          //remove img from folder
          $remove = unlink($path);  

          //check if the img is removed
          if($remove==false)
            {
               //set the session
               $_SESSION['upload'] = "<div class='error'>Failed to remove image.</div>";

               header('location:'.SITEURL.'admin/manage-products.php');
               //Stop the process
               die();

            }

      }

      //delete product from db 

      $sql = "DELETE FROM products_table WHERE id=$id";
      //execute the query 
      $res = mysqli_query($conn, $sql);

      //check if the query executed
      if($res==true)
      {
        $_SESSION['delete'] = "<div class='success'>Product deleted sucessfully!</div>";
        //redirect  
        header('location:'.SITEURL.'admin/manage-products.php');
      }
      else
      {
        $_SESSION['unauthorized'] = "<div class='error'>Failed to delete product.</div>";
        //redirect
        header('location:'.SITEURL.'admin/manage-products.php');
 
      }
      //redirect to manage product page with session msg
      
   }
   else
   {
      //redirectt to manage food page
      $_SESSION['delete'] = "<div class='error'>Access Unauthorized!</div>";
      header('location:'.SITEURL.'admin/manage-products.php');
   }


?>