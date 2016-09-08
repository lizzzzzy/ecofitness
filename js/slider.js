$(function() {
  $('.left-arrow').hide();
  $('.trainers-slider li').eq(0).addClass('visible');
});

$(document).on('click','.arrow',function(){
  var count = $('.trainers-slider li').length;
  count = count-1;
  var i = $('.trainers-slider li.visible').index();
  var n = i+1;

  if (n == count ) {
    $('.right-arrow').hide();
  } else {
    $('.right-arrow').show();
  }

  if ((i-1) == 0) {
    $('.left-arrow').hide();
  } else {
    $('.left-arrow').show();
  }

  $('.visible').removeClass('visible');
  if ($(this).hasClass('right-arrow')) {

    if (n > count) {
      $('.trainers-slider li').eq(0).addClass('visible')
    } else {
      $('.trainers-slider li').eq(n).addClass('visible')
    }
  } else {
    var n = i-1;
    if (n >= 0) {
        $('.trainers-slider li').eq(n).addClass('visible');
    } else {
        $('.trainers-slider li').eq(count-1).addClass('visible');
    }
  }
});
