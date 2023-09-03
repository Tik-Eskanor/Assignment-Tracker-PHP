<?php include("include/header.php");

   $courses = new Courses($database);
   $courses_list = $courses->get_courses();
   $assignments = new Assignment($database);

?>
    <div class="main-container">
        <section class="lister">
            <div class="header">
               <h3>Assignments</h3>
               <form action="#" method="post">
                   <select name="course-name" id="" class="select">
                    <option value="<?= null ?>">view ALL</option>
                    <?php
                    if(count($courses_list) > 0)
                    {
                        foreach($courses_list as $course)
                        {
                    ?>
                        <option value="<?= $course['courseName'] ?>"><?= $course['courseName'] ?></option>
                    <?php
                        }
                    }
                    else
                    {
                        echo "<option value=''>  </option>";
                    }
                    ?>
                   </select>
                   <button type="submit" name="go" class="submit">Go</button>
               </form>
            </div>
            <?php
               if(isset($_POST['go']))
               {
                  $course_name = $_POST['course-name'];
                  $assignment_list = $assignments->get_assignments($course_name);

                  foreach($assignment_list as $assignment)
                  {
            ?>
                    <div class="ass-item">
                        <div class="content">
                            <div class="course">
                                <strong><?= $assignment['courseName'];?></strong>
                            </div>
                            <div class="description">
                              <?= $assignment['Description']; ?>
                            </div>
                        </div>
                        <a href="exe/exe.php?assID=<?= $assignment['ID']; ?>" class="delete-btn">x</a>
                    </div>    
            <?php
                  }
               }
               else
               {
                $assignment_list = $assignments->get_assignments(null);
                foreach($assignment_list as $assignment)
                  {
            ?>
                    <div class="ass-item">
                        <div class="content">
                            <div class="course">
                                <strong><?= $assignment['courseName']; ?></strong>
                            </div>
                            <div class="description">
                              <?= $assignment['Description']; ?>
                            </div>
                        </div>
                        <a href="exe/exe.php?assID=<?= $assignment['ID']; ?>" class="delete-btn">x</a>
                    </div>    
            <?php
                  }
               }
            ?>                   
        </section>
        
        <section class="adder">
            <h4>Add Assignment</h4>
            <form action="exe/exe.php" method="post">
                <div class="input-wrapper">
                <select name="course-name" id="" class="input" required>
                    <option value="">view ALL</option>
                    <?php
                        if(count($courses_list) > 0)
                        {
                            foreach($courses_list as $course)
                            {
                        ?>
                            <option value="<?= $course['courseName'] ?>"><?= $course['courseName'] ?></option>
                        <?php
                            }
                        }
                        else
                        {
                            echo "<option value = ''> </option>";
                        }
                    ?>
                   </select>
                    <input type="text" name="description" placeholder="Description" class="input" required maxlength="150">
                </div>
                <div>
                    <input type="submit" name="add-assignment" value="ADD" class="add-btn">
                </div>
            </form>
            <div class="link-wrapper">
                <a href="course_list.php">View & Edit courses</a>
            </div>
        </section>
    </div>
<?php include("include/footer.php");?>