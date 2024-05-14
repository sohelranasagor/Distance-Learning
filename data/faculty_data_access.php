<?php

include_once("../../lib/db.php");
//$dir=dirname(__FILE__);
//echo $dir;
function getFaculty($facultyemail){
    $query="SELECT * FROM facultys WHERE facultyemail='$facultyemail'";
    $result=executeQuery($query);
    $user=null;
    if($result){
        $user=mysqli_fetch_assoc($result);
    }
    return $user;
}
function addCourses($course){

    $query="INSERT INTO courses(courseTitle,courseDes,coursePic,courseFeature,facultyName,courseNo,courseType,courselevel) VALUES('$course[courseTitle]','$course[courseDes]','$course[coursePic]','$course[courseFeature]','$course[facultyName]',$course[courseNo],$course[courseType],'$course[courselevel]')";
    return executeNonQuery($query);
}
function getCourse($course){
    $query="SELECT * FROM courses WHERE courseNo=$course";
    $result=executeQuery($query);
    $user=null;
    if($result){
        $user=mysqli_fetch_assoc($result);
    }
    return $user;
}
function addSyllabus($course){
    $query="INSERT INTO syllabus(courseMeetingTimeLecture,courseMeetingTimeReaction,prerequisites,descrip,assOrExams,facultyName,courseId) VALUES('$course[courseMeetingLecture]','$course[courseMeetingReaction]','$course[prerequisites]','$course[courseDes]','$course[assOrExams]','$course[instructor]',$course[courseid])";
    return executeNonQuery($query);
}
function addAssignment($course){
    $query="INSERT INTO assignment(courseId,facultyName,assignmentPdf) VALUES($course[courseid],'$course[instructor]','$course[target]')";
    return executeNonQuery($query);
}
function addNotes($course){
    $query="INSERT INTO lecturenotes(courseId,facultyName,lectureNote) VALUES($course[courseid],'$course[instructor]','$course[target]')";
    return executeNonQuery($query);
}
function addExams($course){
    $query="INSERT INTO exams(courseId,facultyName,questionPdf) VALUES($course[courseid],'$course[instructor]','$course[target]')";
    return executeNonQuery($query);
}
?>


