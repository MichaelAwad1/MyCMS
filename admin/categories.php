<?php include "includes/admin_header.php"; ?>
        
<!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">  

                           <?php include "includes/add_categories.php";  // add a new category ?> 
                           <?php include "includes/update_categories.php"; // update an existing category ?> 

                        </div>



                        <div class="col-xs-6">
                              <table class="table table-bordered table-hover">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Category Title</th>
                                      </tr>
                                  </thead>
                                   <tbody>
                                        <?php //SELECT ALL CATEGORIES
                                            $query = "SELECT * FROM CATEGORIES";
                                            $select_categories= mysqli_query($connection , $query);                                
                                            while($row = mysqli_fetch_assoc($select_categories)){
                                            $categoryID = $row['category_id'];
                                            $categoryTitle = $row['category_title'];
                                            echo "<tr>";
                                            echo "<td>{$categoryID}</td>";
                                            echo "<td>{$categoryTitle}</td>";   
                                            echo "<td><a  href='categories.php?delete={$categoryID}'>Delete</a></td>";
                                            echo "<td><a  href='categories.php?edit={$categoryID}'>Edit</a></td>";
                                            echo "</tr>";    
                                        }
                                        ?>

                                        <?php //DELETE A CATEGORY
                                            if(isset($_GET['delete'])){
                                                $deleted = $_GET['delete'];
                                            $query = "DELETE FROM CATEGORIES WHERE category_id = {$deleted} ";
                                            $deleteQuery = mysqli_query($connection , $query);
                                            header("Location: categories.php");
                                            
                                            if(!$deleteQuery){
                                              die('Query Failed ' . mysqli_error($connection));
                                            }
                                           
                                            }

                                        ?>

                                   </tbody>         

                              </table>

                        </div>  
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        <?php include "includes/admin_footer.php"; ?>