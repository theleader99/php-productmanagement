                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Tên</th>
                                    <th>Họ</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php 
                                
                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connection,$query);
                                    
                                 while($row = mysqli_fetch_assoc($select_users)){
                                    $user_id  = $row['user_id'];
                                    $username = $row['username'];
                                    $user_password = $row['user_password'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];
                                     
                                    echo "<tr>";
                                     
                                    echo "<td>$user_id </td>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_firstname</td>";
                                     
//                                    $query = "SELECT * FROM categories WHERE cat_id = {$course_category_id} ";
//                                    $select_categories_id = mysqli_query($connection,$query);
//                                    
//                                    while($row = mysqli_fetch_assoc($select_categories_id)){
//                                     $cat_id = $row['cat_id'];
//                                     $cat_title = $row['cat_title'];
//                                     
//                                     
//                                     echo "<td>{$cat_title}</td>";
//                                    }
//                                     
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>";
                                     
                                     
                                     
                                     
                               
                                    echo "<td><a href='users.php?change_to_admin={$user_id}'>Khách hàng đã mua khóa học</a></td>";
                                    echo "<td><a href='users.php?change_to_sub={$user_id}'>Khách hàng chưa mua khóa học</a></td>";
                                    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Sửa</a></td>";
                                    echo "<td><a href='users.php?delete={$user_id}'>Xóa</a></td>";
                                    echo "</tr>";
                                 }
                                ?>

                                <!--
                            
                            <tr>
                                <td>4</td>
                                <td>Thang Vu</td>
                                <td>Bootstrap Framework</td>
                                <td>Course</td>
                                <td>Trạng thái</td>
                                <td>Hình ảnh</td>
                                <td>Thẻ</td>
                                <td>Bình luận</td>
                                <td>Ngày</td>
                            </tr>
-->
                            </tbody>
                        </table>


                        <?php 


                        if(isset($_GET['change_to_admin'])) {

                            $the_user_id = $_GET['change_to_admin'];

                            $query = "UPDATE users SET user_role = 'Khách hàng đã mua khóa học' WHERE user_id = $the_user_id   ";
                            $change_to_admin_query = mysqli_query($connection, $query);
                            header("Location: users.php");


                        }



                        if(isset($_GET['change_to_sub'])){

                            $the_user_id = $_GET['change_to_sub'];

                            $query = "UPDATE users SET user_role = 'Khách hàng chưa mua khóa học' WHERE user_id = $the_user_id   ";
                            $change_to_sub_query = mysqli_query($connection, $query);
                            header("Location: users.php");



                        }







                        if(isset($_GET['delete'])){

                                    $the_user_id = $_GET['delete'];

                                    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
                                    $delete_user_query = mysqli_query($connection, $query);
                                    header("Location: users.php");

   


   
    
    }







                        ?>
