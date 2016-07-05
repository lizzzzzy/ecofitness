<?php

require_once "../lib/html.php";
require_once "../lib/auth.php";

$auth = new AuthClass();

if ($auth->isAuth() && count($_POST) > 0 ) {

  $page = @$_POST['page'];
  $action = @$_POST['action'];

  $html = file_get_contents('../'.$page.'.html');
  $html = str_get_html($html);

  if ($page == 'schuedle') {
    if ($action == 'remove') {
      $parent = $_POST['parent'];
      $dom = $_POST['dom'];
      $classes = $_POST['classes'];
      $index = $_POST['index'];
      $find = '.'.$parent.' '.$dom.'.'.$classes.'';
      // print $find;
      $block = $html->find($find,$index);
      // print count($block);
      $block->outertext = '';
      unlink('../'.$page.'.html');
      file_put_contents('../'.$page.'.html',$html);
      print json_encode(array('answer'=>'ok'));
    }
    if ($action == 'add') {
      $parent = @$_POST['day'];
      $index = @$_POST['index'];

      $startDate = @$_POST['startDate'];
      $endDate = @$_POST['endDate'];
      $title = @$_POST['title'];
      $name = @$_POST['name'];
      $find = '.'.$parent.' div.one-hour';
      $block = $html->find($find,$index);
      $new_block = '<div class="one-hour"><p class="time">'.$startDate.'-'.$endDate.'</p><p class="select">'.$title.'</p><p class="trainer">'.$name.'</p></div>';
      if (count($block) > 0) {
        $block->outertext = $new_block.$block->outertext;
      } else {
        $block = $html->find('.'.$parent,0);
        $block->innertext = $block->innertext.$new_block;
      }
      unlink('../'.$page.'.html');
      file_put_contents('../'.$page.'.html',$html);
      $html = $html->find('.'.$parent,0)->innertext;
      header('Content-Type: application/json');
      print json_encode(array('answer'=>'ok', 'html'=>trim($html)));
    }
  }

  // echo $html;

} else {
  header('HTTP/1.0 403 Forbidden');
  print json_encode(array('error'=>'Access denied'));
}
