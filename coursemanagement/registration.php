<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<?php

if(isset($_POST['submit'])){
    echo "It's worked";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    if(!empty($username) && !empty($email) && !empty($password)){
        
        
        
          // mysqli_real_escape_string: dung de tranh truong hop bi SQL injection, dung de bao mat/bao ve website
    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    
    
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    
    if(!select_randsalt_query){
        die("Query Failed" . mysqli_error($connection));
    }
    $row = mysqli_fetch_array($select_randsalt_query);
    
    $salt = $row['randSalt'];
        
//    $password = crypt($password, $salt);
    
    $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
    $query .= "VALUES('{$username}','{$email}', '{$password}', 'khách hàng chưa mua khóa học')";
    $register_user_query = mysqli_query($connection, $query);
    if(!$register_user_query){
        die("QUERY FAILED". mysqli_error($connection) . ' ' . mysqli_error($connection));
    }
    
    $message = "Đăng ký của bạn đã được gửi";   
        
    }
    else{
        $message = "Chỗ này không được để trống";
    }
    
   
    
}
else{
    
    $message = "";
}



?>



<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>



<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row" style="margin-top:100px">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Đăng ký</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                           
                           <h6 class="text-center"><?php echo $message; ?></h6>
                           
                            <div class="form-group">
                                <label for="username" class="sr-only">Tài khoản</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên tài khoản">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Mật khẩu</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Mật khẩu">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Đăng ký">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php";?>
