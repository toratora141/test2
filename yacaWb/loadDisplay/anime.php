<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>loadtest</title>
  <script src="jquery-3.5.1.min.js"></script>
  <title>Document</title>
</head>
<div style="width: 300px; height: 72px; position: relative;">
  <div id="bottomToTop" class="bg-primary" style="height: calc(24px * 3); width: 100%; top: 0; left: 0; position: absolute; background-color: blue;">
  </div>
  <div class="toggle btot" style="position: absolute; top: 50%; left: 50%;transform: translateX(-50%) translateY(-50%);">
    下から上にスライド
  </div>
</div>
<script>
  $('.toggle.btot').on('click', function() {
    var elemSlide = $('#bottomToTop');
    elemSlide.stop(true).animate({
      'height': (elemSlide.css('height') == '0px') ? '100%' : '0',
      marginTop: parseInt(elemSlide.css('marginTop'), 10) == 0 ? elemSlide.outerHeight() : 0
    });
  });
</script>

<body>

</body>

</html>
