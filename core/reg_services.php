<?php
    include_once("../../data/reg_data_access.php");
    //include_once("../data/reg_data_access.php");

function addNewUser($fname,$lname,$dob,$gender,$phn,$email,$password){
    $user=array("firstName"=>$fname,"lastName"=>$lname,"dob"=>$dob,"gender"=>$gender,"phn"=>$phn,"email"=>$email,"password"=>$password);
    return addUser($user);
}
function addNewLog($email,$password,$type){
    $user=array("email"=>$email,"password"=>$password,"type"=>$type);
    return addLog($user);
}
?>