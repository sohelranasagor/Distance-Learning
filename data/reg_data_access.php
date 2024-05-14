<?php

include_once("../../lib/db.php");
//$dir=dirname(__FILE__);
//echo $dir;
function addUser($user){
    $query="INSERT INTO users(firstName,lastName,dob,gender,phnNo,email,password) VALUES('$user[firstName]','$user[lastName]','$user[dob]','$user[gender]','$user[phn]','$user[email]','$user[password]')";
    return executeNonQuery($query);
}
function addLog($user){
    $query="INSERT INTO login(email,password,typeid) VALUES('$user[email]','$user[password]',$user[type])";
    return executeNonQuery($query);
}
?>