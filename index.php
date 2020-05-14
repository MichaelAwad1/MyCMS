<?php  include "includes/db.php" ?> 
<?php  include "includes/header.php" ?> 
 
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php" ?> 
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small></h1>


            <?php 
            
            $query = "SELECT * FROM POSTS";
                $select_posts = mysqli_query($connection , $query);
                
                while($row = mysqli_fetch_assoc($select_posts)){
                    $post_id = $row['post_id'];
                    // $postCategoryID = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0,100);
                    // $postTags = $row['post_tags'];
                    // $postCommentCount = $row['post_comment_count'];
                    // $postStatus = $row['post_status'];
            
                    ?>

           

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ;?>"> <?php echo $post_title  ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"> <?php echo $post_author  ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date  ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p> <?php echo $post_content  ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            
            
            
                
                
           <?php }  ?>

               

            </div>

            <!-- Blog Sidebar Widgets Column -->
          
            <?php  include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

      
<?php  include "includes/footer.php" ?>