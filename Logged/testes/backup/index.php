<?php
require_once("_autoload.php");
/**
 * Representação para fazer login via conta existente do facebook.
 */


$facebook = new Facebook(array(
  'appId'  => '108371779345303',
  'secret' => '27ee08034a0fc384e8c46dffd08ae379',
));


$login = new Login($facebook);

if ($login->isLogged())
{
    echo "Está logado.";
    echo "<a href='logout.php'><img src='images/sair_facebook.jpg' /></a>";
    
    echo "<br />";
    
    
    //obtêm dados do usuário logado
    $user_profile = $facebook->api('/me');
    
    echo "<img src='https://graph.facebook.com/{$user_profile['username']}/picture?type=square' width='18' height='18' />";
    
    echo "Nome: " . $user_profile['name'];
}
else 
{
    echo "Não está logado.";
    echo "<a href='{$facebook->getLoginUrl()}'><img src='images/login_button.jpg' /></a>";
}

?>
