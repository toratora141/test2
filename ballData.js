import Ball from "./ball2.js";

let balls = [];
let ballArray = [];
let rand = Math.round(Math.random() * 10 + 200);

class ball {
  constructor(height, width) {
    this.height = height;
    this.width = width;
  }

  ballCreate() {

    for (let i = 0; i < rand; i++) {
      let ballLargeRandom = Math.round(Math.random() * 200 + 50);
      let ballTopRandom = Math.round(Math.random() * 400 + this.height)
      let ballLeftRandom = Math.round(Math.random() * this.width);
      balls.push({ ballNum: 'ball' + i, ballLarge: ballLargeRandom, ballTop: ballTopRandom, ballLeft: ballLeftRandom });
      const a = new Ball(balls[i].ballNum, balls[i].ballLargeRandom, balls[i].ballTopRandom, balls[i].ballLeftRandom);
      a.ballCreate();
      ballArray.push(balls[i].ballNum);
      $('.' + balls[i].ballNum).css({
        'top': balls[i].ballTop,
        'left': balls[i].ballLeft,
        'width': balls[i].ballLarge,
        'height': balls[i].ballLarge
      });
    }
  }
  ballMove() {
    var timeId = setInterval(() => {
      for (let i = 0; i < rand; i++) {
        //ballの移動距離を設定
        let randtime = Math.round(Math.random()) * 100;
        let randtimeTop = Math.round(Math.random() * 50);
        let randmove = Math.round(Math.random()) * 10 + 250;

        //ballの止まる位置をランダムにするための変数を宣言
        let stopRand = Math.round(Math.random()) * 100;

        $('.' + balls[i].ballNum).delay(randtime).animate({
          'left': '+=20px'
        }, {
          duration: 300,
        }, 100).delay(randtime).animate({
          'left': '-=20px'
        }, {
          duration: 300,
        }, 100);
        //指定範囲内で表示させる
        let timeId2 = setInterval(() => {
          let ballOffset = $('.' + balls[i].ballNum).offset();
          let moreOffset = $('.moreYacaInfo').offset();
          //if文でtopのアニメーションを制御
          //offsetエラーの回避、ランダムな位置で止める

          if (!(ballOffset == null) && !(moreOffset == null) && ballOffset.top - randmove > moreOffset.top && ballOffset.top > moreOffset.top + i * 2.5) {
            $('.' + balls[i].ballNum).delay(randtimeTop).animate({
              'margin-top': '-=' + randmove + 'px'
            }, {
              duration: 1000,
              queue: false
            }, 10);
          }
        }, 1);
      }
    }, 100);
    setTimeout(() => {
      clearInterval(timeId)
    }, 5000);
  }
}

export default ball;
