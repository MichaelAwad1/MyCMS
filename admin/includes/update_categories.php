<form action="" method="post">
                                <div class="form-group">
                                    <label for="categoryTitle">Edit Category</label>

                                <?php 
                                      if(isset($_GET['edit'])){
                                        $edited = $_GET['edit'];
                                      $query = "SELECT * FROM CATEGORIES WHERE category_id = {$edited}";
                                        $select_categories= mysqli_query($connection , $query);                                
                                        while($row = mysqli_fetch_assoc($select_categories)){
                                        $categoryID = $row['category_id'];
                                        $categoryTitle = $row['category_title'];

                                        ?>
                                        <input value= "<?php if(isset($categoryTitle)) {echo $categoryTitle;} ?>" type="text" class = "form-control" name="editCategory">

                                  <?php } 
                                  
                                  if(isset($_POST['update_category'])){
                                    $updatedCategory = $_POST['editCategory'];
                                    echo $updatedCategory;
                                    if($updatedCategory == ""){
                                            $error =  "CANNOT BE EMPTY";
                                    }else{
                                    $updateQuery = "UPDATE CATEGORIES SET category_title = '{$updatedCategory}' WHERE category_id = {$edited}";
                                    $updateCategoryQuery = mysqli_query($connection , $updateQuery);
                                    header("Location: categories.php");

                                    if(!$updateCategoryQuery){
                                        die('Query Failed ' . mysqli_error($connection));
                                    }
                                }
                            }
                        }
                            


                                  ?>



                                  
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                    <label for="error"><?php echo $error;?></label>
                                </div>

                            </form>