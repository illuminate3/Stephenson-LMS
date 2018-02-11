## Bem vindo ao projeto Stephenson LMS
Projeto de plataforma EAD desenvolvido utilizando PHP + Laravel 5.5

### Instalação em localhost

OBS: É necessário ter o Composer instalado em seu computador. Baixe [aqui](https://getcomposer.org/)

1. Baixe o projeto e extraia o zip na pasta de projetos do seu servidor.
2. Em seu MySQL, crie uma tabela para instalar o projeto
3. Abra o arquivo .env na pasta raíz do projeto e edite os valores de DB_DATABASE, DB_USERNAME e DB_PASSWORD com o nome da tabela criada, username e senha do banco de dados respectivamente. Caso seja necessário, edite outra informações.
4. Abra o prompt de comando ou terminal e navegue nele até a pasta na qual você extraiu o projeto, após isso rode o comando
```
$ php artisan migrate
```
5. Se tudo ocorrer bem todas as tabelas serão criadas no banco de dados informado. Agora entre na tabela users e crie um registro preenchendo todos os campos obrigatórios. No campo permission coloque o valor de app.admin para criar uma conta de administrador.
6. Novamente, no prompt de comando ou terminal dentro da pasta raíz do projeto rode o comando 
```
$ php artisan serve
```
Esse comando irá iniciar o servidor, caso ocorra tudo bem, acesse localhost:8000 e o projeto estará funcionando.

[TUTORIAL EM VÍDEO](http://www.youtube.com/watch?v=n1hsaOmuB_0)