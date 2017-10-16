// 以新視窗開啟圖片

function ImageWindow(filename, imagewidth, imageheight) {
  var imagewidth_f = imagewidth + 20 ;
  var imageheight_f = imageheight + 28 ;
  if (imageheight_f > 700) {
    imagewidth_f += 18 ;
    imageheight_f = 700 ;
    window.open(filename, "", "width=" + imagewidth_f + ",height=" + imageheight_f + ",scrollbars=yes") ;
  }
  else
    window.open(filename, "", "width=" + imagewidth_f + ",height=" + imageheight_f + ",scrollbars=no") ;
}