<?php


if (isset($_POST['checkBoxArray'])) {



    foreach ($_POST['checkBoxArray'] as $courseValueId) {

        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
                            case 'không có sẵn':
                                    
                                    $query = "UPDATE products SET course_status = '{$bulk_options}' WHERE course_id = {$courseValueId} "; 
                                    $update_to_kcs_status = mysqli_query($connection, $query);
                                    confirmQuery($update_to_kcs_status);
                                    break;
                                    
                                    
                            case 'có sẵn':

                                    $query = "UPDATE products SET course_status = '{$bulk_options}' WHERE course_id = {$courseValueId}  ";
                                    $update_to_cs_status = mysqli_query($connection, $query);
                                    confirmQuery($update_to_cs_status);
                                    break;
                                    
                                    
                                    
                            case 'xóa':
                                    
                                    $query = "DELETE FROM products WHERE course_id = {$courseValueId}  ";
                                    $update_to_delete_status = mysqli_query($connection, $query);
                                    confirmQuery($update_to_delete_status);
                                    break;

                $query = "SELECT * FROM products WHERE course_id = '{$courseValueId}' ";
                $select_course_query = mysqli_query($connection, $query);



                while ($row = mysqli_fetch_array($select_course_query)) {
                    $course_title = $row['course_title'];
                    $course_category_id = $row['course_category_id'];
                    $course_date = $row['course_date'];
                    $course_teacher = $row['course_teacher'];
                    $course_status = $row['course_status'];
                    $course_image = $row['course_image'];
                    $course_tags = $row['course_tags'];
                    $course_content = $row['course_content'];
                                     
                }


                $query = "INSERT INTO products(course_category_id, course_title, course_teacher, course_date,course_image,course_content,course_tags,course_status) ";

                $query .= "VALUES({$course_category_id},'{$course_title}','{$course_teacher}',now(),'{$course_image}','{$course_content}','{$course_tags}', '{$course_status}') ";

                $copy_query = mysqli_query($connection, $query);

                if (!$copy_query) {

                    die("QUERY FAILED" . mysqli_error($connection));
                }

                break;
        }
    }
}




?>




<form action="" method='post'>

    <table class="table table-bordered table-hover">


        <div id="bulkOptionContainer" class="col-xs-4">

            <select class="form-control" name="bulk_options" id="">
                <option value="">Lựa chọn</option>
                <option value="không có sẵn">không có sẵn</option>
                <option value="có sẵn">có sẵn</option>
                <option value="xóa">xóa</option>
            </select>

        </div>


        <div class="col-xs-4">

            <input type="submit" name="submit" class="btn btn-success" value="Áp dụng">
            <a class="btn btn-primary" href="courses.php?source=add_courses">Thêm mới</a>

        </div>



        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Người dạy</th>
                <th>Tên khóa học</th>
                <th>Loại khóa học</th>
                <th>Trạng thái</th>
                <th>Hình ảnh</th>
                <th>Thẻ</th>
                <th>Ngày</th>
                <th>Nội dung khóa học</th>
                <th>Xem khóa học</th>
            </tr>
        </thead>

        <tbody>


            <?php

            $query = "SELECT * FROM products ORDER BY course_id DESC ";
            $select_course = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_course)) {
                    $course_id = $row['course_id'];
                    $course_teacher = $row['course_teacher'];
                    $course_title = $row['course_title'];
                    $course_category_id = $row['course_category_id'];
                    $course_status = $row['course_status'];
                    $course_image = $row['course_image'];
                    $course_tags = $row['course_tags'];
                    $course_date = $row['course_date'];
                    $course_content = $row['course_content'];
                echo "<tr>";

            ?>

            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $course_id; ?>'></td>


            <?php

                                    echo "<td>$course_id</td>";
                                   echo "<td>$course_teacher</td>";
                                   echo "<td>$course_title</td>";

                                   $query = "SELECT * FROM categories WHERE cat_id = {$course_category_id} ";
                                   $select_categories_id = mysqli_query($connection,$query);

                                   while($row = mysqli_fetch_assoc($select_categories_id)){
                                   $cat_id = $row['cat_id'];
                                   $cat_title = $row['cat_title'];


                                   echo "<td>{$cat_title}</td>";
                                   }






                                   echo "<td>$course_status</td>";
                                   echo "<td><img width='100' src='../images/$course_image' alt='image'></td>";
                                   echo "<td>$course_tags</td>";
                                   // echo "<td>$course_comment_count</td>";
                                   echo "<td>$course_date</td>";
                                   echo "<td>$course_content</td>";
                                    echo "<td><a href='../course.php?p_id={$course_id}'>Xem khóa học</a></td>";
                                   echo "<td><a href='courses.php?source=edit_courses&p_id={$course_id}'>Sửa</a></td>";
                                   echo "<td><a onClick=\"javascript: return confirm('Bạn có chắc chắn muốn xóa không?'); \" href='courses.php?delete={$course_id}'>Xóa</a></td>";

                                   echo "</tr>";

                                   };


                ?>




        </tbody>
    </table>

</form>




<?php 
                            if(isset($_GET['delete'])){
                                $the_course_id = $_GET['delete'];
                                    $query = "DELETE FROM products WHERE course_id = {$the_course_id}";
                                    $delete_query = mysqli_query($connection, $query);
                            }    
        
?>

</script>
