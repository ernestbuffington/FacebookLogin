<?php
/*
 * Representa��o da configura��o do app do site.
 */

//instancia objeto para poder trabalhar com a API do facebook
$facebookAPI = new Facebook(array(
    'appId'  => 'YOUR_APP_ID',
    'secret' => 'YOUR_APP_SECRET',
));


//obt�m url para logar na aplica��o do site
$urlLoginFB = $facebookAPI->getLoginUrl(array(
    'scope'   => 'user_birthday, email, user_location',
    'display' => 'popup'
));
?>
