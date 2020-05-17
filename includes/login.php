<?php include "db.php"; 

session_start();
?>


<?php 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $username =  mysqli_real_escape_string($connection, $username);
    $password =  mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM USERS WHERE username ='{$username}' ";
    $user_query = mysqli_query($connection , $query);
    

    while($row = mysqli_fetch_array($user_query)){

        $db_userid = $row['userid'];

        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        $db_user_email = $row['user_email'];
        
       
    }

    $password = crypt ($password , $db_user_password);

    if($username === $db_username && $password === $db_user_password){
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['role'] = $db_user_role;
        $_SESSION['email'] = $db_user_email;
        $_SESSION['password'] = $db_user_password;
        

        
        header("Location: ../admin");

    }else{
        header("Location: ../index.php");
    }

}

?>