<?php include ('partials/menu.php')?>

      <div class="main-content">
         <div class="wrapper">
             <h1>Update the Category</h1>
             <br></br>
            
            <?php
                if(isset($_GET['id']))
                {
                  //echo "Getting the data";
                  $id = $_GET['id'];
                  //SQL query to the get the details
                  $sql = "SELECT * FROM category_table WHERE id=$id";
                  
                  //execute the query
                  $res = mysqli_query($conn, $sql);
                  
                  //count the rows to check the id is valid
                  $count = mysqli_num_rows($res);
                  
                  if($count==1)
                  {
                    // Get the data 
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                  }
                  else
                  {
                      //redirect to manage category
                      $_SESSION['no-category-found'] = "<div class'error'>Category was not updated.</div>";
                      header('location:'.SITEURL.'admin/manage-category.php');

                    }
                }
                else
                {
                   $_SESSION['no-category-found'] = "<div class='error'> Failed to upload image.</div>";
                   header('location:'.SITEURL.'admin/manage-category.php');
                }
            ?>


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
                            Current Image
                        </td>
                           
                        <td>
                            <?php
                                 if($current_image != "")
                                 {
                                     //display the img
                                     ?>
                                     <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width= "150px" alt="">
                                     <?php
                                 }
                            
                            
                            ?>   
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Select New Image
                        </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Featured
                        </td>
                        <td>
                            <input <?php if($featured=="Yes") {echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                        
                            <input <?php if($featured=="No") {echo "checked";}?> type="radio" name="featured" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Active
                        </td>
                    <td>
                        <input <?php if($active=="Yes") {echo "checked";} ?>  type="radio" name="active" value="Yes">Yes

                        <input <?php if($active=="No") {echo "checked";} ?>  type="radio" name="active" value="No">No
                    </td>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                        </td>
                    </tr>
                    </tr>
                </table>
            </form>
              <?php
              
                     if(isset($_POST['submit']))
                     {
                        $id = $_POST['id'];         
                        $title = $_POST['title'];
                        $current_image = $_POST['current_image'];
                        $featured = $_POST['featured'];
                        $active = $_POST['active'];
                        
                        //update new img
                        //check if a img is selected or not
                        if(isset($_FILES['image']['name']))
                        {
                            $image_name = $_FILES['image'] ['name'];

                            //check if the img is available
                            if($image_name !="")
                            {
                                //upload new img          
                                    //Auto renaming the img
                                    //First getting the extension ie: png, jpg, etc.
                                    $ext = end(explode('.', $image_name));

                                    //Rename the img
                                    $image_name = "plant-".rand(000,999).'.'.$ext;

                                    $source_name = $_FILES['image']['tmp_name'];
                                    
                                    $destination_path = "../images/category/".$image_name;

                                    //Uploading
                                    $upload = move_uploaded_file($source_name, $destination_path);

                                    if($upload==false)
                                    {
                                        $_SESSION['upload'] = "<div class='error'> Failed to upload image.</div>";
                                        header('location:'.SITEURL.'admin/manage-category.php');
                                        die();
                                    }

                                    if($current_image!="")
                                    {

                                        //remove the current img
                                        $remove_path = "../images/category/".$current_image;
                                    
                                        $remove =unlink($remove_path);

                                        //check whether the img is removed
                                        if($remove==false)
                                        {
                                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove the image.</div>";
                                            header('location:'.SITEURL.'admin/manage-category.php');
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
                        //update the DB
                        $sql2 = "UPDATE category_table SET
                        title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active'
                        WHERE id=$id
                        ";

                        //execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        //redirect to manage category
                        if($res2==true)
                        {
                            $_SESSION['update'] = "<div class='success'>Category Updated</div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                        } 
                        else
                        {

                            $_SESSION['update'] = "<div class='error'>Category was not Updated</div>";
                            header('location:'.SITEURL.'admin/manage-category');
                        }
                    }
              
              ?>
         </div>
      </div>
</body>
</html>