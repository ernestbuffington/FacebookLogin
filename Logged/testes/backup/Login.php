<?php

/**
 * Representa��o para gerenciar usu�rio logado com a conta do facebook no site.
 *
 * @author Felipe Massariol - contato.di@gmail.com
 */
class Login
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
     * Desloga da se��o entre a conta do facebook do usu�rio e o site. N�o desloga do site do facebook.
     * 
     * Nota: Para deslogar do site do facebook, pegue a url com o m�todo Facebook::getLogoutUrl() e redirecione a p�gina.
     * 
     * @param  string $url_redirect : url para ir depois de deslogar
     * @return void
     */
    public function logout($url_redirect = '')
    {     
        $this->facebook->destroySession();
        
        if ($url_redirect)
        {
            echo("<script type='text/javascript'>
            <!--
            setTimeout(\"document.location = '{$url_redirect}'\");
            //-->
            </script>
            ");
        }
    }
}

?>
