<!-- Да, вообще не валидно. Да, плохо. Но так делал вордпресс. Чем я хуже. -->
<style>
.q1-admin-page {
  display:none;
}
.q1-admin-page-%page%{
  display:block !important;
}
.q1-admin-panel {
  display:none;
  position:fixed;
  background:rgba(255,255,255,0.8);
  top:0;
  left:0;
  right:0;
  height:60px;
  padding:20px;
  text-align:center;
  z-index:9999;
}
.q1-admin-hover-panel {
  background:#333;
  position:fixed;
  right:10px;
  top:10px;
  color:#fff;
  padding:5px 10px;
  font-weight:bold;
  text-align:right;
  border-radius:3px;
  z-index:999999;
}
.q1-admin-hover-panel a {
  color:#fff;
  text-decoration:none;
}
.q1-admin-panel-active {
  display:block;
}
.q1-admin-settings {
  content: url('data:image/png;base64,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');
  background:#fff;
  width:30px;
  border-radius:50%;
  padding:5px;
  font-size:1em;
  cursor:pointer;
}
.q1-btn {
  padding:5px 10px;
  border:#1a1a1a solid 2px;
  color:#1a1a1a;
  text-decoration:none;
  line-height:1em;
  margin-top:20px;
  text-transform:uppercase;
}
.q1-btn-save {
  background:#1a1a1a;
  color:#fff;
}
.q1-editable {
  cursor:pointer;
  outline:none;
}
.q1-admin-bg {
  position:fixed;
  background:rgba(0,0,0,0.2);
  z-index:10;
  top:0;
  left:0;
  right:0;
  bottom:0;
}
.q1-admin-alert {
  position:fixed;
  background:rgba(60, 60, 60, 0.8);
  top:20px;
  right:20px;
  padding:20px 20px;
  text-align:center;
  color:#fff;
  font-size:1.2em;
  font-weight:bold;
  z-index:9999;
}
.q1-admin-alert-success {background:#4ac192;}
.q1-admin-alert-error {background:#f25b6d;}
.q1-admin-delete-rasp {
  display:block;
  position:absolute;
  margin-left:132px;
  margin-top:0;
  color:#fff;
  cursor:pointer;
  width:15px;
  height:15px;
  line-height:14px;
  font-size:10px;
  border-radius:50%;
  text-align:center;
  background:#333;
}
.q1-admin-add-rasp {
  background-color:#00ad5d !important;
  cursor:pointer;
  text-align:center;
  font-size:80px !important;
  line-height:137px;
  color:rgba(0,0,0,0.3);
  opacity:0.8;
}
.q1-admin-add-rasp:hover {opacity:1;}
.q1-admin-add-rasp-form-bg {
  position:fixed;
  z-index:99999;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background:rgba(0,0,0,0.4);
}
.q1-admin-add-rasp-form {
  position:fixed;
  width:400px;
  height:300px;
  left:50%;
  top:20%;
  margin-left:-200px;
  background:#e2eef1;
  border-radius:5px;
  z-index:999999;
  padding:20px;
  text-align:center;
}
.q1-admin-add-rasp-form select {
  position:static !important;
  width:60px !important;
  margin-bottom:20px;
}
.q1-admin-add-rasp-form h3 {
  color:#000;
  text-align:center;
  margin-bottom:20px;
}
.q1-admin-add-rasp-form input[type="text"] {
  margin-bottom:15px;
  background:transparent;
  outline:none;
  border:none;
  text-align:center;
  border-bottom:#333 solid 2px;
  padding:5px;
}
.q1-admin-add-rasp-form input[type="submit"] {
  margin-top:10px;
  background:#00ad5d;
  border:none;
  padding:10px;
  color:#fff;
}
.q1-admin-rasp-close {
  text-align:right;
  cursor:pointer;
}
.q1-admin-element-active {
  z-index:99999;
}
.card-hidden {
  display:block !important;
  position:relative;
}
.card-hidden:before {
  content:'';
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background:rgba(100,100,100,0.6);
  z-index:2;
  border-radius:4px;
}
.card-hidden:after {
  content:'Активировать';
  position:absolute;
  left:50%;
  top:50%;
  transform:translate(-50%,-50%);
  z-index:3;
  background:#00ad5d;
  padding:10px 20px;
  color:#fff;
  font-size:1rem;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$(function(){
  $('*[data-editable="true"]').addClass('q1-editable');
  $('*[data-editable="true"]').each(function(key,element){
    $(element).attr('data-old',$(element).html());
  });

  $('*[data-hide="true"]').each(function(key,element){
    $(element).not('.card-hidden').prepend('<a href="javascript://" class="card-hide-action">Скрыть</a>');
  });

  if (location.pathname == '/schuedle') {
    $('.day div').each(function(key,el){
      $(el).prepend('<span class="q1-admin-delete-rasp">x</span>');
    });
    $('.day').each(function(key,el){
      $(el).append('<div class="q1-admin-add-rasp"><span>+</span></div>');
    });
    $('.q1-admin-add-rasp').click(function(){
      var cl = $(this).parent().attr('class');
      cl = cl.substring(4);
      $('body').prepend('<div class="q1-admin-add-rasp-form-bg"></div><div class="q1-admin-add-rasp-form"><div class="q1-admin-rasp-close">Закрыть</div><h3>Новое занятие</h3><form method="POST" action="/admin/ajax.php"><input type="hidden" name="day" value="'+cl+'" /><select name="startDate"><option>7:00</option><option>7:30</option><option>8:00</option><option>8:30</option><option>9:00</option><option>9:30</option><option>10:00</option><option>10:30</option><option>11:00</option><option>11:30</option><option>12:00</option><option>12:30</option><option>13:00</option><option>13:30</option><option>14:00</option><option>14:30</option><option>15:00</option><option>15:30</option><option>16:00</option><option>16:30</option><option>17:00</option><option>17:30</option><option>18:00</option><option>18:30</option><option>19:00</option><option>19:30</option><option>20:00</option><option>20:30</option><option>21:00</option><option>21:30</option><option>22:00</option><option>22:30</option></select> - <select name="endDate"><option>7:30</option><option>8:00</option><option>8:30</option><option>9:00</option><option>9:30</option><option>10:00</option><option>10:30</option><option>11:00</option><option>11:30</option><option>12:00</option><option>12:30</option><option>13:00</option><option>13:30</option><option>14:00</option><option>14:30</option><option>15:00</option><option>15:30</option><option>16:00</option><option>16:30</option><option>17:00</option><option>17:30</option><option>18:00</option><option>18:30</option><option>19:00</option><option>19:30</option><option>20:00</option><option>20:30</option><option>21:00</option><option>21:30</option><option>22:00</option><option>22:30</option><option>23:00</option></select><br/><input type="text" name="title" placeholder="Занятие" /><br/><input type="text" name="name" placeholder="Тренер" /><br/><input type="submit" value="Добавить" /></form></div>');
    });
  };

});

$(document).on('keypress','[contenteditable=true]',function(e){
    var element = $(this);

    if (e.keyCode === 13) {
      e.preventDefault(); //Prevent default browser behavior
      $.ajax({
        type: "POST",
        crossDomain: true,
        url: "/admin/ajax.php",
        dataType: "json",
        jsonpCallback: '?',
        data: {
          'page': location.pathname.substring(1),
          'action': 'edit',
          'id': element[0].id,
          'new': element.html(),
        }
      }).done(function(){
        element.attr('contenteditable','false');
        element.removeClass('q1-admin-element-active');
        $('.q1-admin-panel').removeClass('q1-admin-panel-active');
        $('.q1-admin-bg').remove();
        $('body').append('<div class="q1-admin-alert q1-admin-alert-success">Успешно</div>');
        element.attr('data-old',$(element).text());

        setTimeout(function(){
          $('.q1-admin-alert').remove();
        }, 2000);
        return false;
      });
    }
});


$(document).on('click','.card-hidden',function(e){
    var element = $(this);
    console.log(element);
    $.ajax({
        type: "POST",
        crossDomain: true,
        url: "/admin/ajax.php",
        dataType: "json",
        jsonpCallback: '?',
        data: {
          'page': location.pathname.substring(1),
          'action': 'hide',
          'add': 0,
          'id': element[0].id
        }
    }).done(function(){
        element.removeClass('card-hidden');

        $('body').append('<div class="q1-admin-alert q1-admin-alert-success">Успешно</div>');

        setTimeout(function(){
          $('.q1-admin-alert').remove();
        }, 2000);
        return false;
      });
});

$(document).on('click','.card-hide-action',function(e){
    var element = $(this);
    var obj = $(this).parent();

    $.ajax({
        type: "POST",
        crossDomain: true,
        url: "/admin/ajax.php",
        dataType: "json",
        jsonpCallback: '?',
        data: {
          'page': location.pathname.substring(1),
          'action': 'hide',
          'add': 1,
          'id': obj[0].id,
        }
    }).done(function(){
        obj.addClass('card-hidden');
        element.remove();

        $('body').append('<div class="q1-admin-alert q1-admin-alert-success">Успешно</div>');

        setTimeout(function(){
          $('.q1-admin-alert').remove();
        }, 2000);
        return false;
      });
});

$(document).on('click','*[data-editable="true"]',function(){
  var element = $(this);
  if (!element.is(':focus')) {
    element.addClass('q1-admin-element-active');
    element.attr({'contenteditable':'true'});
    element.focus();
    if (element.css('position') != 'absolute') {
        element.css('position','relative')
    }
    $('body').append('<div class="q1-admin-bg"></div>');
    $('.q1-admin-panel').addClass('q1-admin-panel-active');
  }
});

$(document).on('click','.q1-btn-cancel',function(){
  var element = $('.q1-admin-element-active');
  element.attr('contenteditable','false');
  element.text(element.attr('data-old'));
  element.removeClass('q1-admin-element-active');
  $('.q1-admin-panel').removeClass('q1-admin-panel-active');
  $('.q1-admin-bg').remove();
});


$(document).on('click','.q1-btn-save',function(){
  var element = $('.q1-admin-element-active');
  var old = element.attr('data-old');

  $.ajax({
    type: "POST",
    crossDomain: true,
    url: "/admin/ajax.php",
    dataType: "json",
    jsonpCallback: '?',
    data: {
      'page': location.pathname.substring(1),
      'action': 'edit',
      'id': element[0].id,
      'new': element.html(),
    }
  }).done(function(){
    element.attr('contenteditable','false');
    element.removeClass('q1-admin-element-active');
    $('.q1-admin-panel').removeClass('q1-admin-panel-active');
    $('.q1-admin-bg').remove();
    $('body').append('<div class="q1-admin-alert q1-admin-alert-success">Успешно</div>');
    element.attr('data-old',$(element).text());

    setTimeout(function(){
      $('.q1-admin-alert').remove();
    }, 2000);
  });
});

//Добавить занятие
$(document).on('submit','.q1-admin-add-rasp-form form',function(event){
  event.preventDefault();
  var form = $(this);
  var data;
  data = form.serialize();
  data += '&page=schuedle&action=add';
  var startTime;
  var start = $('select[name="startDate"]').val();
  startTime = start.split(':');
  startTime = startTime[0]*60 + startTime[1];

  var cl = $('input[name="day"]').val();
  var key = new Array();
  var l = $('.'+cl+' .one-hour').length;
  if (l > 0) {
    $('.'+cl+' .one-hour').each(function(i, e){
      var time = $('.time', e).text();
      var temp;
      var temp2;
      temp = time.split('-');
      temp = temp[0].split(':');
      mins = temp[0]*60 + temp[1];
      if (parseInt(startTime) < parseInt(mins)) {
        key.push(i);
      }
    });
    if (key.length > 0) {
      key = key[0];
    } else {
      key = '';
    }
  } else {
    key = 0;
  }

  data += '&index='+key;

  $.ajax({
    type: "POST",
    crossDomain: true,
    url: "/admin/ajax.php",
    dataType: "json",
    jsonpCallback: '?',
    data: data,
    success: function(callback) {
      var o = $('.q1-admin-add-rasp-form');
      o.fadeOut(function(){
        o.remove();
      })
      $('.q1-admin-add-rasp-form-bg').fadeOut(function(){
          $('.q1-admin-add-rasp-form-bg').remove();
          $('.'+cl).html(callback.html);
          $('.'+cl+' div').each(function(key,el){
            $(el).prepend('<span class="q1-admin-delete-rasp">x</span>');
          });
          $('.'+cl).each(function(key,el){
            $(el).append('<div class="q1-admin-add-rasp"><span>+</span></div>');
          });
      });

    }
  })
  return false;
});

//Удалить занятие
$(document).on('click','.q1-admin-delete-rasp',function(){
  var el = $(this).parent();
  var index = el.index();
  var cl = $(this).parent().parent().attr('class');
  cl = cl.substring(4);
  $.ajax({
    type: "POST",
    crossDomain: true,
    url: "/admin/ajax.php",
    dataType: "json",
    jsonpCallback: '?',
    data: {
      'page': 'schuedle',
      'action': 'remove',
      'parent': cl,
      'dom': el[0].localName,
      'classes': el[0].className,
      'index': index
    },
  }).done(function() {
      el.remove();
  });
});
//UI время в форме расписания
$(document).on('change','select[name="startDate"]',function(){
  var i = $('option:selected').index();
  $('select[name="endDate"] option').eq(i).attr('selected','selected');
});

//Закрыть форму расписания
$(document).on('click','.q1-admin-rasp-close',function(){
  var o = $(this).parent();
  o.fadeOut(function(){
    o.remove();
  })
  $('.q1-admin-add-rasp-form-bg').fadeOut(function(){
      $('.q1-admin-add-rasp-form-bg').remove();
  });
})
//Закрыть форму расписания
$(document).on('click','.q1-admin-add-rasp-form-bg',function(){
  var o = $('.q1-admin-add-rasp-form');
  o.fadeOut(function(){
    o.remove();
  })
  $('.q1-admin-add-rasp-form-bg').fadeOut(function(){
      $('.q1-admin-add-rasp-form-bg').remove();
  });
});
</script>
<div class="q1-admin-hover-panel">
  <a href="/admin">Режим администратора</a>
</div>
<div class="q1-admin-panel">
  <a href="javascript://" class="q1-btn q1-btn-cancel">Отменить</a>
  <a href="javascript://" class="q1-btn q1-btn-save">Сохранить</a>
</div>
