<?php
require_once("_autoload.php");
require_once("../../automatizedFiles/facebookAPI.php");


/**
 * Representa��o para fazer login na aplica��o usando uma conta do facebook
 */

//instancia classe respons�vel por checar se usu�rio est� logado na aplica��o
$logged = new Logged(new LoggedFB($facebookAPI));

if ($logged->isLogged())
{
    echo "Est� logado.";
    echo "<a href='logout.php'><img src='images/sair_facebook.jpg' alt='Desconectar da aplica��o' /></a>";
    
    echo "<br />";
    
    //obt�m dados do usu�rio logado
    $userDataFB = new UserDataFB($facebookAPI);
    
    //lista dados para visualiza��o
    echo "Nome: " . $userDataFB->name() . "<br />";
    echo "Email: " . $userDataFB->email() . "<br />";
    echo "Sexo: " . $userDataFB->gender() . "<br />";
    echo "Data de nascimento: " . $userDataFB->birthday('d/m/Y') . "<br />";
    echo "Localidade: " . $userDataFB->locale() . "<br />";
    echo "Username: " . $userDataFB->username() . "<br />";
    echo "Facebook page: " . $userDataFB->facebookPage() . "<br />";
    echo "Picture: <img src='" . $userDataFB->userPicture() . "' /><br />";

}
else 
{    
    echo "N�o est� logado.";
    echo "<a href='{$urlLoginFB}'><img src='images/login_button.jpg' alt='Fazer login' /></a>";
}

?>
