<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1024">
  <title>yaca in da house **informal site**</title>
  <link rel="stylesheet" href="/yacaWb/music/music.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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

  <div class="music_header container scroll-fade-row">
    <h1 class="music_title">ワニのヤカmusicについて</h1>
    <div class="yacaP scroll-fade-row">
      <p class="music_text1 title">聴いてて心地いいサンプリング</p>
      <p class="slidetext">癖になるメロディ</p>
      <p class="slidetext">何時間でも聴いていたいミュージック</p>
      <p class="slidetext">心が癒される曲調</p>
    </div>
    <div class="yacaP scroll-fade-row">
      <p class="music_text2 title">ワード選びのセンス◎</p>
      <p class="slidetext">ゲーム関連のワードが多く共感が多い歌詞</p>
      <p class="slidetext">どこから出てきた？と感じる右アッパーを食らうようなワード</p>
      <p class="slidetext">炭酸ないサイダー飲み干せないやまだまだ</p>
    </div>
    <div class="yacaP scroll-fade-row">
      <p class="music_text3 title">歌も歌える</p>
      <p class="slidetext">歌声が特徴的でかっこかわいい</p>
      <p class="slidetext">抑揚の付け方が好き</p>
      <p class="slidetext">歌い方が一番刺さるワニです</p>
    </div>

  </div>
  <div class="bodyWraper container">
    <p class="music_pr_title title">一部曲を紹介</p>
    <p class="music_pr_kome container">※一部、ユニット曲、コラボ曲もあります</p>
    <?php
    require_once('./data.php');
    foreach ($musicArray as $music) : ?>
      <div class="music scroll-fade-row">
        <p class="musicTitle title">- <?php echo $music->getTitle(); ?> -</p>
        <p class="musicTtitleInfo"><?php echo $music->getTitleInfo(); ?> </p>
        <div class="musicBody">
          <p class="musicURL">- <?php echo $music->getMusicURL(); ?> -</p>
          <p class="prText"><?php echo $music->getPrText(); ?> </p>
        </div>
        <div class="review">
          <div class="userReview">
            <p class="reviewTitle userReviewBtn" id="userReviewBtn">ユーザレビュー +
            </p>
            <div class="userReviewList" id="userReviewList">aaa</div>
          </div>
        </div>
      </div>
      <p class="reviewBtn" id="reviewBtn">レビューを書く</p>
      <div class="reviewModal" id="reviewModal">
        <div class="modal" id="modal">
          <p class="closeBtn" id="closeBtn">x</p>
          <p class="modalTitle">レビューをどうぞ</p>
          <input class="starBtn container" id="starBtn" type="button" value="星を付ける">
          <div class="stars" id="stars">
            <?php for ($i = 0; $i < 5; $i++) : ?>
              <span class="fa fa-star starSolo starNocolor" id="star">
              </span>
            <?php endfor ?>
          </div>
          <textarea class="reviewBody" placeholder="ここにレビューを入力してください"></textarea>
          <input type="button" value="送信" class="submitBtn container" id="submitBtn">
        </div>
      </div>
    <?php endforeach ?>
    <script>
      $(function() {
        //ユーザのレビュー表示
        $('.userReview').click(function() {
          if ($(this).hasClass('open')) {
            $(this).find('reviewTitle').html('ユーザーレビュー  +');
            $(this).find('#userReviewList').slideUp();
            $(this).removeClass('open');
          } else {
            $(this).find('reviewTitle').html('ユーザーレビュー  -');
            $(this).addClass('open');
            $(this).find('#userReviewList').slideDown();
          }

        });

        //レビューモーダルの表示、非表示
        $('#closeBtn').click(function() {
          $('#reviewModal').fadeOut();
          $('#modal').fadeOut();
        });
        $('.reviewBtn').click(function() {
          $('#reviewModal').fadeIn();
          $('#modal').fadeIn();
        });
        //☆ボタンを推したときの処理、
        $('.starSolo').click(function() {
          if (!($(this).hasClass('changeStar'))) {
            $(this).addClass('changeStar').removeClass('starNocolor');
          } else {
            $(this).removeClass('changeStar').addClass('starNocolor');
          }
        })
        $('#starBtn').click(function() {
          $(this).mousedown(function() {
            $(this).css('box-shadow', '-4px -4px #7C946D');
          });
          $('#starBtn').mouseup(function() {
            $(this).css('box-shadow', '4px 4px #7C946D');
          });
          $('#stars').children('.starNocolor').addClass('changeStar').removeClass('starNocolor');
        });
        //レビューの送信ボタンの影を消す
        $('#submitBtn').click(function() {
          $(this).mousedown(function() {
            $(this).css('box-shadow', '-4px -4px #63655B');
          });
          $(this).mouseup(function() {
            $(this).css('box-shadow', '4px 4px #63655B');
          })
        });

        //z-indexを機能させるためにfade-rowから抜いたレビューを書くボタンを一定時間がたってから表示させる
        $('.reviewBtn').delay(3500).fadeIn();

        var effect_btm = 50; // 画面下からどの位置でフェードさせるか(px)
        var effect_move = 50; // どのぐらい要素を動かすか(px)
        var effect_time = 500; // エフェクトの時間(ms) 1秒なら1000

        //親要素と子要素のcssを定義
        $('.scroll-fade-row').css({
          opacity: 0
        });
        $('.scroll-fade-row').children().each(function() {
          $(this).css({
            opacity: 0,
            transform: 'translateX(' + effect_move + 'px)',
            transition: effect_time + 'ms'
          });
        });

        // スクロールまたはロードするたびに実行
        $(window).on('scroll load', function() {
          var scroll_top = $(this).scrollTop();
          var scroll_btm = scroll_top + $(this).height();
          var effect_pos = scroll_btm - effect_btm;

          //エフェクトが発動したとき、子要素をずらしてフェードさせる
          $('.scroll-fade-row').each(function() {
            var this_pos = $(this).offset().top;
            if (effect_pos > this_pos) {
              $(this).css({
                opacity: 1,
                transform: 'translateX(0)'
              });
              $(this).children().each(function(i) {
                $(this).delay(100 + i * 500).queue(function() {
                  $(this).css({
                    opacity: 1,
                    transform: 'translateX(0)'
                  }).dequeue();
                });
              });
            }
          });
        });
      });
    </script>
</body>

<footer>

</footer>

</html>
