<?php
 class Database
 {
     private string $user = "root";
     private string $password = "";
     private string $DNS = "mysql:host=localhost;dbname=assignment_tracker";

     public $pdo = null;

     public function __construct()
     {
         $this->pdo = new PDO($this->DNS, $this->user, $this->password);
         try
         {
            $this->pdo;
         }
         catch(PDOException $err)
         {
             $error = "Database error: ";
             $error.= $err->getMesage();
             include("../view/error.php");
         }
     }
 }
//  $host = "localhost";
//  $username = "root";
//  $password  = "";

//  try {
//     $dbase = new PDO($host,$username,$password);
//  } catch (PDOExeption,$err) {
//      $error = "Database Error: ";
//      $error .= $err->get_message();
//      include("../view/error.php");
//  }
