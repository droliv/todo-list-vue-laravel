#Instruções
<ol>
<li>Executar o arquivo banco.sql</li> // este arquivo criará apenas o banco, as tabelas serão criadas com migrate.
<li>Executar o comando "composer install" para instalar os pacotes</li>
<li>Executar o comando "php artisan key:generate" para gerar a chave da aplicação</li>
<li>copiar o arquivo .env.example e renomear para .env</li>
<li>Executar "php artisan migrate" para criar a tabela no banco de dados</li>
<li>Executar "php artisan serve" para subir o servidor da aplicação</li>
</ol>