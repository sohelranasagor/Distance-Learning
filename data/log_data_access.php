<?php
include_once("lib/db.php");
//$dir=dirname(__FILE__);
//echo $dir;

function findLogin($user){
    $query="SELECT * from login where email='$user[email]' and password='$user[password]'";
    $result=executeQuery($query);
    $user=null;
    if($result){
        $user=mysqli_fetch_assoc($result);
    }
    return $user;
}

?>