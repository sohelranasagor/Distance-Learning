<?php
    include_once("../../data/faculty_data_access.php");
function loadFaculty($facultyemail){
    return getFaculty($facultyemail);
}
function addNewCourses($courseTitle,$courseDescription,$coursepic,$courseFeature,$instructor,$courseNumber,$coursetype,$courselevel){
    $course=array("courseTitle"=>$courseTitle,"courseDes"=>$courseDescription,"coursePic"=>$coursepic,"courseFeature"=>$courseFeature,"facultyName"=>$instructor,"courseNo"=>$courseNumber,"courseType"=>$coursetype,"courselevel"=>$courselevel);
    return addCourses($course);
}
function loadCourse($course){
    return getCourse($course);
}
function addNewSyllabus($courseMeetingLecture,$courseMeetingReaction,$prerequisites,$courseDes,$assOrExams,$instructor,$courseid){
    $course=array("courseMeetingLecture"=>$courseMeetingLecture,"courseMeetingReaction"=>$courseMeetingReaction,"prerequisites"=>$prerequisites,"courseDes"=>$courseDes,"assOrExams"=>$assOrExams,"instructor"=>$instructor,"courseid"=>$courseid);
    return addSyllabus($course);
}
function addNewAssignment($courseid,$instructor,$target){
    $course=array("courseid"=>$courseid,"instructor"=>$instructor,"target"=>$target);
    return addAssignment($course);
}
function addNewNotes($courseid,$instructor,$target){
    $course=array("courseid"=>$courseid,"instructor"=>$instructor,"target"=>$target);
    return addNotes($course);
}
function addNewExams($courseid,$instructor,$target){
    $course=array("courseid"=>$courseid,"instructor"=>$instructor,"target"=>$target);
    return addExams($course);
}
?>

