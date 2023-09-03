<?php 
include("../classes/database.php");
$database = new Database();

include("../classes/assignment_db.php");
$assignments = new Assignment($database);

include("../classes/courses_db.php");
$courses = new Courses($database);


  if(isset($_POST['add-course']))
  {
    $course_name = $_POST['course-name'];
    if($courses->add_course($course_name))
    {
      header("location:../course_list.php");
    }
    else 
    {
      header("location:../course_list.php?error=Course Already Exists");
    }

  }

  if(isset($_GET['Ccourse-name']))
  {
    $course_name = $_GET['Ccourse-name'];
    if($courses->delete_course($course_name))
    {
      header("location:../course_list.php");
    }
    else 
    {
      header("location:../course_list.php?error=Cant Delete Course With Assignment");
    }
  }

  if(isset($_GET['assID']))
  {
    $ass_id = $_GET['assID'];
    $assignments->delete_assignment($ass_id);
    header("location:../assignment_list.php");
  }



  if(isset($_POST['add-assignment']))
  {
    $course_name = $_POST['course-name'];
    $description = $_POST['description'];

    $assignments->add_assignment($course_name,$description);
    header("location:../assignment_list.php");
  }
