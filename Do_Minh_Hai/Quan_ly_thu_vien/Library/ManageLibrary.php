<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/5/2017
 * Time: 10:05 AM
 */
session_start();

require_once ('../Implement/Borrow.php');
require_once ('../Implement/GiveBack.php');
require_once ('../Document/Document.php');
require_once ('../Document/Newspaper.php');
require_once ('../Document/Story.php');


function setDocumentSelected($id)
{
    $document_info_list = $_SESSION['document_info_list'];
    foreach ($document_info_list as $document_info) {
        if ($document_info['id'] == $id) {
            unset($_SESSION['Document_Selected_info']);
            $_SESSION['Document_Selected_info'] = $document_info;
            header("Location: ManageLibrary.php");
            break;
        }
    }
}

// Initialize objects
if (isset($_SESSION['Document_Selected_info'])) {
    $documentSelected_info = $_SESSION['Document_Selected_info'];
    $documentSelected = new Story($documentSelected_info['title']);
    $documentSelected->setId($documentSelected_info['id']);
    $documentSelected->setAmount($documentSelected_info['amount']);
    $documentSelected->setCurrentAmount($documentSelected_info['current_amount']);
    $documentSelected->setBorrowAmount($documentSelected_info['borrow_amount']);
    $documentSelected->setGiveBackAmount($documentSelected_info['giveBack_amount']);
    echo $documentSelected->getTitle();
} else {
    $documentSelected = new Story("Love Story");
    $documentSelected->setAmount(100);
    $documentSelected->setCurrentAmount(100);

    $_SESSION['Document_Selected_info'] = setSessionInfo($documentSelected);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['clear_session'])) {
        if (isset($_SESSION['Document_Selected_info'])) {
            unset($_SESSION['Document_Selected_info']);
        }
    }

    if (isset($_POST['borrow'])) {
        borrow($documentSelected);
        $_SESSION['Document_Selected_info'] = setSessionInfo($documentSelected);
        echo "update";
        updateSessionInfoList(setSessionInfo($documentSelected));
    }

    if (isset($_POST['giveBack'])) {
        giveBack($documentSelected);
        $_SESSION['Document_Selected_info'] = setSessionInfo($documentSelected);
        updateSessionInfoList(setSessionInfo($documentSelected));
    }

    if (isset($_POST['chooseDocument'])) {
        //$_SESSION['id_selected'] = $_POST['document'];
        setDocumentSelected($_POST['document']);
        //echo $_SESSION['id_selected'];
    }
}
//echo $documentSelected->getTitle();

function getInformation(Document $document)
{
    $info = 'Tên tài liệu: '
          . $document->getTitle()
          . '<br/>'
          . 'Số lượng hiện tại: '
          . $document->getCurrentAmount()
          . '<br/>'
          . 'Tổng số lượng mượn: '
          . $document->getBorrowAmount()
          . '<br/>'
          . 'Tổng số lượng trả: '
          . $document->getGiveBackAmount()
          . '<br/>';

    return $info;
}

function setDocumentFromInfo($info)
{
    $document = new Story($info['title']);
    $document->setId($info['id']);
    $document->setAmount($info['amount']);
    $document->setCurrentAmount($info['current_amount']);
    $document->setBorrowAmount($info['borrow_amount']);
    $document->setGiveBackAmount($info['giveBack_amount']);
    return $document;
}

function borrow(Document $document)
{
    $document->borrowBook();
}

function giveBack(Document $document)
{
    $document->giveBackBook();
}

function setSessionInfo(Document $document)
{
    $info = array('title' => $document->getTitle(),
        'id' => $document->getId(),
        'amount' => $document->getAmount(),
        'current_amount' => $document->getCurrentAmount(),
        'borrow_amount' => $document->getBorrowAmount(),
        'giveBack_amount' => $document->getGiveBackAmount()
    );
    return $info;
}

function updateSessionInfoList($document_info_update)
{
    $document_info_list = $_SESSION['document_info_list'];
    foreach ($document_info_list as $key => $document_info){
        echo $document_info['id'] . "-" . $document_info_update['id'] . "/";
        if ($document_info['id'] == $document_info_update['id']){
            $document_info_list[$key] = $document_info_update;
            echo "update";
            break;
        }
    }
    $_SESSION['document_info_list'] = $document_info_list;
}
?>

<?php
if (isset($_SESSION['document_info_list'])) {
    // document info list
    $document1 = new Story("Love Story");
    $document1->setId(1);
    $document1->setAmount(100);
    $document1->setCurrentAmount(100);

    $document2 = new Story("Sad Story");
    $document2->setId(2);
    $document2->setAmount(100);
    $document2->setCurrentAmount(100);

    $document3 = new Story("Good Story");
    $document3->setId(3);
    $document3->setAmount(100);
    $document3->setCurrentAmount(100);

    $document_info_list = array(setSessionInfo($document1), setSessionInfo($document2), setSessionInfo($document3));

    $_SESSION['document_info_list'] = $document_info_list;
}
?>

<div class="document_info">
    <div>
        <form method="post">
            <label for="document"> Chọn tài liệu </label>
            <select name="document">
                <?php if(isset($_SESSION['document_info_list'])): ?>
                    $document_info_list = $_SESSION['document_info_list'];
                    <?php foreach ($document_info_list as $document_info):?>
                        <?php $document = setDocumentFromInfo($document_info)?>
                        <option value="<?php echo $document->getId()?>" ><?php echo $document->getTitle()?></option>
                    <?php endforeach;?>
                <?php endif;?>
            </select>
            <input type="submit" name="chooseDocument" value="Chọn"/>
        </form>
    </div>
    <br/>
    <?php
    echo getInformation($documentSelected);
    ?>
    <br/>
    <form method="post">
        <input type="submit" name="clear_session" value="Xoá session"/>
        <input type="submit" name="borrow" value="Mượn"/>
        <input type="submit" name="giveBack" value="Trả"/>
    </form>
</div>