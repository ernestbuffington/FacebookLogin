<?php
require_once("_autoload.php");
require_once("../../automatizedFiles/facebookAPI.php");



$logged = new Logged(new LoggedFB($facebookAPI));

//checa se realizou o logout do usuário com o aplicativo do site
if ($logged->logout())
{
    $pageRedirect = 'index.php';
    
    echo("<script type='text/javascript'>
    <!--
    setTimeout(\"document.location = '{$pageRedirect}'\");
    //-->
    </script>
    ");
}
?>