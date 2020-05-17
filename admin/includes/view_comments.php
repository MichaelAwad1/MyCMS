
                <table class= "table tabled-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Reply to</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Unapprove</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php 


                        $query = "SELECT * FROM comments";
                        $select_comments = mysqli_query($connection,$query);  

                        while($row = mysqli_fetch_assoc($select_comments)) {
                        $comment_id = $row['comment_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];                        
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                        $comment_post_id = $row['comment_post_id'];
                       
                        echo "<tr>";
                            
                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";
                        echo "<td>{$comment_content}</td>";
                        
                        
                        echo "<td>{$comment_email}</td>";

                        echo "<td>{$comment_status}</td>";

                         $query ="SELECT post_title FROM posts WHERE post_id = {$comment_post_id}";
                         $map_id_to_title = mysqli_query($connection, $query);
                         while($row = mysqli_fetch_assoc($map_id_to_title)) {
                             $post_title = $row['post_title'];
                             echo "<td><a href= '../post.php?p_id=$comment_post_id'>{$post_title}</td>";
                         }
                      
                       

                        echo "<td>{$comment_date}</td>";
                        // echo "<td>{$post_comment_count}</td>";
                        // echo "<td>{$post_date}</td>";
                        echo "<td><a href='comments.php?&approve={$comment_id}'>Approve</a></td>";
                        echo "<td><a href='comments.php?&unapprove={$comment_id}'>Unapprove</a></td>";
                        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"
                        href='comments.php?&delete={$comment_id}'>Delete</a></td>";
                        
                        
                        echo "</tr>";

                        }


                    ?>


                    </tbody>

                </table>
