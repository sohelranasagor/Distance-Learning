<?php
    include_once("../../lib/db.php");
    function getUser($useremail){
        $query="SELECT * FROM users WHERE email='$useremail'";
        $result=executeQuery($query);
        $user=null;
        if($result){
            $user=mysqli_fetch_assoc($result);
        }
        return $user;
    }
    function getAllCourse(){
        $query="SELECT * FROM courses";
        $result=executeQuery($query);
        $courseList=array();
        if($result){
           for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
               $courseList[$i]=$row;
           }
        }
        return $courseList;
    }
    function getAllFaculty(){
        $query="SELECT * FROM facultys";
        $result=executeQuery($query);
        $courseList=array();
        if($result){
           for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
               $courseList[$i]=$row;
           }
        }
        return $courseList;
    }
    function getAllCourseById($id){
        $query="SELECT * FROM courses where courseType=$id";
        $result=executeQuery($query);
        $courseList=array();
        if($result){
           for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
               $courseList[$i]=$row;
           }
        }
        return $courseList;
    }
    function getCourse($id){
        $query="SELECT * FROM courses WHERE courseId=$id";
        $result=executeQuery($query);
        $cousre=null;
        if($result){
            $cousre=mysqli_fetch_assoc($result);
        }
        return $cousre;
    }
    function getCourseSyllabus($id){
        $query="SELECT * FROM syllabus WHERE courseId=$id";
        $result=executeQuery($query);
        $cousre=null;
        if($result){
            $cousre=mysqli_fetch_assoc($result);
        }
        return $cousre;
    }
    function getCourseLectureNotes($id){
        $query="SELECT * FROM lecturenotes WHERE courseId=$id";
        $result=executeQuery($query);
        $cousre=array();
        if($result){
            for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
                $cousre[$i]=$row;
            }
        }
        return $cousre;
    }
    function getCourseExams($id){
        $query="SELECT * FROM exams WHERE courseId=$id";
        $result=executeQuery($query);
        $cousre=array();
        if($result){
            for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
                $cousre[$i]=$row;
            }
        }
        return $cousre;
    }
    function getCourseAssignments($id){
        $query="SELECT * FROM assignment WHERE courseId=$id";
        $result=executeQuery($query);
        $cousre=array();
        if($result){
            for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
                $cousre[$i]=$row;
            }
        }
        return $cousre;
    }
    function getSearchCourse($name){
        $query="SELECT * FROM courses WHERE courseTitle like '%$name%' or courseNo like '$name'";
        $result=executeQuery($query);
        $courseList=array();
        if($result){
           for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
               $courseList[$i]=$row;
           }
        }
        return $courseList;
    }
    function editUser($user){
        $query="UPDATE users SET firstName='$user[firstName]',lastName='$user[lastName]',phnNo='$user[phone]',email='$user[email]' WHERE uid=$user[id]";
        return executeNonQuery($query);
    }
    function deleteUser($id){
        $query="DELETE FROM users WHERE uid=$id";
        return executeNonQuery($query);
    }
    function deleteUserFromLog($email){
        $query="DELETE FROM login WHERE email='$email'";
        return executeNonQuery($query);
    }
    function editPassword($user){
        $query="UPDATE users SET password='$user[password]' WHERE email='$user[email]'";
        return executeNonQuery($query);
    }
    function editPasswordFromLog($user){
        $query="UPDATE login SET password='$user[password]' WHERE email='$user[email]'";
        return executeNonQuery($query);
    }
    function getAllCourseByName($Name){
        $query="SELECT * FROM courses where facultyName='$Name'";
        $result=executeQuery($query);
        $courseList=array();
        if($result){
           for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
               $courseList[$i]=$row;
           }
        }
        return $courseList;
    }
    function getFacultyById($id){
        $query="SELECT * FROM facultys WHERE facultyId=$id";
        $result=executeQuery($query);
        $user=null;
        if($result){
            $user=mysqli_fetch_assoc($result);
        }
        return $user;
    }
    function getMessage($email){
        $query="SELECT messageFrom,messageTo,messageDetail FROM messages where messageFrom='$email' or messageTo='$email'";
        $result=executeQuery($query);
        $message=array();
        if($result){
           for ($i=0; $row =mysqli_fetch_assoc($result) ; $i++) { 
               $message[$i]=$row;
           }
        }
        return $message;
    }
    function addMessage($user){
        $query="INSERT INTO messages(messageFrom,messageTo,messageDetail) VALUES('$user[email]','$user[to]','$user[detail]')";
        return executeNonQuery($query);
    }
?>