<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1024">
  <title>yaca in da house **informal site**</title>
  <link rel="stylesheet" href="./about.css">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="jquery-3.5.1.min.js"></script>
</head>

<body>
  <div class="header">
    <div class="header_menu">
      <div class="header_title">yaca in da house -informal-</div>
      <ul class="menu">
        <li><a class="home link" href="./yaca.html">home</a></li>
        <li><a class="about link" href="./about.php">about</a></li>
        <li><a class="music link" href="./music.php">music</a></li>
        <li><a class="page link" href="/yacaWb/pageInfo/pageInfo.php">pageInfo</a></li>
        <li><a class="quesitionFrom link" href="./questionForm.php">contact</a></li>
      </ul>
    </div>
  </div>
  <div class="main">
    <img class="yaca_icon" src="./yaca_icon.jpg">
    <p class="icon_name container">ワニのヤカ</p>
    <div class="yacaInfo fade-row">
      <p class="info container">現役大学生の頃からサンプリングミュージックを広めるためにvtuberとして活動を開始</p>
      <p class="info container">活動初期は曲作りの様子を公開したり、講座を開いたり、稀にゲームの配信も行っていたが、最近では配信はあまり配信自体行わなくなってしまった。</p>
      <p class="info container">また、LIVEイベントにも出演したり、M3などの音楽の同人イベントに出展したりと、リアルでのイベントも多くなってきている</p>
      <p class="info container">さらにM3での同人イベントではネットでは手に入らないCD盤限定の曲も収録されているものもある
      </p>
      <p class="info container">ユニットとしては、yaca&nyankobrq有名だが、活動初期では大学の先輩（？）とユニットを組んで曲を作り、サンプリングアルバムも無料で配布していた。
      </p>
      <p class="info container">最近では、様々な方にコラボや楽曲提供を行っており、嬉しい限りである
      </p>
    </div>


  </div>

  <p class="moreTitle container fadein">もっとワニのヤカを知りたい方へ</p>
  <div class="moreYacaInfo container fadein">
    <div class="balls" id="balls"></div>
    <input type="button" class='moreBtn btn' id="moreBtn" value="more">
    <div class="moreTextWrapper">
      <p class="moreText" id="moreText"></p>
    </div>
  </div>

  <script type="module">
    import moreArray from './moreYaca.js';
    import ball from "./ballData.js";
    $(function() {
      //ボタンを押したときテキストを表示
      $('#moreBtn').click(function() {
        $('.moreText').fadeOut();
        $('.moreTextWrapper').fadeOut();
        setTimeout(() => {
          let rand = Math.round(Math.random() *6);
          $('#moreText').addClass('moreText' + rand);
          $('.moreText').html(moreArray[rand]);
          $('.moreTextWrapper').fadeIn();
          $('.moreText').fadeIn();
        }, 500);
      });
    });
    let height = -200;
    let width = $(window).width();
    const balls = new ball(height, width);
    document.getElementById('moreBtn').onclick = function(){
      let ballArray = balls.ballCreate();
      let timeId =setInterval(() => {
        balls.ballMove(balls);
      }, 100);

      setTimeout(() => {
        clearInterval(timeId);
        $('#balls').empty();
      }, 8000);
    }


    var effect_btm = 300; // 画面下からどの位置でフェードさせるか(px)
    var effect_move = 50; // どのぐらい要素を動かすか(px)
    var effect_time = 800; // エフェクトの時間(ms) 1秒なら1000

    //親要素と子要素のcssを定義
    $('.fade-row').css({
        opacity: 0
    });
    $('.fade-row').children().each(function(){
        $(this).css({
            opacity: 0,
            transform: 'translateX('+ effect_move +'px)',
            transition: effect_time + 'ms'
        });
    });

    // スクロールまたはロードするたびに実行
    $(window).on('scroll load', function(){
        var scroll_top = $(this).scrollTop();
        var scroll_btm = scroll_top + $(this).height();
        var effect_pos = scroll_btm - effect_btm;

        //エフェクトが発動したとき、子要素をずらしてフェードさせる
        $('.fade-row').each( function() {
            var this_pos = $(this).offset().top;
            if ( effect_pos > this_pos ) {
                $(this).css({
                    opacity: 1,
                    transform: 'translateX(0)'
                });
                $(this).children().each(function(i){
                    $(this).delay(100 + i*200).queue(function(){
                        $(this).css({
                            opacity: 1,
                            transform: 'translateX(0)'
                        }).dequeue();
                    });
                });
            }
        });

        $('.fadein').css({
          opacity: 0,
          transform: 'translateY('+ effect_move +'px)',
          transition: effect_time + 'ms'
        });

    // スクロールまたはロードするたびに実行
        $(window).on('scroll load', function(){
          var scroll_top = $(this).scrollTop();
          var scroll_btm = scroll_top + $(this).height();
          effect_pos = scroll_btm - effect_pos;

          // effect_posがthis_posを超えたとき、エフェクトが発動
          $('.fadein').each( function() {
              var this_pos = $(this).offset().top;
              if ( effect_pos > this_pos ) {
                  $(this).css({
                      opacity: 1,
                      transform: 'translateY(0)'
                  });
              }
          });
        });
    });


  </script>
</body>

<footer>
  <!-- <div class="about_footer container">
    <p>全て個人で調べた情報であり</p>
    <p>事実とは異なる場合があります</p>
  </div> -->
</footer>

</html>
