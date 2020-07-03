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
                           
                        </h1>
                        
                    <?php 
                        
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }
                        else{
                            $source = '';
                        }
                        switch($source){
                                case 'add_courses';
                                include "includes/add_courses.php";
                                break;
                                
                                case 'edit_courses';
                                include "includes/edit_courses.php";
                                break;
                                
                                case '200';
                                echo "NICE 200";
                                break;
                                
                                default;
                                
                                include "includes/view_all_courses.php";
                                
                                break;
                        }

                        

    
        
                        
                        ?>
                
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


 <?php include "includes/admin_footer.php"?>   