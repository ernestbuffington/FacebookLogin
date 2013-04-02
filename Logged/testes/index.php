<?php
require_once("_autoload.php");
require_once("../../automatizedFiles/facebookAPI.php");


/**
 * Representação para fazer login na aplicação usando uma conta do facebook
 */

//instancia classe responsável por checar se usuário está logado na aplicação
$logged = new Logged(new LoggedFB($facebookAPI));

if ($logged->isLogged())
{
    echo "Está logado.";
    echo "<a href='logout.php'><img src='images/sair_facebook.jpg' alt='Desconectar da aplicação' /></a>";
    
    echo "<br />";
    
    //obtém dados do usuário logado
    $userDataFB = new UserDataFB($facebookAPI);
    
    //lista dados para visualização
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
    echo "Não está logado.";
    echo "<a href='{$urlLoginFB}'><img src='images/login_button.jpg' alt='Fazer login' /></a>";
}

?>
