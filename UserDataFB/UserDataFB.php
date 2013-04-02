<?php

/**
 * Representa��o para obter dados do usu�rio logado usando uma conta do facebook.
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
        
        //obt�m dados do usu�rio logado
        $this->userProfile = $this->facebook->api('/me');
    }
    
    
    /**
     * Obt�m informa��es do usu�rio
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
     * Obt�m username da conta da conta do facebook do usu�rio
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
     * Obt�m nome completo
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
     * Obt�m foto do usu�rio logado
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
     * Obt�m email do usu�rio
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
     * Obt�m data de nascimento
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
     * Obt�m sexo do usu�rio
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
     * Obt�m localidade de resid�ncia
     * 
     * @return string
     */
    public function locale()
    {
        $userProfile = $this->getUserProfile();
        
        //lista de todos os locales na pagina:
        //http://www.facebook.com/translations/FacebookLocales.xml
        #este m�todo ainda est� em desenvolvimento... se algu�m tiver uma id�ia simples e f�cil para traduzir o locale vindo da conta do user... da um fork no reposit�rio.
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
            
            // Traduz gen�ros ingl�s pro portugu�s
            $translated = str_replace($in, $out, $userProfile['locale']);
            
            return $translated;
        }
        
        return '';
        
        
 
            
    }
    
    
    /**
     * Obt�m url da p�gina do facebook do usu�rio
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
