<?php 

if(isset($_POST['create_course'])){
    
    $course_title = $_POST['course_title'];
    $course_teacher = $_POST['course_teacher'];
    $course_category_id = $_POST['course_category'];
    $course_status = $_POST['course_status'];
    $course_image = $_FILES['image']['name'];
    $course_image_temp = $_FILES['image']['tmp_name'];
    
    $course_tags = $_POST['course_tags'];
    $course_content = $_POST['course_content'];
    $course_date = date('d-m-y');
   // $course_comment_count = 4;
    
    
    move_uploaded_file($course_image_temp,"../images/$course_image");
    $query = "INSERT INTO products ( course_title, course_teacher, course_category_id, course_date, course_image, course_content, course_tags, course_status)";
    
    $query .= "VALUES ('{$course_title}','{$course_teacher}','{$course_category_id}',now(),'{$course_image}','{$course_content}','{$course_tags}','{$course_status}')";
    
    $create_course_query = mysqli_query($connection, $query);
    
    confirmQuery($create_course_query);
    
    echo "Khóa học đã được tạo: " . " " . "<a href='courses.php'>Xem tất cả khóa học</a> "; 
}


?>





<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Tên khóa học</label>
        <input type="text" class="form-control" name="course_title">
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
        <label for="course_teacher">Người dạy khóa học</label>
        <input type="text" class="form-control" name="course_teacher">
    </div>




    <div class="form-group">
        <select name="course_status" id="">
            <option value="">Trạng thái khóa học</option>
            <option value="có sẵn">có sẵn</option>
            <option value="không có sẵn">không có sẵn</option>
        </select>
    </div>

    <div class="form-group">
        <label for="course_image">Ảnh khóa học</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="course_tags">Thẻ khóa học</label>
        <input type="text" class="form-control" name="course_tags">
    </div>



    <div class="form-group">
        <label for="course_content">Nội dung khóa học</label>
        <textarea class="form-control" name="course_content" id="" cols="30" rows="10">

       </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_course" value="Thêm khóa học">
    </div>

</form>
