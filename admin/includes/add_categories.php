
<?php 
$error = "";
if(isset($_POST['add_category'])){
    $newCategory = $_POST['categoryTitle'];
    if($newCategory == "" || empty($newCategory)){
            $error =  "CANNOT BE EMPTY";
    }else{
    $addQuery = "INSERT INTO CATEGORIES (category_title) VALUES ('{$newCategory}')";
    $addCategoryQuery = mysqli_query($connection , $addQuery);
    if(!$addCategoryQuery){
        die('Query Failed ' . mysqli_error($connection));
    }
}
}


?>

<form action="" method="post">
                                <div class="form-group">
                                    <label for="categoryTitle">Category Title</label>
                                    <input class="form-control" type="text" name="categoryTitle">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="add_category" value="Add Category">
                                    <label for="error"><?php echo $error;?></label>
                                </div>

                            </form>

                            <?php include "includes/admin_navigation.php"; ?>


