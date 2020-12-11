class ball {
  constructor(ballNum, ballLarge, ballTop, ballLeft) {
    this.ballNum = ballNum;
    this.ballLarge = ballLarge;
    this.ballTop = ballTop;
    this.ballLeft = ballLeft;

    this.ballPragraph = $("<div class='ball' id='ball'></div>");
    this.ballPragraph.addClass(this.ballNum);
    this.moveAmount = (Math.round(Math.random() * 100) % 10);
  }
  //ballを生成
  ballCreate() {
    $('.balls').append(this.ballPragraph);
  }

}

export default ball;
