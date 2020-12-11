class scrollfade {
  constructor(xclass) {

    this.effectHeight = 300;
    this.effectMove = 50;
    this.effectTime = 800;
    this.xclass = xclass;
    $(xclass).css({
      opasity: 0,
      transform: 'translateY(' + this.effectMove + ')',
      transition: this.effectTime + 'ms'
    });
  }


  scroll(xclass) {
    let scrollTop = $(xclass).scrollTop();
    let scrollBtm = scrollTop + $(xclass).height();
    this.effectHeight = scrollBtm - this.effectHeight;

    $(xclass).each(function () {
      let xclassHeight = $(xclass).offset().top;
      if (effectHeight > xclassHeight) {
        $(xclass).css({
          opasity: 1,
          transform: 'translate(0)'
        });
      }
    });
  }

}

export default scrollfade;
