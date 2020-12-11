<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>CSS overflow</title>
  <link rel="stylesheet" href="ball.css">
  <script src="jquery-3.5.1.min.js"></script>
</head>

<body>
  <div class="main">
    <p class="btn1" id="btn">btn</p>
    <p class="btn2">btn</p>
    <div class="balls" id="balls">
    </div>
  </div>
  <script type="module">
    import ball from "./ballData.js";
    let height = $('.btn1').height();
    let width = $('.btn1').width();
    const balls = new ball(height, width);
    document.getElementById('btn').onclick = function(){
      let ballArray = balls.ballCreate();
      let timeId =setInterval(() => {
        balls.ballMove(balls);
      }, 100);

      setTimeout(() => {
        clearInterval(timeId);
        $('#balls').empty();
      }, 3000);
    };
  </script>
</body>

</html>
