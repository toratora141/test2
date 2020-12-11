<?php
require './funciton.php';

//POSTされたデータがあれば、それぞれの変数、なければNULLを初期化。
$name = isset($_POST['name']) ? $_POST['name'] : NULL;
$address = isset($_POST['userAddress']) ? $_POST['userAddress'] : NULL;
$questionString = isset($_POST['questionString']) ? $_POST['questionString'] : NULL;

//
if (isset($_POST['submitBtn'])) {
  //POSTされたデータに不正な値がないかチェックする関数を定義した
  checkInput($_POST);

  //サニタイズ
  if (isset($_POST)) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  }

  //改行文字を取り除き、バリデーションを行う
  if (isset($_POST['address'])) {
    $address = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['address']);
    $address = filter_var($address, FILTER_VALIDATE_EMAIL);
  }
  if (isset($_POST['questionString'])) {
    $questionString = filter_var($_POST['questionString'], FILTER_SANITIZE_STRING);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require './mail.php';

    //メール本文　h()でエスケープ処理
    $mail_body = 'コンタクトべーじからのお問い合わせ' . "/n/n";
    $mail_body .= 'お名前:' . h($name) . "/n";
    $mail_body .= 'Email:' . h($address) . "/n";
    $mail_body .= '<お問い合わせ内容:>' . "/n" . h($questionString);

    //sendmailを使った送信処理

    //メールの宛先
    $mailTo = mb_encode_mimeheader(MAIL_TO_NAME) . "<" . MAIL_TO . ">";
    $returnMail = MAIL_RETURN_PATH;
    mb_language('ja');
    mb_internal_encoding('UTF-8');

    //送信者情報fromヘッダーの設定
    $header = "From" . mb_encode_mimeheader($name) . "<" . $address . ">/n";
    $header .= "Cc: " . mb_encode_mimeheader(MAIL_CC_NAME) . "<" . MAIL_CC . ">/n";
    $header .= "Bcc: <" . MAIL_BCC . ">";

    if (ini_get('safe_mode')) {
      $result = mb_send_mail($mailTo, $mail_body, $header);
    } else {
      $result = mb_send_mail($mailTo, $mail_body, $header, '-f' . $result);
    }
    if ($result) {
      $_POST = array();

      $name = '';
      $address = '';
      $questionString = '';

      //再読み込みによる二重送信の防止
      //empty関数を用いて送信されたかどうかを判別し
      //送信されていた場合,header関数のLocationヘッダーを使用しページを表示する
      $params = '?result=' . $result;
      $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
      header('Location:', $url, $params);
    }
  }
}

function checkInput($inputText)
{
  if (is_array($inputText)) {
    return array_map('checkInput', $inputText);
  } else {
    if (preg_match('/\0/', $inputText)) {
      die('不正な入力です。');
    }
    if (preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $inputText)) {
      die('不正な入力です。制御文字は使用できません。');
    }
    return $inputText;
  }
}
