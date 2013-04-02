<?php

/**
 * Representação para obter dados do usuário logado usando uma conta do facebook.
 *
 * @author Felipe Massariol <contato.di@gmail.com>
 */

class UserDataFB
{
    /**
     * @var object [Facebook]
     */
    protected $facebook;
    
    
    /**
     * @var array
     */
    private $userProfile;
    
    
    
    public function __construct(Facebook $facebook)
    {
        $this->facebook    = $facebook;
        
        //obtêm dados do usuário logado
        $this->userProfile = $this->facebook->api('/me');
    }
    
    
    /**
     * Obtêm informações do usuário
     * 
     * @return array
     */
    public function getUserProfile()
    {        
        if ($this->userProfile)
        {
            return $this->userProfile;
        }
        
        return array();
    }
    
    
    /**
     * Obtém username da conta da conta do facebook do usuário
     * 
     * @return string
     */
    public function username()
    {
        $userProfile = $this->getUserProfile();
        
        if (isset($userProfile['username']))
        {
            return $userProfile['username'];
        }
        
        return '';
    }
    
    
    /**
     * Obtém nome completo
     * 
     * @return string
     */
    public function name()
    {
        $userProfile = $this->getUserProfile();
        
        if (isset($userProfile['name']))
        {
            return $userProfile['name'];
        }
        
        return '';
    }
    
    
    /**
     * Obtém foto do usuário logado
     * 
     * @return string
     */
    public function userPicture()
    {
        $username = $this->username();

        if ($username)
        {
            $picture = "https://graph.facebook.com/{$username}/picture";
            
            return $picture;
        }
        
        return '';
    }
    
    
    /**
     * Obtém email do usuário
     * 
     * @return string
     */
    public function email()
    {
        $userProfile = $this->getUserProfile();
        
        if (isset($userProfile['email']))
        {
            return $userProfile['email'];
        }
        
        return '';
    }
    
    
    /**
     * Obtém data de nascimento
     * 
     * @param string $format : formato desejado da data. Opcional
     *                         exemplo: 'd-m-Y' ou 'd/m/Y'
     * @return string
     */
    public function birthday($format = 'Y-m-d')
    {
        $userProfile = $this->getUserProfile();

        if (isset($userProfile['birthday']))
        {
            $dateFormatted = date($format, strtotime($userProfile['birthday']));
            return $dateFormatted;
        }
        
        return '';
    }
    
    
    /**
     * Obtém sexo do usuário
     * 
     * @return string
     */
    public function gender()
    {
        $userProfile = $this->getUserProfile();

        if (isset($userProfile['gender']))
        {
            return $userProfile['gender'];
        }
        
        return '';
    }
    
    
    /**
     * Obtém localidade de residência
     * 
     * @return string
     */
    public function locale()
    {
        $userProfile = $this->getUserProfile();
        
        //lista de todos os locales na pagina:
        //http://www.facebook.com/translations/FacebookLocales.xml
        #este método ainda está em desenvolvimento... se alguém tiver uma idéia simples e fácil para traduzir o locale vindo da conta do user... da um fork no repositório.
        if (isset($userProfile['locale']))
        {
            $in =
                array(
                0 => "pt_BR", 1 => "af_ZA", 2 => 'ar_AR'
                );

            $out = 
                array(
                0 => "Brasil", 1 => "Afrikaans", 2 => 'Arabic'
                );
            
            // Traduz genêros inglês pro português
            $translated = str_replace($in, $out, $userProfile['locale']);
            
            return $translated;
        }
        
        return '';
        
        
 
            
    }
    
    
    /**
     * Obtém url da página do facebook do usuário
     * 
     * @return string
     */
    public function facebookPage()
    {
        $userProfile = $this->getUserProfile();
        
        if (isset($userProfile['link']))
        {
            return $userProfile['link'];
        }
        
        return '';
    }
}

?>
