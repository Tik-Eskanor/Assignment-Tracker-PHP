<?php

 class Courses
 {
     public $dbc_obj;

     public function __construct(Database $obj)
     {
         $this->dbc_obj = $obj;
     }

     public function get_courses():array
     {
      
       $sql = "SELECT * FROM courses ORDER BY courseID";        
       $stmt = $this->dbc_obj->pdo->prepare($sql);
       $stmt->execute();
       $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
       $stmt->closeCursor();
       return $courses;
     }

     public function delete_course($course_name):bool
     {  
        $sql = "SELECT * FROM assignments WHERE courseName = :course_name";
        $result = $this->dbc_obj->pdo->prepare($sql);
        $result->execute(['course_name'=>$course_name]);
        $count = $result->rowCount();
        if(!$count > 0)
        {
            $sql= "DELETE FROM courses WHERE courseName = :course_name";
            $stmt = $this->dbc_obj->pdo->prepare($sql);
            $stmt->execute(['course_name'=>$course_name]);
            $stmt->closeCursor();
            return true;
        }
        else 
        {
            return false;
        }
     }


     public function add_course($course_name):bool
     {
         $sql = "SELECT * FROM courses WHERE courseName = :course_name";
         $result = $this->dbc_obj->pdo->prepare($sql);
         $result->execute(['course_name'=>$course_name]);
         $count = $result->rowCount();
         if(!$count > 0)
         {
            $sql= "INSERT INTO courses SET courseName = :course_name";
            $stmt = $this->dbc_obj->pdo->prepare($sql);
            $stmt->execute(['course_name'=>$course_name]);
            $stmt->closeCursor();
            return true;
         }
         else 
         {
             return false;
         }
        
     }
 }