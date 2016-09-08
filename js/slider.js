$(function() {
  $('.trainers-slider li').eq(0).addClass('visible');
});

$(document).on('click','.arrow',function(){
  var count = $('.trainers-slider li').length;
  count = count-1;
  var i = $('.trainers-slider li.visible').index();
  var n = i+1;
  $('.visible').fadeOut(function(){
    $('.visible').removeClass('visible');
  });
  if ($(this).hasClass('left-arrow')) {
    if (n > count) {
      $('.trainers-slider li').eq(0).fadeIn(function(){
        $('.trainers-slider li').eq(0).addClass('visible');
      });
    } else {
      $('.trainers-slider li').eq(n).fadeIn(function(){
        $('.trainers-slider li').eq(n).addClass('visible');
      });
    }
  } else {
    var n = i-1;
    if (n >= 0) {
      $('.trainers-slider li').eq(n).fadeIn(function(){
        $('.trainers-slider li').eq(n).addClass('visible');
      });
    } else {
      $('.trainers-slider li').eq(count-1).fadeIn(function(){
        $('.trainers-slider li').eq(count-1).addClass('visible');
      });
    }
  }
});

$(document).on('click','.right-arrow',function(){
  var count = $('.trainers-slider li').length;
  count = count-1;
  var i = $('.trainers-slider li.visible').index();
  var n = i+1;
  $('.visible').fadeOut(function(){
    $('.visible').removeClass('visible');
  });
  if (n > count) {
    $('.trainers-slider li').eq(0).fadeIn(function(){
      $('.trainers-slider li').eq(0).addClass('visible');
    });
  } else {
    $('.trainers-slider li').eq(n).fadeIn(function(){
      $('.trainers-slider li').eq(n).addClass('visible');
    });
  }
});
