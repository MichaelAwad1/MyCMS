<div class="col-md-4">






<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>

    <form action="search.php" method="post">
    <div class="input-group">
        <input name = "search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name = submit class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form> <!-- end of form -->

    <!-- /.input-group -->
</div>




<!-- Blog Categories Well -->
<div class="well">

    


    <?php 


        $query = "SELECT * FROM CATEGORIES";
        $select_categories_sidebar = mysqli_query($connection , $query);

?>

    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                    while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                    $categoryTitle = $row['category_title'];
                    echo "<li><a href='#'>{$categoryTitle}</li>";   
                    }
                ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
    <?php  include "widget.php" ?>


</div>