<?php
require_once('data.php');
require_once('musicList.php');
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>yaca in da house **informal site**</title>
  <link rel="stylesheet" href="/yaca_test/music/music.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="jquery-3.5.1.min.js"></script>
</head>

<body>
  <div class="header_menu">
    <div class="header_title">yaca in da house -informal-</div>
    <ul class="menu">
      <li><a class="home link" href="/yacaWb/home/yaca.html">home</a></li>
      <li><a class="about link" href="/yacaWb/about.html">about</a></li>
      <li><a class="music link" href="/yacaWb/music/music.css">music</a></li>
      <li><a class="page link" href="/yacaWb/pageInfo/pageInfo.php">home</a></li>
      <li><a class="quesitionFrom link" href="/yacaWb/contact/questionForm.php">home</a></li>
    </ul>
  </div>

  <div class="music_header container">
    <h1 class="music_title container">ワニのヤカmusicについて</h1>
    <p class="music_text container">聴いてて心地いいサンプリング</p>
    <p class="music_text container">ワードセンスが心をひきつける</p>
    <p class="music_text container">特徴的な歌声</p>
  </div>

  <div class="musicMainPR containerr">
    <p class="musicPrTitle container">一部曲を紹介</p>
    <p class="music_pr_kome container">※一部、ユニット曲、コラボ曲もあります</p>
  </div>

  <div class="musicList">
    <?php foreach ($musicArray as $music) : ?>
      <div class="musicPage">
        <h1 class="title container top"><?php echo $music->getTitle() ?></h1>
        <h2 class="titleInfo container top"><?php echo $music->getTitleInfo() ?></h2>
        <P class="musicURL container"><?php echo $music->getMusicURL() ?></p>
        <p class="prText container"><?php echo $music->getPrText(); ?></p>

        <div class="userReview reviews bottom">
          <p class="userReviewTitle container top" id="userReview">ユーザーレビュー<span class="openBar" id="openBar"> +</span></p>
          <p class="userReviewModalHide container" id="userReviewModalHide">レビューを書く</p>
          <div class="reviewModal">
            <duv class="modal">
              <p class="userReviewText container">レビュー</p>
              <p class="reviewClose container" id="reviewClose">x</p>
              <div class="star" id="star">
                <i class="fa fa-star starBtn">評価を付ける</i>
                <?php for ($i = 0; $i < 5; $i++) : ?>
                  <i class="fa fa-star star<?php echo $i ?> starSolo" id="starSolo"></i>
                <?php endfor ?>
                <!-- <i class="fa fa-star star1 starSolo" id="starSolo"></i>
                <i class="fa fa-star star2 starSolo" id="starSolo"></i>
                <i class="fa fa-star star3 starSolo" id="starSolo"></i>
                <i class="fa fa-star star4 starSolo" id="starSolo"></i>
                <i class="fa fa-star star5 starSolo" id="starSolo"></i> -->
              </div>
              <textarea class="reviewText bottom" id="reviewText" placeholder="良ろしければ、曲に対するレビューをお願いします"></textarea>
              <input class="reviewSubmit btn" type="submit" value="送信">

            </duv>
          </div>
          <!-- <div class="reviewHide">
            <div class="star" id="star">
              <i class="fa fa-star starbtn"></i>
              <i class="fa fa-star star1 starSolo" id="starSolo"></i>
              <i class="fa fa-star star2 starSolo" id="starSolo"></i>
              <i class="fa fa-star star3 starSolo" id="starSolo"></i>
              <i class="fa fa-star star4 starSolo" id="starSolo"></i>
              <i class="fa fa-star star5 starSolo" id="starSolo"></i>
            </div>
            <textarea class="reviewText container bottom" id="reviewText" placeholder="良ろしければ、曲に対するレビューをお願いします"></textarea>
            <input class="reviewSubmit btn" type="submit" value="送信"> -->

        </div>
      </div>
  </div>
<?php endforeach ?>
<script type="text/javascript">
  $(function() {
    $('starBtn').click(function() {
      for ($i = 0; $i < 5; $i++) {
        if (!($('.star<?php echo $i ?>').hasClass('changeStar'))) {
          $('.star<?php echo $i ?>').addClass('changeStar');
          break;
        }
        $('.star1').addClass('changeStar');
      }
    });
    $('.starSolo').click(function() {
      if ($(this).hasClass('changeStar')) {
        $(this).removeClass('changeStar');
      } else {
        $(this).addClass('changeStar');
      }
    });
    $('.userReviewTitle').click(function() {
      var $reviewText = $('.userReview').find('.reviewText');
      if (!($reviewText.hasClass('open'))) {
        $reviewText.slideDown();
        $('.reviewSubmit').slideDown();
        $('.star').slideDown();
        $reviewText.addClass('open');
        $(this).find('span').text('  -');
      } else {
        $reviewText.slideUp();
        $('.reviewSubmit').slideUp();
        $('.star').slideUp();
        $reviewText.removeClass('open');
        $(this).find('span').text('  +');
      }
    });
    $('.userReviewModalHide').click(function() {
      $('.reviewModal').fadeIn();
    });
    $('.reviewClose').click(function() {
      $('.reviewModal').fadeOut();
    });
  });
</script>
</body>


</html>
