<?php include("include/header.php");
 $courses = new Courses($database);
 $course_list = $courses->get_courses();
?>
    <div class="main-container">
        <section class="lister">
            <div class="header">
               <h3>Course List</h3>
            </div>
            <?php           
                 if(count($course_list) > 0)
                 {
                    foreach ($course_list as $course_item)
                    {
            ?>
                    <div class="ass-item">
                        <div class="content">
                            <div class="course">
                                <strong><?= $course_item['courseName'] ?></strong>
                            </div>
                        </div>
                        <a href="exe/exe.php?Ccourse-name=<?= $course_item['courseName']; ?>" class="delete-btn">x</a>
                    </div>
            <?php   
                 }
                 
              }
              else
                 {
                    echo "<h1 class='empty'>!No course yet </h1>";
                 }
            ?>          

        </section>
        
        <section class="adder">
            <h4>Add Course</h4>
            <form action="exe/exe.php" method="post">
                <div class="input-wrapper">
                    <input type="text" name="course-name" placeholder="Name" class="input" required>
                </div>
                <div>
                    <input type="submit" name='add-course' value="ADD" class="add-btn">
                </div>
            </form>
            <div class="link-wrapper">
                <a href="assignment_list.php">View & Add Assignment</a>
            </div>
        </section>
        <!-- error handling------------------------------- -->
        <?php
          if(isset($_GET['error']))
          {
              echo "<h3> $_GET[error] </h3>";
              unset($_GET['error']);
          }
          ?>
        <!-- --------------------------------------------- -->
    </div>
<?php include("include/footer.php");?>

