<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="loadDisplay.css">
  <title>loadtest</title>
  <script src="jquery-3.5.1.min.js"></script>
</head>

<body>
  <div class="bodytext" id="bodytext">ロードが終了しました</div>
  <div class="loadDisplay" id="loadDisplay">
    <div class="loadphot">
      <p class="iconload" id="iconload"></p>
      <img src="./loadwani.png" class="loadIcon" id="loadIcon" height=100 width=100>
    </div>
    <p class="loadnum" id="loadnum">0%</p>
    <div class="load">
      <p class="load01 load0"></p>
      <p class="load02 load0"></p>
      <p class="load03 load0"></p>
      <p class="load04 load0"></p>
      <p class="load05 load0"></p>
      <p class="load1 loading" id="load1"></p>
      <p class="load2 loading" id="load2"></p>
      <p class="load3 loading" id="load3"></p>
      <p class="load4 loading" id="load4"></p>
      <p class="load5 loading" id="load5"></p>
    </div>
  </div>
  <script>
    $(function() {
      var h = $(window).height();
      $('#loadDisplay').height(h).css('display', 'block');
      $i = 1;
      $('#iconload').animate({
        height: 'toggle'
      }, {
        duration: 5500
      });
      setInterval(() => {
        // $('#loadIcon').fadeOut(800, function() {
        //   $(this).fadeIn(800)
        // });
        $('#loadIcon').animate({
          opacity: 0.5
        }, 400).animate({
          opacity: 1
        });
      }, 400);
      setInterval(() => {
        $loadnum = 'load' + $i;
        $('#' + $loadnum).animate({
          'height': '0px'
        }, {
          duration: 'slow',
        }, 800);

        $i++;
        $('#loadnum').each(function() {
          $(this).prop('Counter', 0).animate({
            Counter: 100
          }, {
            duration: 3500,
            easing: 'linear',
            step: function(now) {
              $(this).text(Math.ceil(now) + '%');
            }
          });
        });
      }, 800);
    });
    $(window).on('load', function() {
      $('#loadDisplay').delay(4400).fadeOut(300);
      $('#bodytext').delay(4700).queue(function() {
        $(this).css('display', 'block');
      });
    });
  </script>
</body>

</html>
