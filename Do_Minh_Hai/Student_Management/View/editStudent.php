<form method="post">
    <p>
        <label for="id">ID: </label>
        <input type="text" name="id" id="id" value="<?php echo $student['student_id']?>" readonly>
    </p>
    <p>
        <label for="name">Tên sinh viên: </label>
        <input type="text" name="name" id="name" value="<?php echo $student['student_name']?>">
    </p>
    <p>
        <label for="age">Tuổi: </label>
        <input type="text" name="age" id="age" value="<?php echo $student['student_age']?>">
    </p>
    <p>
        <label for="sex">Giới tính: </label>
        <input type="text" name="sex" id="sex" value="<?php echo $student['student_sex']?>">
    </p>
    <p>
        <label for="sex">Profile: </label>
        <input type="file" name="profile" id="profile" value="<?php echo $student['profile']?>">
    </p>
    <p>
        <input type="submit" name="add" id="name" value="Cập nhật">
    </p>
</form>
