<?php include ('partials/menu.php')?>

<?php

   if(isset($_GET['id']))
   {
       $id = $_GET['id'];

       $sql2 = "SELECT * FROM products_table WHERE id=$id";
       //execute the sql
       $res2 = mysqli_query($conn, $sql2);

       //get the values 
       $row2 = mysqli_fetch_assoc($res2);

       //get the indiviadual values
       $title = $row2['title'];
       $description = $row2['description'];
       $price = $row2['price'];
       $current_image = $row2['image_name'];
       $current_category = $row2['category_ID'];
       $featured = $row2['featured'];
       $active = $row2['active'];
    }
   else
   {
       header('location:'.SITEURL.'admin/manage-products.php');
   }

?>

<div class="main-content">
      <div class="wrapper">
          <h1>Update Products</h1>
          <br>
          </br>

          <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-add">
                 <tr>
                 <td>
                       Title
                   </td>
                   <td>
                       <input type="text" name="title" value="<?php echo $title; ?>">
                   </td>
               </tr>
               <tr>
                   <td>
                       Description
                   </td>
                   <td>
                       <textarea name="description" cols="40" rows="5" placeholder="Description of the product..."><?php echo $description; ?></textarea>
                   </td>
               </tr>
               <tr>
                   <td>
                       Price
                   </td>
                   <td>
                       <input type="number" name="price"value="<?php echo $price; ?>">
                   </td>
               </tr>
               <tr>
                   <td>
                      Current Image
                   </td>
                   <td>
                       <?php
                         if($current_image == "")
                         {
                            echo "<div class='error'>Image is not available.<div>";
                         }
                         else
                         {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/products/<?php echo $current_image; ?>" width="150px">
                            <?php
                         }
                       
                       ?> 
                   </td>
               </tr>
              
               <tr>
                   <td>
                      Select Image
                   </td>
                   <td>
                       <input type="file" name="image"> 
                   </td>
               </tr>
               <tr>
                   <td>
                       Category
                   </td>
                   <td>
                       <select name="category">
                           <?php
                           //php to display the categories from DB
                           //Get all active categories
                           $sql = "SELECT * FROM category_table WHERE active='Yes'";

                           //execute the sql
                           $res =mysqli_query($conn, $sql);

                           //count rows to check whether the categories are available 
                           $count = mysqli_num_rows($res);

                           //if the count is > 0 or we don't have categories
                           if ($count > 0)
                           {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $title = $row['title'];

                                    ?>
                                    
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    
                                    <?php
                                }
                           }
                           else
                           {
                                ?>
                                <option value="0">No categories Found.</option>
                                <?php
                           }
                       ?>
                    </select>
                   </td>
               </tr>
               
               <tr>
                   <td>
                       Featured
                   </td>
                   <td>
                       <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                       <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No"> No
                   </td>
               </tr>
               
               <tr>
                   <td>
                       Active
                   </td>
                   <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?>  type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No") {echo "checked";} ?>  type="radio" name="active" value="No"> No
                   </td>
               </tr>
               
               <tr>
                   <td colspan="2">
                       <input type="hidden" name="id" value="<?php echo $id; ?>">
                       <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                       <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                   </td>
                 </tr>
            </table>
           </form>

           <?php
           
              if(isset($_POST['submit']))
              {
                //get all the info from form 
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price']; 
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //upload the image if selected

                //check whether upload button is clicked or not 
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name!="")
                    {
                       //image is available
                       //rename the img
                       $ext = end(explode('.', $image_name));

                       $image_name = "product-name".rand(0000,9999).'.'.$ext;

                       //Get the source path and destination path
                       $src_path = $_FILES['image']['tmp_name'];//src path
                       $dest_path = "../images/products/".$image_name;//dest path

                       //upload the img
                       $upload = move_uploaded_file($src_path, $dest_path);

                       //check whether the img was uploaded
                       if($upload==false)
                       {
                           $_SESSION['upload'] = "<div class='error'>Image was not uploaded</div>";
                           //redirect
                           header('location:'.SITEURL.'admin/manage-products.php');
                           //stop the process
                           die();
                       }
                        //remove image if new is uploaded
                       if($current_image!="")
                        {
                            //remove the current img
                            $remove_path = "../images/products/".$current_image;
                        
                            $remove =unlink($remove_path);

                            //check whether the img is removed
                            if($remove==false)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to remove the image.</div>";
                                header('location:'.SITEURL.'admin/manage-products.php');
                                die();//Stops the process
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image;                               
                    } 
                }
                else
                {
                    $image_name = $current_image;   
                }

                //update the product in DB
                $sql3 = "UPDATE products_table SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        image_name ='$image_name',
                        category_ID = '$category',
                        featured = '$featured',
                        active = '$active'
                        WHERE id=$id
                        ";

                //execute the sql query
                $res3 = mysqli_query($conn, $sql3);
                
                //check whether if the query is executed
                if($res3==true)
                {
                   $_SESSION['update'] = "<div class='success'>Product was Updated!!</div>";
                   header('location:'.SITEURL.'admin/manage-products.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Product was not Updated!!</div>";
                    header('location:'.SITEURL.'admin/manage-products.php');
                }
            
              }
           
           ?>
      </div>    
</div>



</body>
</html>