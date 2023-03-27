# Platform Project

### Para iniciar deve-se ter instalado o docker e composer, pois foram utilizados no projeto.

## Setup Inicial

### Faça o clone do repositório https://github.com/gersonvinicius/platform.git em uma pasta de sua preferência e entre na pasta platform

### Estando na pasta do projeto rode o comando docker-compose up -d para serem baixados e configurados os containers

### Após esse comando terminar entre na pasta platform dentro dessa pasta e rode o comando docker exec -it setup-php composer install para serem instaladas as dependências

### Também rode o comando cp .env.example .env para que seja criado o arquivo .env, o mesmo já está com as configurações necessárias, não é necessário alterar nada

### Caso necessário execute o comando docker exec -it setup-php php artisan config:cache para limpar o cache do .env

### Para o banco de dados execute docker exec -it setup-php php artisan migrate e docker exec -it setup-php php artisan db:seed assim serão criadas as tabelas e gerados alguns registros

### Terminadas estas configurações acesse: localhost:8080 para a homepage do laravel e localhost:8888 para a homepage do phpmyadmin

### No phpmyadmin o usuário é user e a senha é password

### Em localhost:8080 no canto superior direito clique em Register e se registre com um novo usuário para acessar a parte de administração do sistema

### Após isso aparecerá os menus e as funções do sistema

## Obrigado.
