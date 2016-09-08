$(function() {
  $('.trainers-slider li').eq(0).addClass('active');
});

$(document).on('click','.left-arrow',function(){
  var count = $('.trainers-slider li').length;
  var i = $('.trainers-slider li.active').index();
  if (i < count) {
    $('.trainers-slider li').eq(i).addClass('active');
  } else {
    $('.trainers-slider li').eq(0).addClass('active');
  }
});
