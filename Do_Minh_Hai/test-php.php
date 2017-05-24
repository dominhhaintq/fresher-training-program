<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/5/2017
 * Time: 9:18 AM
 */
const PI = 3.14;

class FresherPHP
{
    private $first_name;
    private $last_name;
    private $middle_name;
    private $birth_day;
    private $phone_number;

    /**
     * FresherPHP constructor, input: array about fresher's information
     */
    public function __construct(Array $fresherPhp)
    {
        $this->setFirstName($fresherPhp['first_name']);
        $this->setLastName($fresherPhp['last_name']);
        $this->setMiddleName($fresherPhp['middle_name']);
        $this->setBirthDay($fresherPhp['birth_day']);
        $this->setPhoneNumber($fresherPhp['phone_number']);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = trim($first_name);
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = trim($last_name);
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @param mixed $middle_name
     */
    public function setMiddleName($middle_name)
    {
        if ($middle_name == "") {
            $this->middle_name = "";
        } else {
            $this->middle_name = trim($middle_name);
        }
    }

    /**
     * @return mixed
     */
    public function getBirthDay()
    {
        return $this->birth_day;
    }

    /**
     * @param mixed $birth_day
     */
    public function setBirthDay($birth_day)
    {
        $this->birth_day = trim($birth_day);
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = trim($phone_number);
    }

    /**
     * get full name of fresher
     * @return mixed - full name of fresher
     */
    public function getFullName()
    {
        if ($this->getMiddleName() == "") {
            $fullName = $this->getLastName() . " " . $this->getFirstName();
        } else {
            $fullName = $this->getLastName() . " " . $this->getMiddleName() . " " . $this->getFirstName();
        }

        return ucwords($fullName);
    }

    /**
     * calculate age of fresher with birth year and year now
     * @return mixed - age of fresher
     */
    public function getAge()
    {
        $birth_year = substr($this->getBirthDay(), 6);
        $now = getdate();
        $age = $now['year'] - $birth_year;
        return $age;
    }

    /**
     * get name of phone company fresher use
     * @return mixed - name of phone company
     */
    public function getPhoneCompany()
    {
        $viettel = array('098', '097', '096', '0169', '0168', '0167', '0166', '0165', '0164', '0163', '0162');
        $vinaphone = array('091', '094', '0123', '0124', '0125', '0127', '0129');
        $mobiphone = array('090', '093', '0120', '0121', '0122', '0126', '0128');
        $phone = $this->getPhoneNumber();
        $phoneCompany = 'Undefined';

        foreach ($viettel as $phone_remark) {
            $current_phone_remark = substr($phone, 0, strlen($phone_remark));
            if ( $current_phone_remark == $phone_remark) {
               $phoneCompany = 'Viettel';
            }
        }

        foreach ($vinaphone as $phone_remark) {
            $current_phone_remark = substr($phone, 0, strlen($phone_remark));
            if ( $current_phone_remark == $phone_remark) {
                $phoneCompany = 'Vinaphone';
            }
        }

        foreach ($mobiphone as $phone_remark) {
            $current_phone_remark = substr($phone, 0, strlen($phone_remark));
            if ( $current_phone_remark == $phone_remark) {
                $phoneCompany = 'Mobiphone';
            }
        }

        return $phoneCompany;
    }

}

class Util
{
    /**
     * get fresher has max age
     * @return mixed - fresher name
     */
    public function getMaxAgeFresher(ArrayObject $freshers)
    {
        $age_freshers = [];

        foreach ($freshers as $fresher) {
            $age_freshers[] = $fresher;
        }
        $max_age = max($freshers);
    }
}

class Circle
{
    private $radius;

    /**
     * Circle constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * calculate perimeter
     * $param mixed radius
     * @return mixed - perimeter
     */
    public function getPerimeter()
    {
        return 2 * PI * $this->radius;
    }

    /**
     * calculate area
     * $param mixed radius
     * @return mixed - area
     */
    public function getArea()
    {
        return PI * $this->radius * $this->radius;
    }
}

$fresherPhp_info = array([
            'first_name'     => 'thieu' ,
            'last_name'      => 'nguyen' ,
            'middle_name'    => 'van' ,
            'birth_day'      => '01-06-1991' ,
            'phone_number'   => '01649593418'
    ],[
            'first_name'     => 'hai' ,
            'last_name'      => '' ,
            'middle_name'    => 'do' ,
            'birth_day'      => '01-07-1996' ,
            'phone_number'   => '01699493418'
    ],[
            'first_name'     => 'trung' ,
            'last_name'      => 'van' ,
            'middle_name'    => 'nguyen' ,
            'birth_day'      => '05-06-1990' ,
            'phone_number'   => '01239453418'
    ]
);

$freshers = ArrayObject::class;
foreach ($fresherPhp_info as $fresher_info) {
    $fresher = new FresherPHP($fresher_info);
    echo $fresher->getFullName() . "<br/>";
    echo $fresher->getAge() . "<br/>";
    echo $fresher->getPhoneCompany() . "<br/><br/>";
    $freshers[] = $fresher;
}


?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["input_number"])) {
        $input_number = $_POST["input_number"];
        $circle = new Circle($input_number);
        $perimeter = $circle->getPerimeter();
        $area = $circle->getArea();
    }
}

?>

<p>
    <label>
        Bai 3
    </label>
</p>
<p>
<form method="post">
    <label for="input_number">
        Nhập số n:
    </label>
    <input type="text" name="input_number" id="input_number" value=""/>
    <input type="submit" name="submit" value="Tính"/>
</form>
</p>
<fieldset>
    <legend align="center">
        Kết quả
    </legend>
    <p>Chu vi: <?php if (isset($perimeter)) {
            echo $perimeter;
        } ?></p>
    <p>Dien tich: <?php if (isset($area)) {
            echo $area;
        } ?></p>
</fieldset>
