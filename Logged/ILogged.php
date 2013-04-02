<?php

/**
 * Representação da interface para representar usuários logados.
 *
 * @author Felipe
 */
interface ILogged
{
    /**
     * Verifica se usuário está logado.
     * 
     * @return boolean
     */
    public function isLogged();
    
    
    /**
     * Desloga do site.
     * 
     * @return void
     */
    public function logout();
}

?>
