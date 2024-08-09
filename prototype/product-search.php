<?php include('partials-frontend/menu.php')?>
    <section class="product-search text-center">
        <div class="container-1">

        <?php
            //Get the search keyword
             $search = $_POST['search'];
        ?>
  
          <h2>Your Searched for... <a href="" style="color: black; font-size:25px;">"<?php echo $search; ?>"</a></h2> 

        </div>
    </section> 


    <section class="products">
      <div class="container-1">

        <?php
         
        //Get the search keyword
        $search = $_POST['search'];

        //sql query 
        $sql = "SELECT * FROM products_table WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        
        //execute query
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);

        //check if the product is available
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
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
                            <a href="" class="button4">Add to Cart</a>
                        </div>
                    </div>
                <?php
            }
            
        }
        else
        {
            echo "<div class='error'>Product was not found</div>";
        }
        ?>
   
   <div class="clearfix"></div>
    </div>

    <p class="text-center">
    </p>
</section>
<?php include('partials-frontend/footer.php')?>