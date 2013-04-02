<?php
require_once("_autoload.php");


$facebook = new Facebook(array(
  'appId'  => '108371779345303',
  'secret' => '27ee08034a0fc384e8c46dffd08ae379',
));


$login = new Login($facebook);
$login->logout('http://perfow.com.br/lib/class/FacebookTool/FacebookLogin/testes/');
?>