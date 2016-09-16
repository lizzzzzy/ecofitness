<?php

    require_once('../lib/auth.php');

    $auth = new AuthClass();
    $config = file_get_contents('../config.json');
    $config = json_decode($config);

    // print json_encode(array('Email'=>''));die(); //generate config.json

    header('Content-Type: text/html; charset=utf-8');

    if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
        if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
          echo "<h2>Неправильные авторизационные данные</h2>";
        }
    }

    if (isset($_GET["logout"]) && $_GET["logout"] == 1) {
            $auth->out();
    }

    if (isset($_GET["banner"]) && $_GET["banner"] == 1) {
        if (count($_FILES) > 0) {
          if ($_FILES['file']['type'] != 'image/jpeg') {
            exit('<h2>Неправильный формат файла</h2>');
          }
          unlink(__DIR__.'/../img/service-pack.jpg');
          move_uploaded_file($_FILES['file']['tmp_name'], __DIR__.'/../img/service-pack.jpg');
          header("Location: /admin");
        }
    }

    if (isset($_GET["trainings"]) && $_GET["trainings"] == 1) {
        if (count($_POST) > 0) {
          $result = array();
          foreach ($_POST['title'] as $key => $val) {
            $result[$val] = $_POST['description'][$key];
          }
          unlink(__DIR__.'/../trainings.json');
          file_put_contents(__DIR__.'/../trainings.json',json_encode($result));
          header("Location: /admin");
        }
    }

    if (isset($_GET["addcoach"]) && $_GET["addcoach"] == 1) {
      if (count($_POST) > 0) {
          $files = glob('../data/*.json');
          $temp = array();
          foreach ($files as $f) {
            $temp[] = basename($f,'.json');
          }
          sort($temp);
          $id = end($temp) + 1;

          $data = json_encode($_POST);

          if (isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
            if (file_exists('../img/coach/'.$id.'.jpg')) {
              unlink('../img/coach/'.$id.'.jpg');
            }
            move_uploaded_file($_FILES['photo']['tmp_name'],'../img/coach/'.$id.'.jpg');
          }
          if (file_put_contents('../data/'.$id.'.json',$data)) {
            header('Location: /admin?message=Тренер успешно добавлен');
            die();
          } else {
            header('Location: /admin?message=Произошла ошибка при сохранение :(');
            die();
          };
      }
    }
    if (isset($_GET["editcoach"]) && $_GET["editcoach"] == 1) {
        if (count($_POST) > 0) {
          $id = $_POST['id'];
          if (file_exists('../data/'.$id.'.json')) {
            $data = json_decode(file_get_contents('../data/'.$id.'.json'));
            $data->title = @$_POST['title'];
            $data->position = @$_POST['position'];
            $data->year = @$_POST['year'];
            $data->learn = @$_POST['learn'];
            $data->direction = @$_POST['direction'];
            $data->success = @$_POST['success'];
            $data = json_encode($data);
            unlink('../data/'.$id.'.json');

            if (!empty($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
              if (file_exists('../img/coach/'.$id.'.jpg')) {
                unlink('../img/coach/'.$id.'.jpg');
              }
              move_uploaded_file($_FILES['photo']['tmp_name'],'../img/coach/'.$id.'.jpg');
            }
            if (file_put_contents('../data/'.$id.'.json',$data)) {
              header('Location: /admin?message=Тренер успешно отредактирован');
              die();
            } else {
              header('Location: /admin?message=Произошла ошибка при сохранение :(');
              die();
            };
          }
        }
    }

    if (isset($_GET["save"]) && $_GET["save"] == 1) {
        if (count($_POST) > 0) {
          $json = array();
          $snames = @$_POST['sname'];
          $svalues = @$_POST['svalue'];
          if (count($snames) == count($svalues)) {
            foreach ($snames as $key => $name) {
              $json[$name] = $svalues[$key];
            }
            unlink(__DIR__.'/../config.json');
            file_put_contents(__DIR__.'/../config.json',json_encode($json));
            header("Location: /admin");
          }
        }
    }

    echo file_get_contents('header.tpl');

    ?>

    <style>
    .banner {
      margin:0 -30px;
      margin-top:-20px;
    }
    .banner img {width:100%;}
    .form {height:auto !important;}
    textarea {display:block !important;width:100%;border-radius:3px;border:none;outline:none;padding:10px;margin-bottom:10px;margin-top: 10px;height: 80px;}
		.rates.activ .form{width: 1200px;margin-top: 50px;}
		.fields{
			font-weight: bold;
		}
    .admin-coaches:after {
      content:'';
      display:block;
      clear:both;
    }
    .admin-coach {
      float:left;
      width:400px;
      margin:20px;
      padding:20px;
      background:rgba(240,240,240,0.95);
      border-radius:3px;
      overflow:hidden;
    }
    .admin-coach input[type="text"] {
      background:#fff;
      border:none;
      outline:none;
      width:100%;
      padding:10px;
      margin:5px 0;
      border-radius:3px;
    }
    .admin-coach label {
      display:block;
      margin-bottom:10px;
      font-weight:bold;
    }
    .admin-coach .heading {
      position:absolute;
      font-size:1.2em;
      background:#00ad5d;
      color:#fff;
      margin-top:-30px;
      margin-left:100px;
      padding:10px;
    }
    .admin-coach .btn {
      width:100%;
      background:#00ad5d;
      border:none;
      border-radius:3px;
    }
    .alert {
      background:#00ad5d;
      padding:20px;
      color:#fff;
      margin:0 auto;
      width:500px;
      text-align:center;
    }
    </style>

    <header class="index-header">
        <div class="fixed-header "></div>
        <div class="fixed-navigation">
            <div class="wrapper clearfix navigation navbar-wrapper">
                <a href="/" class="logo"><img src="/img/head-logo.png" width="237" height="42" alt="ecofitness"></a>
                <?php if ($auth->isAuth()): ?>
                <nav class="main-navigation">
                    <ul>
                        <li class="menu-item"><a href="/admin">Настройки</a></li>
                        <li class="menu-item"><a href="/admin?banner=1">Баннер</a></li>
                        <li class="menu-item"><a href="/admin?trainings=1">Занятия</a></li>
                        <li class="menu-item"><a href="/admin?coach=1">Тренеры</a></li>
                        <li class="menu-item"><a href="/admin?logout=1">Выйти</a></li>
                    </ul>
                </nav>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!$auth->isAuth()): ?>
          <div class="rates">
            <div class="form">
              <p>Авторизация</p>
              <p>Введите данные о вашей учетной записи</p>
              <br/>
              <form method="post" action="/admin/">
                <input type="text" placeholder="Логин" name="login" value="" />
                <input type="password" placeholder="Пароль" name="password" value="" />
                <input type="submit" id="button" value="Войти" />
              </form>
            </div>
          </div>
        <?php else: ?>
          <?php if (isset($_GET['message'])):?>
          <div class="alert"><?=$_GET['message'];?></div>
          <?php endif;?>
          <?php if (isset($_GET['trainings']) && $_GET['trainings'] == 1): ?>
            <script>
              $.ajax({
                url: "/schuedle",
              }).done(function(data) {
                var e = new Array();
                $.each($("p.select", data), function(n, a) {
                    t = $(a).text();
                    if (jQuery.inArray(t, e) < 0 ){
                      e.push(t);
                    }
                });
                var exist = new Array();
                $('.fields').each(function(key,el){
                  if (jQuery.inArray($(el).data('name'),e) < 0) {
                    $(el).hide();
                  } else {
                    exist.push($(el).data('name'));
                  }
                });
                $.each(e, function(n,t) {
                  console.log(t);
                  if (jQuery.inArray(t,exist) < 0) {
                    $('<br />'+t+':<input type="hidden" name="title[]" value="'+t+'" /><textarea name="description[]"></textarea>').appendTo('#unfields');
                  }
                })
              });
            </script>
            <div class="rates activ" style="text-align:center;">
              <div class="form">
                <p>Описание занятий</p>
                <form method="post" action="/admin/?trainings=1">
                  <br>
                    <?php
                        $trainings = file_get_contents('../trainings.json');
                        $trainings = json_decode($trainings);
                        // $trainings = (array) $trainings;
                        if (empty($trainings)) {
                          $trainings = array();
                        }
                    ?>
                    <?php foreach ($trainings as $key => $val): ?>
                    <div class="fields" data-name="<?= $key;?>">
                      <?= $key;?><br>
                      <input type="hidden" name="title[]" value="<?= $key;?>">
                      <textarea name="description[]"><?= $val;?></textarea>
                    </div>
                    <?php endforeach; ?>
                    <div id="unfields"></div>
                  <input type="submit" id="button" value="Сохранить">
                </form>
              </div>
            </div>
          <?php elseif (isset($_GET['banner']) && $_GET['banner'] == 1): ?>
            <div class="rates">
              <div class="form">
                <figure class="banner">
                  <img src="/img/service-pack.jpg" />
                </figure>
                <br/>
                <form method="post" action="/admin/?banner=1" enctype="multipart/form-data">
                  <input type="file" name="file" />
                  <input type="submit" id="button" value="Сохранить" />
                </form>
              </div>
            </div>
          <?php elseif (isset($_GET['coach']) && $_GET['coach'] == 1): ?>
            <div class="admin-coaches">
                <div class="admin-coach">
                  <form action="/admin/?addcoach=1" method="POST" enctype="multipart/form-data">
                    <div class="heading">Новый тренер</div>
                    <label>
                      ФИО:<br/>
                    <input type="text" name="title" required="required" />
                    </label>
                    <label>
                      Виды тренировок:
                    <textarea name="position" required="required"></textarea>
                    </label>
                    <label>
                      Опыт работы:<br/>
                    <input type="text" name="year" />
                    </label>
                    <label>
                      Фотография:<br/>
                    <input type="file" name="photo" />
                    </label>
                    <label>
                      Направление работы:
                    <textarea name="direction"></textarea>
                    </label>
                    <label>
                      Образование:
                    <textarea name="learn"></textarea>
                    </label>
                    <label>
                      Достижения:
                    <textarea name="success"></textarea>
                    </label>
                    <button class="btn" type="submit">Добавить тренера</button>
                  </form>
                </div>
                <?php
                $data = glob('../data/*.json');
                foreach ($data as $key => $trainer) {
                  $id = basename($trainer,'.json');
                  $image = $id.'.jpg';
                  $t = json_decode(file_get_contents($trainer));
                  ?>
                  <div class="admin-coach">
                    <form action="/admin/?editcoach=1" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?=$id?>" />
                      <label>
                        ФИО:<br/>
                      <input type="text" name="title" required="required" value="<?=$t->title?>" />
                      </label>
                      <label>
                        Виды тренировок:
                      <textarea name="position" required="required"><?=$t->position?></textarea>
                      </label>
                      <label>
                        Направление работы:
                      <textarea name="direction"><?=$t->direction?></textarea>
                      </label>
                      <label>
                        Опыт работы:<br/>
                      <input type="text" name="year" value="<?=$t->year?>" />
                      </label>
                      <label>
                        Фотография:<br/>
                      <input type="file" name="photo" />
                      </label>
                      <label>
                        Образование:
                      <textarea name="learn"><?=$t->learn?></textarea>
                      </label>
                      <label>
                        Достижения:
                      <textarea name="success"><?=$t->success?></textarea>
                      </label>
                      <button class="btn" type="submit">Сохранить</button>
                    </form>
                  </div>
                  <?
                }
                ?>
            </div>
          <?php else: ?>
          <div class="rates">
            <div class="form">
              <p>Настройки</p>
              <br/>
              <form method="post" action="/admin/?save=1">
                <?php
                foreach ($config as $name => $value) {
                    print('<input type="hidden" name="sname[]" value="'.$name.'" />');
                    print('<input type="text" name="svalue[]" placeholder="'.$name.'" value="'.$value.'" /></p>');
                }
                ?>
                <input type="submit" id="button" value="Сохранить" />
              </form>
            </div>
          </div>
          <?php endif;?>
        <?php endif;?>

    </header>


    <?php file_get_contents('footer.tpl');?>
