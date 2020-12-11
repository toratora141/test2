class moreYaca {
  constructor(text) {
    this.text = text;
  }

  getText() {
    $('.moreText').append(this.text);
  }
}
