<?php
   

   if(isset($_POST['create_user'])) {
       
           // $user_id           = $_POST['user_id'];
            $user_firstname    = $_POST['user_firstname'];
            $user_lastname     = $_POST['user_lastname'];
            $user_role         = $_POST['user_role'];
            $username          = $_POST['username'];
            $user_email        = $_POST['user_email'];
            $user_password     = $_POST['user_password'];



            //$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));    
              
            $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
                 
            $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') "; 
                 
            $create_user_query = mysqli_query($connection, $query);  
              
            confirmQuery($create_user_query); 
       
       
                 echo "Người dùng đã được tạo: " . " " . "<a href='users.php'>Xem tất cả người dùng</a> "; 
       
      
   
   }
    

    
    
?>

<form action="" method="post" enctype="multipart/form-data">



    <div class="form-group">
        <label for="title">Tên</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>




    <div class="form-group">
        <label for="course_status">Họ</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>


    <div class="form-group">

        
        <select name="user_role" id="">
        <option value="subscriber">Lựa chọn</option>
          <option value="Khách hàng đã mua khóa học">Khách hàng đã mua khóa học</option>
          <option value="Khách hàng chưa mua khóa học">Khách hàng chưa mua khóa học</option>
           
        
       
        
        <?php 
            
//            $query = "SELECT * FROM users";
//            $select_user = mysqli_query($connection, $query);
//            
//            confirmQuery($select_user);
//            
//            while($row = mysqli_fetch_assoc($select_user)){
//                $user_id = $row['user_id'];
//                $user_role = $row['user_role'];
//                
//                echo "<option value = '$user_id'>{$user_role}</option>";
//            }
//            
        ?>


        </select>




    </div>

    <!--
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
-->

    <div class="form-group">
        <label for="course_tags">Người dùng</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="course_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="course_content">Mật khẩu</label>
        <input type="password" class="form-control" name="user_password">
    </div>




    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Thêm người dùng">
    </div>


</form>
