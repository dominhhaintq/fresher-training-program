<?php
class User
{
    public $user_id;
    public $user_name;
    public $pass;
    public $status;
    public $privilege;
    public $user_email;
    public $user_img;
    public $user_time_created;
    public $user_time_updated;

    /**
     * User constructor.
     * @param $user_id
     * @param $user_name
     * @param $pass
     * @param $status
     * @param $privilege
     * @param $user_email
     * @param $user_img
     * @param $user_time_created
     * @param $user_time_updated
     */
    public function __construct($user_id, $user_name, $pass, $status, $privilege, $user_email, $user_img, $user_time_created, $user_time_updated)
    {
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->pass = $pass;
        $this->status = $status;
        $this->privilege = $privilege;
        $this->user_email = $user_email;
        $this->user_img = $user_img;
        $this->user_time_created = $user_time_created;
        $this->user_time_updated = $user_time_updated;
    }


    public static function all()
    {
        $db = Db::getInstance();
        $q = "SELECT * FROM user";
        $r = mysqli_query($db, $q);
        $users = [];
        if (mysqli_num_rows($r) > 0) {
            while ($user = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                $users[] = new User($user['user_id'], $user['user_name'], $user['pass'], $user['status'], $user['privilege'], $user['user_email'], $user['user_img'], $user['user_time_created'], $user['user_time_updated']);
            }
        }
        return $users;
    }

    public static function get($id)
    {
        $db = Db::getInstance();
        $q = "SELECT * FROM user WHERE user_id = $id";
        $r = mysqli_query($db, $q);
        if (mysqli_num_rows($r) > 0) {
            $user = mysqli_fetch_array($r, MYSQLI_ASSOC);
            $user = new User($user['user_id'], $user['user_name'], $user['pass'], $user['status'], $user['privilege'], $user['user_email'], $user['user_img'], $user['user_time_created'], $user['user_time_updated']);
            return $user;
        }
        return null;
    }

    public static function add($user_name, $user_email, $pass, $status)
    {
        $db = Db::getInstance();
        $pass = md5($pass);
        $q = "INSERT INTO user (user_name, user_email, pass, status) 
              VALUES ('{$user_name}', '{$user_email}', '{$pass}', '{$status}')";
        $r = mysqli_query($db, $q);
    }
    
    public static function edit($id, $user_name, $user_email, $pass, $status)
    {
        $db = Db::getInstance();
        $pass = md5($pass);
        $q = "UPDATE user SET user_name = '{$user_name}', user_email = '{$user_email}', pass = '{$pass}', status = '{$status}' WHERE user_id = $id LIMIT 1 ";
        $r = mysqli_query($db, $q);
        if(mysqli_affected_rows($db) == 1) {
            return true;
        }
        return false;
    }
    
    public static function delete()
    {
        
    }
    
    public static function check_Admin($user_name, $pass)
    {
        $db = Db::getInstance();;
        $q = "SELECT * FROM user WHERE user_name = $user_name AND pass = $pass AND status = 1 AND privilege = 1";
        $r = mysqli_query($db, $q);
        if (mysqli_num_rows($r) > 0) {
           return true;
        }
        return false;
    }
}
