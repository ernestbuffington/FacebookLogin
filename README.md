<h1 style="margin-bottom: 0px">Facebook Login</h1>

<p><b>Requisitos:</b><br />
Ter um aplicativo no Facebook.<br />
Obter os dados do aplicativo como app_ID e app_Secret.</p>

<p style='color: blue'><b>Descrição curta:</b><br />
Permite que usuários usem a conta do facebook para fazer login em seu site.</p>

<p><b>Nota</b>: A biblioteca está em desenvolvimento, sendo assim, se encontra em estado beta. Se você tiver alguma sugestão de melhoria... Contribua para o desenvolvimento, dê um fork.</p>

<br />
<p style='color: blue'>
<b>Recursos:</b>
</p>
<ul>
    <li>Obter facilmente as informações do usuário logado com a conta do facebook em seu site.</li>
    <li>Fácil identificação se usuário está logado ou não.</li>
    <li>Em breve teremos uma interface para traduzir as informações do usuário para o português/pt-br.</li>
</ul>


<br />
<h3 style="border-bottom: 1px solid #999">Modo de usar:</h3>

<p><b>Edite o arquivo automatizedFiles/facebookAPI.php</b></p>
```php

    #substitua o valor das array pela informação da sua aplicação

    $facebookAPI = new Facebook(array(
        'appId'  => 'YOUR_APP_ID',
        'secret' => 'YOUR_APP_SECRET',
    ));

```

<p><b>Testando o login com Facebook</b></p>

<p>Coloque os arquivos deste repositório num servidor remoto (FTP), o facebook não aceita conexão em localhost. <br /> 
Depois é só acessar a página: <br />
http://www.seusite.com.br/pasta_com_arquivos/Logged/testes/index.php</p>
