<?php include "includes/admin_header.php"?>

<div id="wrapper">




    <!-- Navigation -->
    <?php include"includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Chào mừng đến với trang Admin

                        <small>
                            <?php
                            if(isset($_SESSION['username'])) {

                            echo $_SESSION['username'];

                            }
                            ?>
                        </small>
                    </h1>

                </div>
            </div>

            <!-- /.row -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php 
                                    
                                    $query = "SELECT * FROM products";
                                    $select_all_course = mysqli_query($connection, $query);
                                    $course_counts = mysqli_num_rows($select_all_course);
                                    echo "<div class = 'huge'>{$course_counts}</div>";
                                    ?>


                                    <div>Khóa học</div>
                                </div>
                            </div>
                        </div>
                        <a href="courses.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php 
                                    
                                    $query = "SELECT * FROM users";
                                    $select_all_user= mysqli_query($connection, $query);
                                    $user_counts = mysqli_num_rows($select_all_user);
                                    echo "<div class = 'huge'>{$user_counts}</div>";
                                    ?>

                                    <div>Người dùng</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php 
                                    
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection, $query);
                                    $categories_counts = mysqli_num_rows($select_all_categories);
                                    echo "<div class = 'huge'>{$categories_counts}</div>";
                                    ?>

                                    <div>Thể loại</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <?php
            
                $query = "SELECT * FROM products WHERE course_status = 'không có sẵn'";
                $select_all_unavailable_courses = mysqli_query($connection, $query);
                $course_unavailable_counts = mysqli_num_rows($select_all_unavailable_courses);
            
            
                $query = "SELECT * FROM products WHERE course_status = 'có sẵn'";
                $select_all_available_courses = mysqli_query($connection, $query);
                $course_available_counts = mysqli_num_rows($select_all_available_courses);
            
            
            
                $query = "SELECT * FROM users WHERE user_role = 'Khách hàng chưa mua khóa học'";
                $select_all_subscriber = mysqli_query($connection, $query);
                $subcribers_counts = mysqli_num_rows($select_all_subscriber);
            
                $query = "SELECT * FROM users WHERE user_role = 'Khách hàng đã mua khóa học'";
                $select_all_admin = mysqli_query($connection, $query);
                $admin_counts = mysqli_num_rows($select_all_admin);
            
            
            ?>


            <div class="row">


                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Các trường trong biểu đồ', 'Đếm'],

                            <?php 
                            
                            $elements_text = ['Khóa học có sẵn','Khóa học không có sẵn','Khách hàng chưa mua khóa học','Khách hàng đã mua khóa học','Thể loại'];
                            $elements_count = [$course_available_counts, $course_unavailable_counts, $subcribers_counts, $admin_counts, $categories_counts];
                            
                            for($i = 0;$i < 5; $i++){
                                echo "['{$elements_text[$i]}'" . "," . "{$elements_count[$i]}],";
                            }
                            
                            ?>



                        ]);

                        var options = {
                            chart: {
                                title: 'Biểu đồ ',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }

                </script>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>
