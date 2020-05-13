<?php

$db['host'] = "localhost";
$db['user'] = "root";
$db['password'] = "";
$db['name'] = "mycms";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

 
$connection = mysqli_connect(HOST , USER , PASSWORD , NAME);   

if($connection)
#echo "connected";


?>