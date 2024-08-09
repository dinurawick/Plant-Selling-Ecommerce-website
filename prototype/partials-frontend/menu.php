<?php include('config/constant.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantaholics | Products Page</title>
    <link rel="stylesheet" href="edit.css">
    <script src="https://kit.fontawesome.com/fdeea92cf1.js" crossorigin="anonymous"></script>

</head>
<body>
        <div class="container">
          <div class="navbar">
             <div class="logo">
                 <img src="images/god-removebg-preview.png" width="225px">
             </div>
             <nav>
                 <ul>
                     <li><a href="<?php echo SITEURL; ?>index.php">Home</a></li>
                     <li><a href="<?php echo SITEURL; ?>products.php">Products</a></li>
                     <li><a href="<?php echo SITEURL; ?>categories.php">Categories</a></li>
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
              <input type="search" name="search" placeholder="Search for anything you like..." class="search-bar" required>
              <input type="submit" name="submit" value="Search" class="btn btn-primary">
          </form>

        </div>

       </section>
        </div>
