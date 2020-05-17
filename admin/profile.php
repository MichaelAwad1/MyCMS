<?php include "includes/admin_header.php" ?>
    
  <!-- Navigation -->
  <?php include "includes/admin_navigation.php" ?>

    <?php 
    if(isset($_POST["update_user"])){
        $user_firstname = $_POST["user_firstname"];
        $user_lastname = $_POST["user_lastname"];
        $user_role = $_POST["user_role"];
        $username = $_POST["username"];
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];

        $query = "SELECT randSalt FROM users";
        $select_randSalt = mysqli_query($connection , $query);
        confirmQuery($select_randSalt);

        $row = mysqli_fetch_array($select_randSalt);
        $salt = $row['randSalt'];

        $hashed_password = crypt($user_password , $salt);   

        
        // $post_image = $_FILES["image"]["name"];
        // $post_image_temp = $_FILES["image"]["tmp_name"];
    
        // move_uploaded_file($post_image_temp,"../images/$post_image");
        //$post_image = escape($_FILES["image"]["name"]);
        //$post_image_temp = escape($_FILES["image"]["tmp_name"]);
        
        //move_uploaded_file($post_image_temp,"../images/$post_image");
        //echo "outside . " . $post_image;
       
    
    
        // if(empty($post_image)){
        //     $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        //     $select_image = mysqli_query($connection,$query); 
        //    // echo $query; 
        //      confirmQuery($select_image);
        //         if($row = mysqli_fetch_assoc($select_image)) {
        //             $post_image = $row['post_image'];
        //         }
        //  //       echo  " inside if " . $post_image;
        // }
        
    
        #echo $post_image;
    
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', " ;
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}' ";
        $query .= "WHERE username = '{$username}'";


                 
        $update_user_query = mysqli_query($connection, $query); 
        //echo $query;
        confirmQuery($update_user_query);


    
    
    }
    
    
    ?>

  <?php 
               
    if(isset($_SESSION['username'])){
       $username =  $_SESSION['username'];
       $query = "SELECT * FROM users WHERE username = '{$username}' ";
       $select_use = mysqli_query($connection,$query);  
        confirmQuery($select_use);
           while($row = mysqli_fetch_assoc($select_use)) {
               $user_firstname = $row["user_firstname"];
               $user_lastname = $row["user_lastname"];
               $user_role = $row["user_role"];
               $username = $row["username"];
               $user_email = $row["user_email"];
               $user_password = $row["user_password"];
    }
    }

               ?>
        
        
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                 <h1 class="page-header">
                    Welcome to admin
                    <small><?php echo $username;?></small>
                </h1>
                
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label for="role">User Role</label>


        <?php ?>
    
        <select class="form-control" name="user_role" id="" ?>">
        <option value="<?php echo $user_role ;?>"><?php echo $user_role ;?></option>
        <?php 
        if($user_role =='admin'){
            echo "<option value='subscriber'>subscriber</option>";
        }else {
            echo "<option value='admin'>admin</option>";
        }
        ?>
            
           
            </select>
        
    </div>

    <div class="form-group">
        <label for="name">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <!-- <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" class="form-control" name="user_firstname">
    </div> -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">
    </div>

</form>

            </div>
            
        </div>
        <!-- /.row -->
        

    </div>
    <!-- /.container-fluid -->
    

</div>
 <!-- /.page-wrapper -->



        
        
    <?php include "includes/admin_footer.php" ?>
