<?php

/**
 * Representação para gerenciar usuário logado com a conta do facebook no site.
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
     * Desloga da seção entre a conta do facebook do usuário e o site. Não desloga do site do facebook.
     * 
     * Nota: Para deslogar do site do facebook, pegue a url com o método Facebook::getLogoutUrl() e redirecione a página.
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
