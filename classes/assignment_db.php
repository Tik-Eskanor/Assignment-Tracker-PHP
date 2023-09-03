<?php

 class Assignment
 {
     public $dbc_obj;

     public function __construct(Database $obj)
     {
         $this->dbc_obj = $obj;
     }

     public function get_assignments($course_name):array
     {
       if($course_name)
       {
         $sql = "SELECT * FROM
         assignments WHERE  courseName = :course_name ORDER BY ID DESC";
          $stmt = $this->dbc_obj->pdo->prepare($sql);
          $stmt->execute(['course_name'=>$course_name]);
          $assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
       }
       else
       {
         $sql = "SELECT * FROM assignments  ORDER BY ID DESC";
         $stmt = $this->dbc_obj->pdo->query(query:$sql);
         $assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $stmt->closeCursor();
       }

       return $assignments;
     }

     public function delete_assignment($assignment_id)
     {
         $sql= "DELETE FROM assignments WHERE ID = :assignment_id";
         $stmt = $this->dbc_obj->pdo->prepare($sql);
         $stmt->execute(['assignment_id'=>$assignment_id]);
         $stmt->closeCursor();
     }

     public function add_assignment($course_name, $description)
     {
         $sql= "INSERT INTO assignments SET courseName = :course_name, Description = :description";
         $stmt = $this->dbc_obj->pdo->prepare($sql);
         $stmt->execute(['course_name'=>$course_name,'description'=>$description]);
         $stmt->closeCursor();
     }
 }