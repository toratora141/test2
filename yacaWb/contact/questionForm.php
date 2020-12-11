<?php
require './function.php';
//POSTされたデータがあれば、それぞれの変数、なければNULLを初期化。
$userName = isset($_POST['userName']) ? $_POST['userName'] : NULL;
$address = isset($_POST['userAddress']) ? $_POST['userAddress'] : NULL;
$subject = "test";
$questionString = isset($_POST['questionString']) ? $_POST['questionString'] : NULL;

//
if (isset($_POST['submitBtn'])) {
  //POSTされたデータに不正な値がないかチェックする関数を定義した
  checkInput($_POST);

  //サニタイズ
  if (isset($_POST)) {
    $userName = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
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
    define('MAIL_TO', $_POST['address']);
    define('MAIL_TO_NAME', $_POST['userName'] . '様');
    define('MAIL_CC', 'xxxx@xxxxx.com');
    define('MAIL_CC_NAME', 'Cc宛名名');
    define('MAIL_BCC', 'xxxx@xxxxx.com');
    define('MAIL_RETURN_PATH', 'contactForm.taro@gmail.com');
    define('AUTO_REPLY_NAME', 'test');


    //メール本文　h()でエスケープ処理
    $mail_body = 'コンタクトページからのお問い合わせ' . "\n\n";
    $mail_body .= 'お名前:' . h($userName) . "\n";
    $mail_body .= 'Email:' . h($address) . "\n";
    $mail_body .= '<お問い合わせ内容:>' . "\n" . h($questionString);

    //sendmailを使った送信処理

    //メールの宛先
    $mailTo = mb_encode_mimeheader(MAIL_TO_NAME) . "<" . MAIL_TO . ">";
    $returnMail = MAIL_RETURN_PATH;
    mb_language('ja');
    mb_internal_encoding('UTF-8');

    //送信者情報fromヘッダーの設定
    $header = "From: " . mb_encode_mimeheader($userName) . "<" . $address . ">\n";
    // $header .= "Cc: " . mb_encode_mimeheader(MAIL_CC_NAME) . "<" . MAIL_CC . ">\n";
    // $header .= "Bcc: <" . MAIL_BCC . ">";

    if (ini_get('safe_mode')) {
      $result = mb_send_mail($mailTo, $subject,  $mail_body, $header);
    } else {
      $result = mb_send_mail($mailTo, $subject,  $mail_body, $header, '-f' . $returnMail);
    }
    if ($result) {
      $_POST = array();

      //ユーザに関する変数の初期化
      $userName = '';
      $address = '';
      $questionString = '';

      //再読み込みによる二重送信の防止
      //empty関数を用いて送信されたかどうかを判別し
      //送信されていた場合,header関数のLocationヘッダーを使用しページを表示する
      $params = '?result=' . $result;
      $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
      header('Location:' . $url . $params);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./questionForm.css">
  <title>お問い合わせフォーム</title>
  <script src="jquery-3.5.1.min.js"></script>
</head>

<body>
  <div class="header">
    <div class="header_menu">
      <div class="header_title">yaca in da house -informal-</div>
      <ul class="menu">
        <li><a class="home link" href="/yacaWb/home/yaca.html">home</a></li>
        <li><a class="about link" href="/yacaWb/about/about.php">about</a></li>
        <li><a class="music link" href="/yacaWb/music/music.php">music</a></li>
        <li><a class="page link" href="/yacaWb/pageInfo/pageInfo.php">pageInfo</a></li>
        <li><a class="quesitionFrom link" href="/yacaWb/contact/questionForm.php">contact</a></li>
      </ul>
    </div>
  </div>
  <div class="main">
    <p class="questionTitle title container">お問い合わせフォーム</p>
    <?php if (isset($_GET['result']) && $_GET['result']) : //送信成功した場合
    ?>
      <h4>送信完了！</h4>
      <p>送信完了しました。</p>
      <hr>
    <?php elseif (isset($result) && !$result) : //送信失敗した場合
    ?>
      <h4>送信失敗</h4>
      <p>申し訳ございませんが、送信に失敗しました。</p>
      <p>しばらくしてもう一度お試しになるか、メールにてご連絡ください。</p>
      <p>メール: <a href="mailto: contactForm.taro@gmail.com"></a>Contact</p>
    <?php endif ?>
    <?php if (!(isset($_GET['result']) && $_GET['result'])) : //送信成功した場合
    ?>
      <p class="contactText">ご不明点や改善点などございましたら下記のフォームからお問い合わせください。</p>
      <form id="form" method="post">
        <div class="infoWrraper">
          <label for="userName container">お名前(必須)</label>
          <input class="userName" type="text" name="userName" required value="<?php echo h($userName) ?>">
          <label for="userName container">メールアドレス(必須)</label>
          <input class="address" type="text" name="address" required value="<?php echo h($address) ?>">
          <label for="container">お問い合わせ内容</label>
          <textarea class="questionString" placeholder="お問い合わせ内容を記入ください" name="questionString" required value="<?php echo ($questionString) ?>"></textarea>
          <input name="submitBtn" class="submitBtn" type="submit" value="送信">

        </div>
      </form>
    <?php endif ?>

  </div>
</body>

</html>
