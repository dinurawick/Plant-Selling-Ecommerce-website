<?php include('partials-frontend//menu.php') ?>
<!-- Navbar Section Starts Here -->
<?php
//product_id set
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM products_table WHERE id=$product_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    }     
        else {
        header('location:' . SITEURL . 'products.php');
    }
} else {
    header('location:' . SITEURL . 'products.php');
}
?>

<div class="clearfix"></div>
<!-- Navbar Section Ends Here -->

<!-- Product sEARCH Section Starts Here -->
<section class="products-search">
    <div class="container-1">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Plant</legend>
                <div>
                     <?php
                        if($image_name=="")
                        {
                                echo "<div class='error'>Image Not available</div>";  
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/products/<?php $image_name; ?>"class="img-responsive img-curve">
                            <?php
                        }
                        
                    ?>
                

                <div class="products-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="product" value="<?php echo $title; ?>">

                    <p class="product-price">Rs. <?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php
              if(isset($_POST['submit']))
              {
                 $product = $_POST['product'];
                 $price = $_POST['price'];
                 $qty = $_POST['qty'];
                 
                 $total = $price * $qty;//total = prcie x qty
 
                 $order_date = date("Y-m-d h:i:sa");

                 $status = "Ordered";

                 $username = $_POST['full-name'];
                 $customer_contact = $_POST['contact'];
                 $customer_email = $_POST['email'];
                 $customer_address = $_POST['address'];
 
                 $sql2 = "INSERT INTO orders_table SET
                 product = '$product',
                 price = $price,
                 qty = $qty,
                 total = $total,
                 order_date = '$order_date',
                 username = '$username',
                 customer_email = '$customer_email',
                 customer_address = '$customer_address'                 
                 ";  

                 $res2 = mysqli_query($conn, $sql2);
                 
                 if($res2==true)
                 {
                     $_SESSION['order'] = "<div class='success'> Order was placed!</div>";
                     header('location:'>SITEURL);
                 }
                 else
                 {

                    $_SESSION['order'] = "<div class='error'> Failed to place Order.</div>";
                    header('location:'>SITEURL);
                 }

              }       
         
        ?>

    </div>
</section>
<?php include('partials-frontend/footer.php') ?>
</body>

</html>