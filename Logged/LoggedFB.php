<?php

/**
 * Representação para gerenciar usuário logado com conta do facebook no site.
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
     * Verifica se usuário está logado com a sua conta do facebook no site
     * 
     * @return boolean
     */
    public function isLogged()
    {
        $userUID = $this->facebook->getUser();

        //retorna verdadeiro se estiver conectado e falso se não estiver
        return ($userUID !== 0) ? true : false;
    }
    
    
    /**
     * Desconecta da seção entre a conta do facebook do usuário e o aplicativo. 
     * Nota: Não desconecta da conta do usuário com o site do facebook.
     * 
     * Obs.: Para deslogar do site do facebook, pegue a url com o método Facebook::getLogoutUrl() e redirecione para a página.
     * 
     * @return void
     */
    public function logout()
    {     
        $this->facebook->destroySession();
        
        //checa se ainda está logado
        $logged = $this->isLogged();
        
        //retorna true se ocorreu o logout ou false se ainda estiver conectado
        return ($logged) ? false : true;
    }
}

?>
