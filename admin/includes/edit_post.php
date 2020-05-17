<?php 

if(isset($_GET['p_id'])){
$post_id = escape($_GET['p_id']);
//get all post information;\
        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $select_post_id = mysqli_query($connection,$query);  
         confirmQuery($select_post_id);
            while($row = mysqli_fetch_assoc($select_post_id)) {
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_author = $row['post_author'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
            }
}

if(isset($_POST["update_post"])){
    $post_title = escape($_POST["title"]);
    $post_category_id = escape($_POST["post_category"]);
    $post_author = escape($_POST["author"]);
    $post_status = escape($_POST["status"]); 
    $post_image = escape($_FILES["image"]["name"]);
    $post_image_temp = escape($_FILES["image"]["tmp_name"]);
    $post_tags = escape($_POST["tags"]);
    $post_content = escape($_POST["content"]);
    move_uploaded_file($post_image_temp,"../images/$post_image");
    //echo "outside . " . $post_image;
   


    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $select_image = mysqli_query($connection,$query); 
       // echo $query; 
         confirmQuery($select_image);
            if($row = mysqli_fetch_assoc($select_image)) {
                $post_image = $row['post_image'];
            }
     //       echo  " inside if " . $post_image;
    }
    

    #echo $post_image;

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', " ;
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}' ";
    $query .= "WHERE post_id = {$post_id}";
             
    $update_post_query = mysqli_query($connection, $query); 
    //echo $query;
    confirmQuery($update_post_query);

    echo "<p class='bg-success'>Post Updated <a href='../post.php?p_id=$post_id'>View post</a>" . " or " . "<a href='posts.php' >Edit More Posts</a></p>";


}

?>

<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title"  value="<?php echo $post_title;?>">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category</label>
    
        <select class="form-control" name="post_category" id="post_category">
        <?php $query = "SELECT * FROM categories  ";
        $select_categories_id = mysqli_query($connection,$query);  
        confirmQuery($select_post_id);

            while($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['category_id'];
            $cat_title = $row['category_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }

            ?>
            
            </select>
        
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author"  value="<?php echo $post_author;?>">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <select class="form-control" name="status" id="post_status">
        <option value="<?php echo $post_status ;?>"><?php echo $post_status ;?></option>
        <?php 
        if($post_status =='published'){
            echo "<option value='draft'>draft</option>";
        }else {
            echo "<option value='published'>published</option>";
        }
        ?>
            
            </select>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
       <img width = "100" src="../images/<?php echo $post_image ;?>" alt="image">
       <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" value="<?php echo $post_tags;?>">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea type="text" class="form-control" name="content" id="body" cols="30" rows="10"><?php echo $post_content;?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>

</form>

