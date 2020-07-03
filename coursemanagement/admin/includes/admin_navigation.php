        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Thắng Admin</a>
            </div>
            <!-- Top Menu Items -->
            
            
            
            <ul class="nav navbar-right top-nav">
               <li><a href="../index.php">Quay về trang chủ</a></li>
               
                
                
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php
                    
                    if(isset($_SESSION['username'])) {

    
                        echo $_SESSION['username'];

                    }
                    ?>
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i>Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i>Thống kê</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Khóa học <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./courses.php">Xem tất cả khóa học</a>
                            </li>
                            <li>
                                <a href="courses.php?source=add_courses">Thêm khóa học</a>
                            </li>
                        </ul>
                    </li>
                    <li >
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Thể loại</a>
                    </li>
                  
                  
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Người dùng <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">Xem tất cả người dùng</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Thêm người dùng</a>
                            </li>
                        </ul>
                    </li>
                      
                </ul>
            </div>
            
            
            <!-- /.navbar-collapse -->
        </nav>