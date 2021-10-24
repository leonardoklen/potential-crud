<h2>Resumo</h2>

<p>Um CRUD SPA com backend em API REST desenvolvido em PHP e JavaScript.</p><br>

<p>Para funcionamento 100% do sistema é necessário estar conectado na internet por conta das CDNs. Além disso, possui alguns softwares/ferramentas/frameworks necessários, segue nome e versões utilizadas durante o desenvolvimento: Docker (Desktop 3.5), Composer (1.10.6), MySql (5.7), Apache (2.4.38), PHPUnit (9.5). Certifique-se que todos estejam instalados na máquina e na versão correspondente.</p><br>

<h2>Passo a passo para acessar o projeto</h2>
  
<hr>

<p><b>1º</b> Via prompt de comando, acesse a página do projeto potential-crud/ e suba o docker com o comando: docker-compose up</p><br>

<p><b>2º</b>  Utilizando uma ferramenta de banco de dados (ex: PHPMyAdmin ou MySQL WorkBench), realize a conexão de acordo com os dados a seguir:</p><br>

<p>Connection Name: potential_crud </p>
<p>Hostname: localhost</p>
<p>Port: 3306</p>
<p>Username: leonardo</p>
<p>Password: 123</p><br>

<p>Em seguida, execute o script da base de dados que encontra-se em:</p><br>

<p>potential-crud/www/html/potential_crud.sql</p><br>

<p>O hostname pode variar de acordo com sua conexão, fique a vontade para alterar esses dados de acordo com sua necessidade. As constantes relacionadas a base de dados do sistema encontram-se em:</p><br>
<p>potential-crud/docker-compose.yml</p>
<p>potential-crud/www/html/App/App.php</p>
<p>potential-crud/www/html/public/js/funcoes.js</p><br>

<p><b>3º</b>  Para acessar o crud utilize o Hostname e a porta 8000 na url (na minha conexão local ficou: localhost:8000)</p>
 </html>
