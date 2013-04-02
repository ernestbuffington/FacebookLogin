<?php

/**
 * Representação para gerenciar usuário logado.
 *
 * @author Felipe Massariol - contato.di@gmail.com
 */
class Logged
{
    
    /**
     * @var object [ILogged]
     */
    private $loggedInterface;
    
    
    public function __construct(ILogged $loggedInterface)
    {
        $this->loggedInterface = $loggedInterface;
    }
    
    
    /**
     * (non-PHPdoc)
     * @see ILogged::isLogged()
     */
    public function isLogged()
    {
        return $this->loggedInterface->isLogged();
    }
    
    
    /**
     * (non-PHPdoc)
     * @see ILogged::logout()
     */
    public function logout()
    {     
        return $this->loggedInterface->logout();
    }
}

?>
