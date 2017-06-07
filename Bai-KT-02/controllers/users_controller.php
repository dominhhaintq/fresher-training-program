<?php
class UsersController
{
    public function listUsers()
    {
        $users = User::all();
        require_once('views/users/list-users.php');
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ( !empty($_POST["user_name"])
                && !empty($_POST["user_email"])
                && !empty($_POST["pass"])
                && !empty($_POST["status"])) {
                $user_name = $_POST["user_name"];
                $user_email = $_POST["user_email"];
                $pass = $_POST["pass"];
                $status = $_POST["status"];
                $bool = User::add($user_name, $user_email, $pass, $status);
                header("Location: ./index.php?controller=users&&action=listUsers");
            }
        }
        require_once('views/users/add-user.php');
    }

    public function editUser()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $user = User::get($id);
            require_once('views/users/edit-user.php');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ( !empty($_POST["user_name"])
                    && !empty($_POST["user_email"])
                    && !empty($_POST["pass"])) {
                    $user_name = $_POST["user_name"];
                    $user_email = $_POST["user_email"];
                    $pass = $_POST["pass"];
                    $status = $_POST["status"];
                    $bool = User::edit($id, $user_name, $user_email, $pass, $status);
                    header("Location: ./index.php?controller=users&&action=listUsers");
                }
            }
        }else {
            header("Location: ./index.php?controller=users&&action=listUsers");
        }
    }

    public function deleteUser()
    {

    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ( !empty($_POST["inputUsername"]) && !empty($_POST["inputPassword"]) ) {
                $inputUsername = $_POST["inputUsername"];
                $inputPassword = $_POST["inputPassword"];
                if (User::check_Admin($inputUsername, $inputPassword)) {
                    header("Location: ./index.php?controller=users&&action=listUsers");
                }
            }
        }
        require_once('views/users/login.php');
    }
}
?>

