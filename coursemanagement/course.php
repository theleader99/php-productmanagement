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
            if(isset($_GET['p_id'])){
                
                $the_course_id = ($_GET['p_id']);
            }
            
            
                $query = "SELECT * FROM products WHERE course_id = $the_course_id";
                $select_all_course_query = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($select_all_course_query)){
                        $course_title = $row['course_title'];
                        $course_teacher = $row['course_teacher'];
                        $course_date = $row['course_date'];
                        $course_image = $row['course_image'];
                        $course_content = $row['course_content'];
                        
                ?>
            

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $course_title?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $course_teacher?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?php echo $course_date?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $course_image;?>" alt="">
            <hr>
            <p><?php echo $course_content?></p>
      
            <hr>



            <?php  } ?>




            

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h2>Ý kiến của bạn</h2>
                <form role="form">
                    <h3>Đánh giá</h3>
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <h3>Email</h3>
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <h3>Địa chỉ</h3>
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            

            <!-- Comment -->
           





        </div>


        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php";?>

    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
    <?php include "includes/footer.php";?>
