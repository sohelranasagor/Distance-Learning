<?php

include_once("../../lib/db.php");
//$dir=dirname(__FILE__);
//echo $dir;
function addFaculty($faculty){
    $query="INSERT INTO facultys(facultytype,facultyname,facultyemail,facultypass,facultyphn) VALUES($faculty[facultytype],'$faculty[facultyname]','$faculty[facultyemail]','$faculty[facultypass]','$faculty[facultyphn]')";
    return executeNonQuery($query);
}
function addLog($faculty){
    $query="INSERT INTO login(email,password,typeid) VALUES('$faculty[facultyemail]','$faculty[facultypass]',$faculty[facultytype])";
    return executeNonQuery($query);
}
?>