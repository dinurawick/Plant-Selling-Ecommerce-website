<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantaholics | Money Tree</title>
    <link rel="stylesheet" href="../edit.css">
    <script src="https://kit.fontawesome.com/fdeea92cf1.js" crossorigin="anonymous"></script>
</head>
<body>
        <div class="container">
          <div class="navbar">
             <div class="logo">
                 <img src="../images/god-removebg-preview.png" width="225px">
             </div>
             <nav>
                 <ul>
                     <li><a href="../index.php">Home</a></li>
                     <li><a href="../products.php">Products</a></li>
                     <li><a href="">Contact</a></li>
                     <li><a href="">About Us</a></li>
                 </ul>
             </nav>
                 <div class="icon">
                    <a href="" input="button"><i class="fas fa-user-circle" style="font-size: 26px;"></i></a>
                    <a href="" input="button"><i class="fas fa-shopping-cart" style="font-size: 25px;"></i></a>
                    <a href="" input="button"><img src="images/menu.png" class="menuicon" onclick="menutoggle()"></a>
                 </div>
           </div>
        </div>
    

<!---------------------Products----------------------->
 
            <div class="small-container details">
               <div class="row">
                 <div class="col-2">
                 <img src="../images/moneytree.jpeg" width="80%" id="ProductImg">
              
<!------------------Mini Images------------->              
             
                 <div class="miniimages">
                    <div class="mini-img-col">
                        <img src="../images/moneytree.jpeg" width="80%" class="small-img" style="border-radius: 60%;">
                    </div>
                     <div class="mini-img-col">
                       <img src="../images/moneythree2.jpeg" width="80%" class="small-img" style="border-radius: 60%;">
                      </div>
                      
                     <div class="mini-img-col">
                       <img src="../images/moneytree3.jpeg" width="80%" class="small-img" style="border-radius: 60%;">
                      </div>
                  </div>
            </div>

              <div class="col-6">
                  <h2>Money Tree</h2>
                    <h3>Product Details <i class="fa fa-indent"></i></h3>
                       <p class="p2">The mini version of the simplistically eye catching Money Tree. <br> 
                                     Just as soothing and a perfect fit on top of a coffee table or dresser.<br>
                                     Until it becomes about 6 to 8ft tall. </p>
                                     <p>Rs. 1500.00 </p>
                          <input type="number" name="" value="1"><br>
                        <a href="" class="button3">Add to Cart</a>
               </div>
            </div>
          </div>     

<!----------------------Recommended---------------------->

       
<div class="small-container">
            <h2 class="title">People also look for...</h2> 
            <a href="../products.php" class="button1">Shop Now</a>  
            <div class="row">
                <div class="col-4">
                  <a href="minimoney.php">  
                    <img src="../images/mini money.jpg">
                    <h4>Mini-Money Tree</h4>
                    <p>Rs. 1500.00</p>
                  </a>
                  <a href="" class="button4">Add to Cart</a>
                </div>
                <div class="col-4">
                  <a href="silver.php">  
                      <img src="../images/silversatinpothos.jpg">
                      <h4>Silver Stain Pothos</h4>
                    <p>Rs. 700.00</p>
                  </a> 
                  <a href="" class="button4">Add to Cart</a>
                </div>
                <div class="col-4">
                   <a href="phalwhite.php">
                       <img src="../images/phalwhite.jpeg">
                       <h4> Phalonopsis Orchid</h4>
                    <p>Rs. 1500.00</p>
                   </a> 
                   <a href="" class="button4">Add to Cart</a>
                </div>
                <div class="col-4">
                   <a href="zz.php"> 
                       <img src="../images/zz.jpg">
                       <h4>Zamioculcas Zamiifolia</h4>
                    <p>Rs. 5000.00</p>
                   </a> 
                   <a href="" class="button4">Add to Cart</a>
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

<!--------------------------JS for product gallary--------------------->

      <script>
         var ProductImg = document.getElementById("ProductImg");
         var SmallImg = document.getElementsByClassName("small-img");
            
         SmallImg[0].onclick = function()
         {
           ProductImg.src = SmallImg[0].src;
         }
         SmallImg[1].onclick = function()
         {
           ProductImg.src = SmallImg[1].src;
         }
         
         SmallImg[2].onclick = function()
         {
           ProductImg.src = SmallImg[2].src;
         }
      </script>


</body>
</html>