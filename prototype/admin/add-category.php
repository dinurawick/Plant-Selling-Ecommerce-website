<?php include( 'partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br></br>

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
        <!-----Add Cate Start------->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-add">
                <tr>
                    <td>
                        Title
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title ">
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
                        Featured
                    </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                        Active
                    </td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
                </tr>
            </table>
        </form>

        <?php
        
             if(isset($_POST['submit']))
             {
                
                $title = $_POST['title'];
                 
                if(isset($_POST['featured']))
                {
                    //Getting the alue from the form 
                    $featured = $_POST['featured'];
                }
                else
                {
                     //Set the default value 
                     $featured = "No";
                }
                if(isset($_POST['active']))
                {
                    //Getting the alue from the form 
                    $active = $_POST['active'];
                }
                else
                {
                     //Set the default value 
                     $active = "No";
                }

                //Checking if the image was added or not
                //print_r($_FILES['image']);

                //die();//To Break the code
                if(isset($_FILES['image']['name']))
                {
                   //Uploading the image
                   $image_name = $_FILES['image']['name'];

                   if($image_name != "")
                   {

                        //Auto renaming the img

                        //First getting the extension ie: png, jpg, etc.
                        $ext = end(explode('.', $image_name));

                        //Rename the img
                        $image_name = "plant-".rand(000,999).'.'.$ext;                        

                        $source_name = $_FILES['image']['tmp_name'];
                        
                        $destination_path = "../images/category/".$image_name;

                        //Uploading
                        $upload =move_uploaded_file($source_name, $destination_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'> Failed to upload image.</div>";
                            header('location:'.SITEURL.'admin/add-category.php');
                            die();
                        }
                 }
                }
                else
                {
                    //Wont upload 
                    $image_name="";
                }
              
                //Creat SQL query to insert category into DB
                $sql = "INSERT into category_table SET
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'
                ";
                
                //Execute the Query and save in DB
                $res = mysqli_query($conn, $sql);
                
                // Check whether the query is executed or not 

                if($res==true)
                {
                    //query executed
                    $_SESSION['add'] = "Succssfully Added.";

                    //redirect to manage cate page

                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //Query Failed to add Category
                    
                    
                    $_SESSION['add'] = "Failed to add.";

                    //redirect to manage cate page

                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }

        ?>
        <!-----Add Cate ends------->
    </div>
</div>

</body>
</html>