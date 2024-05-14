<?php
//$serverName="localhost";
//$username="root";
//$password="";
//$databaseName="evarsity";

function executeNonQuery($query){
    global $serverName,$username,$password,$databaseName;
    $result=false;
    $connection=mysqli_connect("localhost","root","","evarsity");
    if(!$connection)
    {
        die("Conncetion error: ".mysqli_connect_error()."<br/>");
    }
    if($connection){
        $result=mysqli_query($connection,$query);
    }
    return $result;
}

function executeQuery($query){
    return executeNonQuery($query);
}



?>