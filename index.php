<?php

require_once ('lib/mail.php');

$page = @$_GET['page'];
if (empty($page) || !is_file($page.'.html')) {
  $page = 'index';
}
$config = json_decode(file_get_contents('config.json'));

$html =  file_get_contents($page.'.html');

/* Формы */
$forms = array(
  'backcall' => 'Заказан звонок',
  'free-consult' => 'Бесплатная консультация',
  'mail-list' => 'Подписка на рассылку',
  'reserv' => 'Бронирование абонемента',
);

header('Content-Type: text/html; charset=utf-8');
$html = str_replace(".html", "", $html);

if (count($_POST) > 0) {
  $name = @$_POST['name'];
  $email = @$_POST['email'];
  $telephone = @$_POST['telephone'];
  $message = @$_POST['message'];
  $formname = @$_POST['formname'];

  if (empty($email) || empty($telephone)) {
    print 'Не указан email или телефон';
  }

  if (in_array($formname, $forms)) {
    $theme = $forms[$formname];
  } else {
    $theme = 'Форма обратной связи';
  }

  $name = trim(strip_tags($name));
  $email = trim(strip_tags($email));
  $telephone = trim(strip_tags($telephone));
  $message = trim(strip_tags($message));

  $text = '<h1>'.$theme.'</h1>';
  $text.= '<b>Имя:</b> '.$name.'<br/>';
  $text.= '<b>Email:</b> '.$email.'<br/>';
  $text.= '<b>Телефон:</b> '.$telephone.'<br/>';
  $text.= '<b>Сообщение:</b> '.$message;
  $text.= '<p><b>Отправленно с IP:</b> '.$_SERVER['REMOTE_ADDR'];

  $mail = new Mail('admin@'.$_SERVER['HTTP_HOST']); // E-mail адрес
  $mail->setFromName($config->sitename); // Устанавливаем имя в обратном адресе
  if (!$mail->send($config->email, $theme, $message)) {
    print "Ошибка отправки письма";
  };
}

echo $html;

?>
