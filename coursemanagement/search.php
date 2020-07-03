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
                
                
                  
                if(isset($_POST['submit']))
                
                $search =  $_POST['search'];
                $query = "SELECT * FROM products WHERE course_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection,$query);
                
                if(!$search_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                
                $count = mysqli_num_rows( $search_query);
                if($count == 0){
                    echo "<h1> NO RESULT</h1>";         
                }
                else{
                    
                                    
           
                    
                    while($row = mysqli_fetch_assoc($search_query)){
                        $course_title = $row['course_title'];
                        $course_teacher = $row['course_teacher'];
                        $course_date = $row['course_date'];
                        $course_image = $row['course_image'];
                        $course_content = $row['course_content'];
                        
                ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

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
                    <a class="btn btn-primary" href="#">Tìm hiểu thêm<span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    


       <?php  } 
                    
                }
                ?>
                
                
                
                
                

                    
                
                
                

               
            </div>


            <!-- Blog Sidebar Widgets Column -->
            
            <?php include "includes/sidebar.php";?>
      
        </div>
        <!-- /.row -->

        <hr>
         <!-- Footer -->
<?php include "includes/footer.php";?>
       