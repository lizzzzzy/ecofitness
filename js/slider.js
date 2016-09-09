$(function() {

  var name = location.search.substring(6);
  if (undefined != name) {
    name = decodeURI(name);
    count = $('.trainers-descr h3').length;
    visible = 0;
    $('.trainers-descr h3').each(function(i,e){
      if (name == $(e).text()) {
          visible = 1;
          $(e).parent().parent().addClass('visible');
      }
      if (((i+1) == count) && visible == 0) {
        $('.left-arrow').hide();
        $('.trainers-slider li').eq(0).addClass('visible');
      }
    });
  } else {
    $('.left-arrow').hide();
    $('.trainers-slider li').eq(0).addClass('visible');
  }
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
