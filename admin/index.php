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
                        <li class="menu-item"><a href="/admin?trainings=1">Тренировки</a></li>
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
                  if (jQuery.inArray(t,exist) < 0) {
                    console.log(t);
                    console.log(exist);
                    $('<br />'+t+':<input type="hidden" name="title[]" value="'+t+'" /><textarea name="description[]"></textarea>').appendTo('#unfields');
                  }
                })
              });
            </script>
            <div class="rates" style="text-align:center;">
              <div class="form">
                <p>Описание занятий</p>
                <form method="post" action="/admin/?trainings=1">
                  <br>
                    <?php
                        $trainings = file_get_contents('../trainings.json');
                        $trainings = json_decode($trainings);
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
