<?php
require_once("_autoload.php");
/**
 * Representa��o para fazer login via conta existente do facebook.
 */


$facebook = new Facebook(array(
  'appId'  => '108371779345303',
  'secret' => '27ee08034a0fc384e8c46dffd08ae379',
));


$login = new Login($facebook);

if ($login->isLogged())
{
    echo "Est� logado.";
    echo "<a href='logout.php'><img src='images/sair_facebook.jpg' /></a>";
    
    echo "<br />";
    
    
    //obt�m dados do usu�rio logado
    $user_profile = $facebook->api('/me');
    
    echo "<img src='https://graph.facebook.com/{$user_profile['username']}/picture?type=square' width='18' height='18' />";
    
    echo "Nome: " . $user_profile['name'];
}
else 
{
    echo "N�o est� logado.";
    echo "<a href='{$facebook->getLoginUrl()}'><img src='images/login_button.jpg' /></a>";
}

?>
