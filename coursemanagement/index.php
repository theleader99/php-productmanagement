<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<!-- Navigation -->
<?php include "includes/navigation.php";?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            
            
            
                $query = "SELECT * FROM products ";
                $select_all_course_query = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($select_all_course_query)){
                        $course_id = $row['course_id'];
                        $course_title = $row['course_title'];
                        $course_teacher = $row['course_teacher'];
                        $course_date = $row['course_date'];
                        $course_image = $row['course_image'];
                        $course_content = substr($row['course_content'],0,100);
                        
                ?>
            <!--
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
-->

            <!-- First Blog Post -->
            <h2>
                <a href="course.php?p_id=<?php echo $course_id; ?>"><?php echo $course_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $course_teacher?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?php echo $course_date?></p>
            <hr>
            <a href="course.php?p_id=<?php echo $course_id; ?>">
                <img class="img-responsive" src="images/<?php echo $course_image;?>" alt="">
            </a>

            <hr>
            <p><?php echo $course_content?></p>
            <a class="btn btn-primary" href="course.php?p_id=<?php echo $course_id; ?>">Tìm hiểu thêm<span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>



            <?php  } ?>






        </div>


        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
    <?php include "includes/footer.php";?>
