<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Quản lý khóa học</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                
                <?php 
                    
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection,$query);
                    
                    while($row = mysqli_fetch_assoc($select_all_categories_query)){
                          $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li><a href = 'category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                    
                    ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    
                    <li>
                        <a href="registration.php">Đăng ký</a>
                    </li>
                   <?php
                   
                    
                    
                        if(isset($_SESSION['user_role'])) {

                            if(isset($_GET['p_id'])) {

                              $the_course_id = $_GET['p_id'];

                            echo "<li><a href='/cms/admin/courses.php?source=edit_courses&p_id={$the_course_id}'>Sửa khóa học</a></li>";

                            }

                        }

                   ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div style="height:100px"></div>