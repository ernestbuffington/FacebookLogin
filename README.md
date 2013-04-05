<h1 style="margin-bottom: 0px">Facebook Login</h1>

<h3 style="border-bottom: 1px solid #999"><a href='http://www.felipemassariol.com.br/github/php/facebookTool/Logged/' target='_blank'>Ver Exemplo.</a></h3>

<p><b>Requisitos:</b><br />
Ter um aplicativo no Facebook.<br />
Obter os dados do aplicativo como app_ID e app_Secret.</p>

<p style='color: blue'><b>Descri��o curta:</b><br />
Permite que usu�rios usem a conta do facebook para fazer login em seu site.</p>

<p><b>Nota</b>: A biblioteca est� em desenvolvimento, sendo assim, se encontra em estado beta. Se voc� tiver alguma sugest�o de melhoria... Contribua para o desenvolvimento, d� um fork.</p>

<br />
<p style='color: blue'>
<b>Recursos:</b>
</p>
<ul>
    <li>Obter facilmente as informa��es do usu�rio logado com a conta do facebook em seu site.</li>
    <li>F�cil identifica��o se usu�rio est� logado ou n�o.</li>
    <li>Em breve teremos uma interface para traduzir as informa��es do usu�rio para o portugu�s/pt-br.</li>
</ul>


<br />
<h3 style="border-bottom: 1px solid #999">Modo de usar:</h3>

<p><b>Edite o arquivo automatizedFiles/facebookAPI.php</b></p>
```php

    #substitua o valor das array pela informa��o da sua aplica��o

    $facebookAPI = new Facebook(array(
        'appId'  => 'YOUR_APP_ID',
        'secret' => 'YOUR_APP_SECRET',
    ));

```
