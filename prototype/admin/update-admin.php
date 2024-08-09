<?php include('partials/menu.php');?>

<div class="main-content">
      <div class="wrapper">
          <h1>Update Admin</h1>
           </br>
            </br>
            <?php
            // Get the ID of choosen Admin
            $id=$_GET['id'];  


            //Creat SQL Query to get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Checking whether the query was exucuted or not

            if($res==true)
            {
                //Check whether the data is available or not 
                $count =   mysqli_num_rows($res);  

                //Check whether we have admin data or not 
                if($count==1)
                {
                  //Get the details
                  //echo "Admin avalable.";
                  $row=mysqli_fetch_assoc($res);
                
                  $full_name = $row['full_name'];
                  $username = $row['username'];
                  $email = $row['email'];
                }   
                else
                {
                  header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

            ?>
          
            <form action="" method="POST">
                <table class="tbl-add">
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
       </div>
    </div>
     
       <?php
        if(isset($_POST['submit']))
        {
            //echo "Button clicked";
            //Updating the admin
            echo $id = $_POST['id'];
            echo $full_name = $_POST['full_name'];
            echo $username = $_POST['username'];
            echo $email = $_POST['email'];

            //sql to update admin
            $sql ="UPDATE tbl_admin SET
            full_name = '$full_name',
            username =  '$username',
            email = '$email'
            WHERE id='$id'
            ";

            $res = mysqli_query($conn, $sql);
            //Check Where query was executed or not
            if($res==true)
            {
                $_SESSION['update']="Admin was successfully updated!";
                //redirect to manage admin page
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
            else
            {
                
                $_SESSION['update']="Failed to update the admin.";
                //redirect to manage admin page
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        } 
       ?>

    