<?php
require_once ('../Model/Student.php');
require_once ('../Model/StudentDB.php');

const MAX_SIZE = 2 * 1024 * 1024;


class ManageStudent
{
    public function index()
    {

        $studentDB = new StudentDB();
        $students = $studentDB->getAllStudents();
        require ('../View/index.php');
    }
    
    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['age']) && isset($_POST['sex']) && isset($_FILES['profile'])){
                if ($_FILES['profile']["size"] < MAX_SIZE) {
//                    $target_dir = realpath(dirname(__DIR__)) . '/upload/';
//                    $target_file = $target_dir . $_POST['id'];
                    $endFile = strstr($_FILES['profile']['name'], '.');
                    move_uploaded_file($_FILES['profile']["tmp_name"], "../upload/".$_POST['id'].$endFile);
                    $name = $_POST['name'];
                    $id = $_POST['id'];
                    $age = $_POST['age'];
                    $sex = $_POST['sex'];
                    $profile = $_POST['id'].$endFile;
                    $student = new Student($name, $age, $id, $sex, $profile);
                    $studentDB = new StudentDB();
                    $studentDB->addStudent($student);
                }
                header("Location: ../Controller/StudentManagement.php");
            }
        }
        
        require_once ('../View/addStudent.php');
    }
    
    public function editStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['age']) && isset($_POST['sex'])){
                if ($_FILES['profile']){
                    $endFile = strstr($_FILES['profile']['name'], '.');
                    move_uploaded_file($_FILES['profile']["tmp_name"], "../upload/".$_POST['id'].$endFile);
                    $profile = $_POST['id'].$endFile;
                } else{
                    $studentDB = new StudentDB();
                    $student = $studentDB->getStudent($_POST['id']);
                    $profile = $student['student_profile'];
                }
                $name = $_POST['name'];
                $id = $_POST['id'];
                $age = $_POST['age'];
                $sex = $_POST['sex'];
                $student = new Student($name, $age, $id, $sex, $profile);
                $studentDB = new StudentDB();
                $studentDB->editStudent($student);
                header("Location: ../Controller/StudentManagement.php");
            }
        }
        $id = $_GET['id'];
        $studentDB = new StudentDB();
        $student = $studentDB->getStudent($id);
        require_once ('../View/editStudent.php');
    }

    public function deleteStudent()
    {
        $id = $_GET['id'];
        $studentDB = new StudentDB();
        $studentDB->deleteStudent($id);
        header("Location: ../Controller/StudentManagement.php");
    }
}

$manageStudent = new ManageStudent();
if (isset($_GET['edit']) && $_GET['edit']=="true"){
    $manageStudent->editStudent();
} else if (isset($_GET['add']) && $_GET['add']=="true"){
    $manageStudent->addStudent();
} else if (isset($_GET['delete']) && $_GET['delete']=="true") {
    $manageStudent->deleteStudent();
} else {
    $manageStudent->index();
}
