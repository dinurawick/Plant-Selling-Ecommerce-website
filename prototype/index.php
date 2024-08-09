<?php include('config/constant.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantaholic | Right place for your plant addiction</title>
   
    <!------------------FONT AWESOME---------------->
    <script src="https://kit.fontawesome.com/fdeea92cf1.js" crossorigin="anonymous"></script>

  

    <link rel="stylesheet" href="edit.css">

</head>
<body>
   <div class="header">
      <div class="container">
         <div class="navbar">
            <div class="logo">
               <img src="images/god-removebg-preview.png" width="225px">
            </div>
               <nav>
                 <ul>
                   <li><a href="index.php">Home</a></li>
                   <li><a href="products.php">Products</a></li>
                   <li><a href="categories.php">Categories</a></li>
                   <a href="../logout.php">Logout</a>
                 </ul>
                </nav>
                
                <div class="icon">
                  <a href="" input="button"><i class="fas fa-shopping-cart" style="font-size: 25px;"></i></a>
                </div>
        </div>
        <section class="product-search text-center">
        
          <div class="container-1">
            
            <form action="product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for anything you like..." class="search-bar"  required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

          </div>

         </section>
                <div class="row">
                  <div class="col-2">
                      <h2 class="words">We have Orchids, Hoyas and more!</h2><br>
                      <p class="p1">Chlorophyll to fulfill the soul</p>
                      <a href="products.php" class="button">Explore &#10132;</a>  
                   </div>
                <div class="col-2">
                      <img src="images/hoya.png">
                </div>
            </div>
        </div>
    </div>


<?php
  if(isset($_SESSION['order']))
  {
    echo $_SESSION['order'];
    unset ($_SESSION['order']);

  }
?>  

<!---------featured categories ---------->
     
     <div class="categories">
          <div class="small-container">
            <div class="row">
              
            <?php
            
            $sql = "SELECT * FROM category_table WHERE active='Yes' AND featured='Yes'";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //count rows
            $count = mysqli_num_rows($res);

            if($count>0)
            {
               while($row=mysqli_fetch_assoc($res))
               {
                 $id = $row['id'];
                 $title = $row['title'];
                 $image_name = $row['image_name'];
                 ?>
                 <a href="<?php echo SITEURL; ?>products-category.php?category_ID=<?php echo $id; ?>">
                    <div class="col-3">
                        <?php
                              if($image_name=="")
                              {
                                echo "<div class='error'>Image not available.</div>";
                              } 
                              else
                              {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"alt="categories">
                                 <?php
                              }
                        ?>
                      <h3 style="text-align: center; font-weight:lighter;"><?php echo $title; ?></h3>
                    </div>
                 </a>
                 <?php
               }
            }
            else
            {
               echo "<div class='error'>Category was not found.</div>";
            }
            
            ?> 
            </div>
          </div>
       </div> 
<!---------featured products ---------->
                  <section class="products">
                        <div class="container-1">
                            <h2 class="text-center">Featured Products</h2>
                         
                          <?php
            
                                        $sql2 = "SELECT * FROM products_table WHERE active='Yes' AND featured='Yes' LIMIT 4";

                                        //execute the query
                                        $res2 = mysqli_query($conn, $sql2);

                                        //count rows
                                        $count2 = mysqli_num_rows($res2);

                                        if($count2>0)
                                        {
                                          while($row=mysqli_fetch_assoc($res2))
                                          {
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            $price = $row['price'];
                                            $description = $row['description'];
                                            $image_name = $row['image_name'];
                                            ?>
                                                <div class="products-box">
                                                      <div class="products-img">
                                                        <?php
                                                           if($image_name=="")
                                                           {
                                                             echo "<div class='error'>Image not available</div>";
                                                           }
                                                           else
                                                           {
                                                             ?>
                                                            <img src="<?php echo SITEURL;?>images/products/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                                            <?php 
                                                          }
                                                        ?>
                                                          
                                                      </div>

                                                      <div class="products-desc">
                                                          <h4><?php echo $title; ?></h4>
                                                          <p class="products-price">Rs. <?php echo $price; ?></p>
                                                          <p class="products-detail">
                                                          <?php echo $description; ?>
                                                          </p>
                                                          <br>
                                                          <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="button4">Add to Cart</a>
                                                      </div>
                                                  </div>
                                                
                                            <?php
                                          }
                                        }
                                        else
                                        {
                                          echo "<div class='error'>Category was not found.</div>";
                                        }
                                        
                              ?> 

                            <div class="clearfix"></div>
                        </div>

                        <p class="text-center">
                        </p>
                    </section>

       
               
<!--------------------Indoor--------------------->
           <div class="container2">
               <div class="row2">
                    <div class="col-5">
                        <h2 class="words2">Do you like Oxygen?<br>It's great stuff for inside the box thinking.</h2>
                        <p class="p2">Some indoor plants would be right up your alley</p>
                        <a href="products.php" class="button2">Indoor Plants</a>  
                    </div>
                    <div class="col-5">
                        <img src="images/indoor.jpg">
                    </div>
                </div>
            </div>

<!----------------------FOOTER---------------------->

<div class="footer">
  <div class="container">
   <div class="row">
     <div class="col-4">
       <h3>Social</h3>
       <a href="">Instagram</a><br>
       <a href="">Facebook</a><br>
       <a href="">Twitter</a><br>
       <a href="">Pintrest</a><br>
     </div>
     <div class="col-4">
       <h3>Company</h3>
       <a href="">Privacy Policy</a><br>
       <a href="">Return Policy</a>
       <a href="">Our Guarantee</a><br>
       <a href="">About Us</a><br>
       <a href="">Contact Us</a><br>
     </div>
   </div> 
  </div>
</div>
</body>
</html>