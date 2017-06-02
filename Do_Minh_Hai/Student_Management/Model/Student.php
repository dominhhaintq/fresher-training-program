<?php

class Student
{
    private $name;
    private $age;
    private $sex;
    private $id;
    private $profile;

    /**
     * Student constructor.
     * @param $name
     * @param $age
     * @param $id
     * @param $sex
     */
    public function __construct($name, $age, $id, $sex, $profile)
    {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        $this->sex = $sex;
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profileID
     */
    public function setProfileID($profile)
    {
        $this->profile = $profile;
    }
}
