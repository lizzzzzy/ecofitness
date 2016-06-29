<?php

require_once ('lib/mail.php');

$page = @$_GET['page'];
if (empty($page) || !is_file($page.'.html')) {
  $page = 'index';
}
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
echo $html;


?>
