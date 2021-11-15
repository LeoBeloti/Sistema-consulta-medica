# Para executar este projeto:
## 1.Clone o Projeto (Via SSH ou HTTP)
<br> 

```bash 
##Com SSH---
$ git clone git@github.com:LeoBeloti/Sistema-consulta-medica.git
### Com HTTPS---
$ git clone https://github.com/LeoBeloti/Sistema-consulta-medica.git
```
## 2 Vá até os arquivos locais e instale as dependências:
```bash 
$ composer install
$ npm install
$ npm run dev
```
## 3 Crie um banco de dados para executar junto ao CRUD

## 4 Configure o arquivo .env.exemple e renomeie ele para apenas .env 
## 5 Rode os seguintes comandos dentro do diretório do projeto
```bash 
$ php artisan migrate
$ php artisan db:seed UserSeeder
$ php artisan serve
```
 ## (Caso solicite a geracão de uma chave de API concorde em gerar em seu navegador e recarregue a pagina)