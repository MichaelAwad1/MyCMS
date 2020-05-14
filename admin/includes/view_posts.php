
                <table class= "table tabled-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Dates</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 


                        $query = "SELECT * FROM posts";
                        $select_posts = mysqli_query($connection,$query);  

                        while($row = mysqli_fetch_assoc($select_posts)) {
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];                        
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];
                       
                        echo "<tr>";
                            
                        echo "<td>{$post_id}</td>";
                        echo "<td>{$post_author}</td>";
                        echo "<td>{$post_title}</td>";
                        
                        $query ="SELECT category_title FROM categories WHERE category_id = {$post_category_id}";
                        $map_id_to_title = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($map_id_to_title)) {
                            $category_title = $row['category_title'];
                        }
                        echo "<td>{$category_title}</td>";

                        echo "<td>{$post_status}</td>";
                        echo "<td><img width=100 src='../images/$post_image' alt='image'></td>";
                        echo "<td>{$post_tags}</td>";
                        echo "<td>{$post_comment_count}</td>";
                        echo "<td>{$post_date}</td>";
                        echo "<td><a href='posts.php?source=view_posts&delete={$post_id}'>Delete</a></td>";
                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                        
                        echo "</tr>";

                        }


                    ?>


                    </tbody>

                </table>

                <?php 
                    deletePost();
                ?>