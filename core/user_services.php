<?php
    include_once("../../data/user_data_access.php");
    function loadUser($useremail){
        return getUser($useremail);
    }
    function loadAllCourse(){
        return getAllCourse();
    }
    function loadAllFaculty(){
        return getAllFaculty();
    }
    function loadCourse($id)
    {
        return getCourse($id);
    }
    function loadCourseSyllabus($id)
    {
        return getCourseSyllabus($id);
    }
    function loadCourseLectureNotes($id)
    {
        return getCourseLectureNotes($id);
    }
    function loadCourseExams($id)
    {
        return getCourseExams($id);
    }
    function loadCourseAssignments($id)
    {
        return getCourseAssignments($id);
    }
    function loadAllCourseById($id){
        return getAllCourseById($id);
    }
    function searchCourse($name){
        return getSearchCourse($name);
    }
    function updateUser($fName,$lName,$phnNum,$email,$userid){
        $user=array("firstName"=>$fName,"lastName"=>$lName,"phone"=>$phnNum,"email"=>$email,"id"=>$userid);
        return editUser($user);
    }
    function removeUser($userid){
        return deleteUser($userid);
    }
    function removeUserFromLog($email){
        return deleteUserFromLog($email);
    }
    function updatePassword($email,$cPass){
        $user=array("email"=>$email,"password"=>$cPass);
        return editPassword($user);
    }
    function updatePasswordFromLog($email,$cPass){
        $user=array("email"=>$email,"password"=>$cPass);
        return editPasswordFromLog($user);
    }
    function loadAllCourseByName($Name){
        return getAllCourseByName($Name);
    }
    function loadFacultyById($id){
        return getFacultyById($id);
    }
    function loadMessage($email){
        return getMessage($email);
    }
    function addNewMessage($email,$to,$detail){
        $user=array("email"=>$email,"to"=>$to,"detail"=>$detail);
        return addMessage($user);
    }
?>