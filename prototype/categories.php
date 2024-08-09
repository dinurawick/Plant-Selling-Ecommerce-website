<?php include('partials-frontend/menu.php')?>


<div class="categories">
          <div class="small-container">
            <div class="row">
              
            <?php
            
            $sql = "SELECT * FROM category_table WHERE active='Yes'";

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
                 <a href="categories.php">
                    <div class="col-3">
                        <?php
                              if($image_name=="")
                              {
                                 echo "<div class='error'>Image not available.</div>";
                              } 
                              else
                              {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>"alt="">
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


<?php include('partials-frontend/footer.php')?>