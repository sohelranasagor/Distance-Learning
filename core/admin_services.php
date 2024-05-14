<?php
    include_once("../../data/admin_data_access.php");
    //include_once("../data/reg_data_access.php");

function addNewFaculty($fType,$fName,$fEmail,$fPass,$fPhn){
    $faculty=array("facultytype"=>$fType,"facultyname"=>$fName,"facultyemail"=>$fEmail,"facultypass"=>$fPass,"facultyphn"=>$fPhn);
    return addFaculty($faculty);
}
function addNewLog($fEmail,$fPass,$fType){
    $faculty=array("facultyemail"=>$fEmail,"facultypass"=>$fPass,"facultytype"=>$fType);
    return addLog($faculty);
}
?>