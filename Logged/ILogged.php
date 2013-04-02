<?php

/**
 * Representa��o da interface para representar usu�rios logados.
 *
 * @author Felipe
 */
interface ILogged
{
    /**
     * Verifica se usu�rio est� logado.
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
