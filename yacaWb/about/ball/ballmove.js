import Ball from "./ball.js";

class BallMove extends Ball {
  constructor(arrange) {
    super(arrange);
  }
  ballMove() {
    // /シャボン玉を動かす/


    //y軸移動
    setInterval(function () {
      this.positionTop += Math.round(Math.random() * -3);
      let radPxT = radT + 'px';
      $('#ball').animate({
        marginTop: radPxT
      }, {
        queue: false,
        duration: 2000
      });

    }, 100);

    //x軸移動
    setInterval(function () {
      let moveAmount = (Math.round(Math.random() * 100) % 10);
      if (((Math.round(Math.random() * 100) % 2) == 0)) {
        this.positionLeft += moveAmount;
        let movePx = move + 'px';
        $('#ball').animate({
          marginLeft: movePx
        }, {
          queue: false,
          duration: 'slow'
        });

      } else {
        this.positionLeft -= moveAmount;
        let movePx = move + 'px';
        $('#ball').animate({
          marginLeft: movePx
        }, {
          queue: false,
          duration: 'slow'
        });
      }
    }, 1000);
  }
}

export default BallMove;
