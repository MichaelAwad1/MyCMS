<?php 

if(isset($_GET['user_id'])){
$user_id = escape($_GET['user_id']);
//get all user information;\
        $query = "SELECT * FROM users WHERE userid = $user_id ";
        $select_user_id = mysqli_query($connection,$query);  
         confirmQuery($select_user_id);
            while($row = mysqli_fetch_assoc($select_user_id)) {
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_role = $row["user_role"];
                $username = $row["username"];
                $user_email = $row["user_email"];
                $user_password = $row["user_password"];
                
            }
}

if(isset($_POST["update_user"])){
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $username = $_POST["username"];
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    
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
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE userid = {$user_id}";
             
    $update_user_query = mysqli_query($connection, $query); 
    //echo $query;
    confirmQuery($update_user_query);


}

?>

<form action="" method="post" enctype="multipart/form-data">
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
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>

</form>