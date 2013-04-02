<?php

/**
 * Carrega classes automaticamente sem necessidade de importar.
 * 
 * @return boolean
 */

function autoload($className)
{
    //diretórios locais
    $directory[] = '../../API/';
    $directory[] = '../../API/exceptions/';
    $directory[] = '../';
    
    /**
     * versao remota, usar a linha abaixo
    $directory[] = $_SERVER['DOCUMENT_ROOT'] . '/lib/class/RemoveAccentuation/';
    */
    
    
    //extensão dos arquivos
    $extension[] = '.class.php';
    $extension[] = '.php';
    

    //checa existências da classe nos diferentes diretórios
    foreach ($directory as $key => $directoryValue)
    {
        //itera sobre as extensões possíveis
        foreach ($extension as $key => $value)
        {
            //formata barra invertidade de namespace
            $filename = str_replace('\\', '/', $className) . $value;
            
            //define o diretório e nome do arquivo
            $filenameFinal = $directoryValue . $filename;
            //echo "Procurando classe em: $filenameFinal </br>";
            //checa se existe
            if (file_exists($filenameFinal)) {
                require_once($filenameFinal);
                if (class_exists($className)) {
                    return true;
                }
            }
        }
    }

    return false;
}

//registra função que deve ser chamada toda vez que instanciar uma classe
spl_autoload_register('autoload');
?>
