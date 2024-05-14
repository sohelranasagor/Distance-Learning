<?php
include_once("data/log_data_access.php");
function findLog($email,$password){
    $user=array("email"=>$email,"password"=>$password);
    return findLogin($user);
}
?>