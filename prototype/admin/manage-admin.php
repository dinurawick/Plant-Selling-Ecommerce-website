<?php include ('partials/menu.php')?>

<!--------------Conent Section------------->

    <div class="main-content">
      <div class="wrapper">
         <h1>Manage Admin</h1>
         
        </br>
        </br>

        <?php
              if(isset($_SESSION['add']))
              {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
              }

              if(isset($_SESSION['delete']))
              {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
              }
              
              if(isset($_SESSION['update']))
              {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
              }

              if(isset($_SESSION['user-not-found']))
              {
                echo $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
              }

              if(isset($_SESSION['password-not-match']))
              {
                echo $_SESSION['password-not-match'];
                unset ($_SESSION['password-not-match']);
              }
              
              if(isset($_SESSION['change-password']))
              {
                echo $_SESSION['change-password'];
                unset ($_SESSION['change-password']);
              }
              
        ?>  
        </br></br></br>
           <a href="add-admin.php" class="btn-primary">Add Admin</a>       
        </br>
        </br>
             <table class="tbl-full">
                 <tr>
                  <th>S.N.</th>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Actions</th>
                 </tr>

                <?php
                //Query to get all admins
                    $sql = "SELECT * FROM tbl_admin";

                    //executing the query
                    $res=mysqli_query($conn,$sql);
                     
                     if($res==TRUE)
                     {
                       
                      $count =mysqli_num_rows($res);
                      $sn=1;//Creat a Variable and assign the value
                      if($count>0)
                      {
                          while($rows=mysqli_fetch_assoc($res))
                          {
                             $id = $rows['id'];
                             $full_name = $rows['full_name']; 
                             $username = $rows['username'];
                             $email =  $rows['email'];
                ?>
                 <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $full_name?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $email ?></td>
                    <td>
                     <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a> 
                     <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Admin</a>
                    </td>
                </tr>      
                <?php 
                          }
                      } 
                      else{
                        // We do not have data in the DB
                      } 
                     
                     }

                ?>
               
              </table>
        </div>
    </div>
</body>
</html>