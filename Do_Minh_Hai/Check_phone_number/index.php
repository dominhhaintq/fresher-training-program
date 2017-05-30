<?php

function checkPhoneNumber($phone)
{
    if (checkNull($phone)
        && checkNumber($phone)
        && checkStartedNumbers($phone)
        && checkLengthNumber($phone)) {
        return "$phone is valid";
    }
    return "$phone is invalid";
}

function checkNull($phone)
{
    try{
        if ($phone == '') {
            throw new Exception("Input is null");
        }
    }
    catch (Exception $e){
        echo $e->getMessage() . "<br/>";
        return false;
    }
    return true;
}

function checkNumber($phone)
{
    try{
        if (!is_numeric($phone)) {
            throw new Exception("Input is not number");
        }
    }
    catch (Exception $e){
        echo $e->getMessage() . "<br/>";
        return false;
    }
    return true;
}

function checkStartedNumbers($phone)
{
    $invalidStartedNumbers = array("098", "097", "096", "0169", "0168", "0167", "0166", "0165", "0164", "0163", "0162", "091", "094", "0123", "0124", "0125", "0127", "0129", "090", "093", "0120", "0121", "0122", "0126", "0128");
    try{
        if (!checkInArray($phone, $invalidStartedNumbers)) {
            throw new Exception("Input start numbers is invalid");
        }
    }
    catch (Exception $e){
        echo $e->getMessage() . "<br/>";
        return false;
    }
    return true;
}

function checkLengthNumber($phone)
{
    try{
        if (strlen($phone) != 10 && strlen($phone) != 11) {
            throw new Exception("Input length is invalid");
        }
    }
    catch (Exception $e){
        echo $e->getMessage() . "<br/>";
        return false;
    }
    return true;
}

function checkInArray($phone, $invalidStartedNumbers)
{
    foreach ($invalidStartedNumbers as $phone_remark) {
        $current_phone_remark = substr($phone, 0, strlen($phone_remark));
        if ( $current_phone_remark == $phone_remark) {
            return true;
        }
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $message = checkPhoneNumber($_POST['input_number']);
}
?>

<form method="post">
    <label for="input_number">Nhập số điện thoại:</label>
    <input type="text" name="input_number" id="input_number"/>
    <input type="submit" name="submit" id="submit" value="Kiểm tra"/>
    <br/>
    <span><?php if (isset($message)) echo $message;?></span>
</form>
