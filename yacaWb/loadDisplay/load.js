// class load {
//   constructor() {
//     this.height = 0;
//   }

//   loadCreate() {
//     this.css({ 'margin-top': '100px' });
//     this.css({ 'width': '8px' });
//     this.css({ 'margin-left': '12px' });
//     this.css({ 'background-color': 'black' });
//   }

//   loading() {
//     setInterval(() => {
//       let loadstr = 'load' + count;
//       $('load1').animate({
//         'height': '100px',
//         duration: 100
//       }, 100);
//       count++;
//     }, 100);
//   }

// }

$(function () {
  function loading() {
    setInterval(() => {
      // let loadstr = 'load' + count;
      $('.load1').animate({
        'height': '100px',
        duration: 100
      }, 100);
      // count++;
    }, 100);
  }
});
