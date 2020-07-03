<?php if(isset($_GET['p_id'])){
    
    $the_course_id =  ($_GET['p_id']);

    }


    $query = "SELECT * FROM products WHERE course_id = $the_course_id";
    $select_course_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_course_by_id)) {
        $course_id            = $row['course_id'];
        $course_teacher       = $row['course_teacher'];
        $course_title         = $row['course_title'];
        $course_category_id   = $row['course_category_id'];
        $course_status        = $row['course_status'];
        $course_image         = $row['course_image'];
        $course_content       = $row['course_content'];
        $course_tags          = $row['course_tags'];
        //$course_comment_count = $row['course_comment_count'];
        $course_date          = $row['course_date'];
        
         }


    if(isset($_POST['update_course'])){
     
        
        $course_title          =  $_POST['course_title'];
        $course_teacher        =  $_POST['course_teacher'];
        $course_category_id    =  $_POST['course_category'];
        $course_status         =  $_POST['course_status'];
        $course_image          =  $_FILES['image']['name'];
        $course_image_temp     =  $_FILES['image']['tmp_name'];
        $course_content        =  $_POST['course_content'];
        $course_tags           =  $_POST['course_tags'];
        
        move_uploaded_file($course_image_temp, "../images/$course_image"); 
        
        if(empty($course_image)) {
        
        $query = "SELECT * FROM products WHERE course_id = $the_course_id ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $course_image = $row['course_image'];
        
        }
        
        
}
        $course_title = mysqli_real_escape_string($connection, $course_title);

        
          $query = "UPDATE products SET ";
          $query .="course_title  = '{$course_title}', ";
          $query .="course_category_id = '{$course_category_id}', ";
          $query .="course_date   =  now(), ";
          $query .="course_teacher = '{$course_teacher}', ";
          $query .="course_status = '{$course_status}', ";
          $query .="course_tags   = '{$course_tags}', ";
          $query .="course_content= '{$course_content}', ";
          $query .="course_image  = '{$course_image}' ";
          $query .= "WHERE course_id = {$the_course_id} ";
        
        $update_course = mysqli_query($connection,$query);
        
        confirmQuery($update_course);
       
        
        echo "<p class='bg-success'>Khóa học đã được cập nhật: " . " " . "<a href='../course.php?p_id={$the_course_id}'>Xem tất cả khóa học </a> hoặc <a href='courses.php'>Sửa nhiều khóa học hơn</a></p> "; 
    
    
    }



?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Tên khóa học</label>
        <input value="<?php echo $course_title; ?>" type="text" class="form-control" name="course_title">
    </div>


    <div class="form-group">
        <select name="course_category" id="">
            <?php
            $query = "SELECT * FROM categories" ;
            $select_categories = mysqli_query($connection,$query);
                                    
            confirmQuery($select_categories);                   
                                
            while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
                                        
            echo "<option value='$cat_id'>{$cat_title}</option>";               
                                    
            }
           ?>

        </select>
    </div>


    <div class="form-group">
        <label for="title">Người dạy khóa học</label>
        <input value="<?php echo $course_teacher; ?>" type="text" class="form-control" name="course_teacher">
    </div>
    
    <div class="form-group">    
   <select name="course_status" id="">
       <option value=''><?php echo $course_status; ?></option>
       
       <?php 
       
            
          if($course_status == 'có sẵn' ) {
                echo "<option value='không có sẵn'>không có sẵn</option>";
          } else {
                echo "<option value='có sẵn'>có sẵn</option>";
          }
       ?>
       
   </select>
    </div>
   
    

    <div class="form-group">
        <img width="100" src="../images/<?php echo $course_image;?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Thẻ khoá học</label>
        <input value="<?php echo $course_tags; ?>" type="text" class="form-control" name="course_tags">
    </div>

    <div class="form-group">
        <label for="course_content">Nội dung bài viết</label>
        <textarea class="form-control" name="course_content" id="" cols="30" rows="10">
           <?php echo $course_content; ?>
       </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_course" value="Cập nhật khóa học">
    </div>

</form>
