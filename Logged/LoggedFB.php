<?php

/**
 * Representa��o para gerenciar usu�rio logado com conta do facebook no site.
 *
 * @author Felipe Massariol - contato.di@gmail.com
 */
class LoggedFB implements ILogged
{        
    
    /**
     * @var object [Facebook]
     */
    private $facebook;
    
    
    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }
    
    
    /**
     * Verifica se usu�rio est� logado com a sua conta do facebook no site
     * 
     * @return boolean
     */
    public function isLogged()
    {
        $userUID = $this->facebook->getUser();

        //retorna verdadeiro se estiver conectado e falso se n�o estiver
        return ($userUID !== 0) ? true : false;
    }
    
    
    /**
     * Desconecta da se��o entre a conta do facebook do usu�rio e o aplicativo. 
     * Nota: N�o desconecta da conta do usu�rio com o site do facebook.
     * 
     * Obs.: Para deslogar do site do facebook, pegue a url com o m�todo Facebook::getLogoutUrl() e redirecione para a p�gina.
     * 
     * @return void
     */
    public function logout()
    {     
        $this->facebook->destroySession();
        
        //checa se ainda est� logado
        $logged = $this->isLogged();
        
        //retorna true se ocorreu o logout ou false se ainda estiver conectado
        return ($logged) ? false : true;
    }
}

?>
