<?php include ('partials/menu.php')?>


    <div class="main-content">
      <div class="wrapper">
          <h1>Add Admin</h1>
           </br>
            </br>
            <form action="" method="POST">
                <table class="tbl-add">
                    <tr>
                        <td><input type="text" name="full_name" placeholder="Full Name"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="username" placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
       </div>
    </div>

<?php

  //Processing the values from the form and add to the DB

  if(isset($_POST['submit']))
  {
      //button clicked
      // echo "Button Clicked";
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = ($_POST['password']);

      //SQL Query to save data into the DB
      $sql = "INSERT INTO tbl_admin(full_name, username, email, password) VALUES('$full_name','$username', '$email', '$password') ";

      $conn = mysqli_connect('localhost', 'root', '');
      $db_select = mysqli_select_db($conn, 'userinfo');

      //Executing Query and saving data into the DB
      $res = mysqli_query($conn, $sql);  
       
   if($res==true)
   {

     $_SESSION['add'] = "Admin has been added successfully";

     //Redirect Page

     header("location:".SITEURL.'admin/manage-admin.php');
  }
  else{
    $_SESSION['add'] = "Failed to add admin";

    //Redirect Page to Add Admin

    header("location:".SITEURL.'admin/add-admin.php');
  }
  }

?>



</body>
</html>