<?php include ('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add a Product</h1>
        <br></br>

        <?php
         
         if(isset($_SESSION['upload']))
         {
           echo $_SESSION['upload'];
           unset($_SESSION['upload']);
         }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
           <table class="tbl-add">
               <tr>
                   <td>
                       Title
                   </td>
                   <td>
                       <input type="text" name="title">
                   </td>
               </tr>
               <tr>
                   <td>
                       Description
                   </td>
                   <td>
                       <textarea name="description" cols="40" rows="5" placeholder="Description of the product..."></textarea>
                   </td>
               </tr>
               <tr>
                   <td>
                       Price
                   </td>
                   <td>
                       <input type="number" name="price">
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
                           //display the dropdown
                       ?>
                    </select>
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
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                   </td>
               </tr>
               
               <tr>
                   <td colspan="2">
                       <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                   </td>
               </tr>
           </table>
           </form>
         
         <?php
           
           if(isset($_POST['submit']))
           {
                    //add products to DB

                    //get data from form
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];
                    if(isset($_POST['featured']))
                    {
                        $featured = $_POST['featured'];
                    }            
                    else
                    { 
                        $featured ="No";  
                    }

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }
                    else
                    {
                        $active = "No"; //Set Default value  
                    }

                    //upload an img if selected
                    if(isset($_FILES['image']['name']))
                    {
                       //.. then we will get the details
                       $image_name= $_FILES['image']['name'];
                       
                       //check if img is selected
                       if($image_name!="")
                       {
                           //..image is selected
                           //rename the img
                           //get the extension of selected img ie: png, jpg etc.
                           $ext = end(explode('.', $image_name));
                           
                           //create new name for img
                           $image_name = "product-name".rand(0000,9999).".".$ext;
                           
                           //then upload the img
                           //get the src path and destination path
                         
                           //source path
                           $src = $_FILES['image']['tmp_name'];
                           
                           //destination path
                           $dst = "../images/products/".$image_name;

                           //Finally upload the products img
                           $upload = move_uploaded_file($src, $dst);

                           //checking if it was uploaded

                           if($upload==false)
                           {
                               //failed to upload
                                
                               //redirect
                               $_SESSION['upload'] = "<div class='error'>Failed to upload the image.</div>";
                               header('location:'.SITEURL.'admin/add-product.php');  
                               //stop the process
                               die();
                           }
                        } 
                    }
                    else
                    {
                        $image_name = ""; //Setting the defaul value as blank
                    }

                    //Inset into the DB
                    //create sql query
                    $sql2 = "INSERT INTO products_table SET
                    title = '$title',
                    description = '$description',
                    price = $price, 
                    image_name ='$image_name',
                    category_ID = $category,
                    featured = '$featured',
                    active = '$active'
                    ";    
                     
                     //execute the query 
                     $res2 = mysqli_query($conn, $sql2);

                     if($res2==true)
                     {
                        $_SESSION['add'] = "<div class='success'>Product was added.</div>";
                        header('location:'.SITEURL.'admin/manage-products.php');
                     }
                     else
                     {
                        $_SESSION['add'] = "<div class='error'>Product was not added.</div>";
                        header('location:'.SITEURL.'admin/manage-products.php');
                     }
               }
           ?>
               
    </div>
</div>


</body>
</html>