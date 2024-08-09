<?php include('partials-frontend/menu.php')?>

<!---------------------Products----------------------->

<section class="products">
                        <div class="container-1">
                            <h2 class="text-center">Indoor & Outdoor Plants</h2>
                         
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

<!----------------------FOOTER---------------------->
<?php include('partials-frontend/footer.php')?>