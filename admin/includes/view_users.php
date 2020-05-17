
                <table class= "table tabled-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>
                          
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 


                        $query = "SELECT * FROM users";
                        $select_users = mysqli_query($connection,$query);  

                        while($row = mysqli_fetch_assoc($select_users)) {
                        $user_id = $row['userid'];
                        $user_name = $row['username'];
                        $user_password = $row['user_password'];
                        
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        
                        
                        $user_email = $row['user_email'];
                       
                        $user_role = $row['user_role'];
                        $user_image = $row['user_image'];
                       
                       
                        echo "<tr>";
                            
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$user_name}</td>";
                        echo "<td>{$user_firstname}</td>";
                        echo "<td>{$user_lastname}</td>";
                        echo "<td>{$user_email}</td>";
                        echo "<td>{$user_role}</td>";
                        echo "<td><a href='users.php?&change_to_admin={$user_id}'>Admin</a></td>";
                        echo "<td><a href='users.php?&change_to_sub={$user_id}'>Subscriber</a></td>";
                        echo "<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
                        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"
                        href='users.php?&delete={$user_id}'>Delete</a></td>";
                        
                        
                        echo "</tr>";

                        }


                    ?>


                    </tbody>

                </table>
