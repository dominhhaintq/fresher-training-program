<p>Danh sách sinh viên</p>
<a href="../Controller/StudentManagement.php?add=true">Thêm mới</a>
<?php foreach ($students as $student):?>
    <p>Mã sinh viên: <?php echo $student['student_id']?></p>
    <p>Tên sinh viên: <?php echo $student['student_name']?></p>
    <p>Tuổi: <?php echo $student['student_age']?></p>
    <p>Giới tính: <?php echo $student['student_sex']?></p>
    <p>Profile: <?php echo $student['student_profile']?></p>
    <a href="../Controller/StudentManagement.php?edit=true&&id=<?php echo $student['student_id']?>">Sửa</a>
    <a href="../Controller/StudentManagement.php?delete=true&&id=<?php echo $student['student_id']?>">Xóa</a>
    <br/>
<?php endforeach;?>
