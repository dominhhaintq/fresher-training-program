<?php
session_start();
class StudentDB
{

    // get all students session
    /**
     * StudentDB constructor.
     */
    public function __construct()
    {
    }

    public function getAllStudents()
    {
        $students = isset($_SESSION['students']) ? $_SESSION['students'] : array();

        return $students;
    }

    public function getStudent($student_id)
    {
        $students = $this->getAllStudents();

        foreach ($students as $student)
        {
            if ($student['student_id'] == $student_id){
                return $student;
            }
        }

        return array();
    }

    public function deleteStudent($student_id)
    {
        $students = $this->getAllStudents();
        foreach ($students as $key => $item) {
            if ($item['student_id'] == $student_id) {
                unset($students[$key]);
                unlink('../upload/'.$item['student_profile']);
            }
        }
        $_SESSION['students'] = $students;
    }
    
    public function editStudent(Student $student)
    {
        $students = $this->getAllStudents();
        $new_student = array(
            'student_id' => $student->getId(),
            'student_name' => $student->getName(),
            'student_age' => $student->getAge(),
            'student_sex' => $student->getSex(),
            'student_profile' => $student->getProfile()
        );

        foreach ($students as $key => $student) {
            if ($student['student_id'] == $new_student['student_id']) {
                $students[$key] = $new_student;
                break;
            }
        }

        $_SESSION['students'] = $students;
    }

    public function addStudent(Student $student)
    {
        $students = $this->getAllStudents();
        $new_student = array(
            'student_id' => $student->getId(),
            'student_name' => $student->getName(),
            'student_age' => $student->getAge(),
            'student_sex' => $student->getSex(),
            'student_profile' => $student->getProfile()
        );
        $students[] = $new_student;
        $_SESSION['students'] = $students;
    }

}
