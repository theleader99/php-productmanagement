<?php include "includes/admin_header.php"?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include"includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">



                    <div class="col-xs-6">
                        <?php insert_categories();?>



                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Thêm thể loại</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>

                            <div class="form-group">

                                <input class="btn btn-primary" type="submit" name="submit" value="Thêm thể loại">
                            </div>

                        </form>


                        <?php
                            // UPDATE AND INCLUDE QUERY
                            if(isset($_GET['edit'])){
                                
                                $cat_id = $_GET['edit'];
                                
                                include "includes/update_categories.php";
                            }
                            
                            
                            ?>


                    </div> <!-- Add Category Form -->
                    <div class="col-xs-6">



                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thể loại khóa học</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--FIND ALL CATEGORIES QUERY -->

                                <?php findAllCategories();?>

                                <!--DELETE QUERY -->
                                <?php deleteCategories();?>



                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"?>
