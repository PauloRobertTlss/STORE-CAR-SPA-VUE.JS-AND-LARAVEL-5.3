<p align="center"><img src="https://warlord0blog.files.wordpress.com/2018/03/vue-laravel.png?w=300"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o Projeto

O Projeto traz aos usuários uma experiência quase desktop com esse leve Single Page Application, e de maneira conveniente os usuários poderão apreciar algumas rotinas de e-commerce como o carrinho de comprar, buscar rápida de produtos, lista de categorias e por fim a confirmação do pedido. Seria simples avaliar mas o grande ponto neste projeto são as tecnologias e boas práticas presentes na sua estrutura.

![page_design](https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/home.png)

### Live Demo

  * <a href="http://www.tlss-cloud.com.br/#/home" target="_blank">e-commerc</a> - Meu carrinho.

## Instalação

#### Ambiente Atual

```shell
$ php -v
PHP 7.1.18 (cli) (built: May 24 2018 17:55:12) ( ZTS MSVC14 (Visual C++ 2015) x64 )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
```

```shell
$ composer -v
You are running Composer with SSL/TLS protection disabled.
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 1.5.1 2017-08-09 16:07:22

```
```shell
$ node -v
v6.5.0
```

```shell
$ npm -v
3.10.3
```
#### Composer

* Instalação das bibliotecas PHP `composer.json`.

    - Dentro do diretório do projeto execute.

```shell
composer update
```
###### instalando...

![page_design](https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/composer_update.png)


* Instalação das bibliotecas JavaScript  `package.json`.

  - Dentro do diretório do projeto execute.

```shell
npm install
```
   <small>paciência aqui.. node_module é gigantesco</small>      
![page_design](https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/npm_install.png)
##### * `versão` atenção aqui nas versões instaladas.

#### Configurar .ENV 

Faça uma copia do arquivo `.env.example` edite o novo arquivo.

```shell
cp .env.example .env
```
![page_design](https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/laravel_env.png)


Configurar conexão com banco de dados, padrão Mysql.

### Artisan

```shell
php artisan key:generate
```

### Migração

```shell
php artisan migrate --seed
```
![page_design](https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/migration.png)

##### * `--seed` irá hidratar as tabelas com informações de teste. Na Produção remover.  

### Build de Produção

- Configurar requisições de Front-end. BASE_URL.
    
    * Acesse o arquivo. `resource/assets/_store/js/utils/request`
    
```shell
const service = axios.create({
  baseURL: EXEMPLO >> 'http://127.0.0.1:8000/api', 
  timeout: (1000 * 60) * 2 // request timeout
});
```

- Gerar página de boot do SPA (single page application).
```shell
npm run prod --production
```
```shell
$ npm run prod --production

> webpack --config=./webpack-build/webpack.prod.conf.js

Hash: 31ab099ee5bc76c9a747
Version: webpack 3.10.0
Time: 66799ms
                                   Asset     Size  Chunks                    Chunk Names
../build/fonts/element-icons.6f0a763.ttf    11 kB          [emitted]
              ../build/js/vendor.prod.js  1.22 MB       0  [emitted]  [big]  vendor
                 ../build/js/spa.prod.js   434 kB       1  [emitted]  [big]  spa
            ../build/js/manifest.prod.js   1.4 kB       2  [emitted]         manifest
[+Wvm] ./resources/assets/_store/sass/index.scss 568 bytes {1} [built]

```

### Modo Produção

 - No arquivo `.env` altere para APP_ENV=production.
 - No arquivo `.env` altere para APP_DEBUG=false.

### Testando

```shell
php artisan serve
```

### Front-end - SPA (single page application)

O Html5 e Javascript ganharam super poderes e responsabilidades distintas, a primeria camada desse projeto usufluir de um framework Javascript e têm a responsabilidade de manter do lado cliente um ecossistema de rotas; templates; e hidratar as listas por AJAX sem o release de pagina. O Vue.js framework atendeu em todos os requisito o proposito deste projeto.

### Flux - Vuex

Vue.js possuir suporte à design FLUX. Flux é a arquitetura de aplicativo que o Facebook usa para criar aplicativos da Web do lado do cliente. Ele complementa os componentes de visualização compostos do React utilizando um fluxo de dados unidirecional. É mais um padrão do que um framework formal. [Detalhes](https://youtu.be/nYkdrAPrdcw?list=PLb0IAmt7-GS188xDYE-u1ShQmFFGbrk0v)  

### Back-end - Laravel - PHP

Laravel Framework - A camada lógica deste projeto será mantida pelo framework PHP mais utilizado no momento, com uma curva de desenvolvimento acentuada outras camadas foram suficientes para assegurar uma boa escabilidade e manutenções. 

### JSON RESPONSE

As APIs por padrão usam o formato JSON em suas respostas. Todas as respostas serão interceptadas pela camada de apresentação [Model–view–presenter (MVP)](https://pt.wikipedia.org/wiki/Model-view-presenter)

### CORS - policy.
 
 - Postman: Headers adicione Origin:

![Origin](https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/certificados/headers.png)

 - Para sua hostedagem o arquivo config\cors.php
    ```php
        return [   
        'supportsCredentials' => false,
        'allowedOrigins' => ['http://127.0.0.1:8000',
                         'ADICIONE AQUI'
                        ],
            'allowedOriginsPatterns' => [],
            'allowedHeaders' => ['*'],
            'allowedMethods' => ['*'],
            'exposedHeaders' => [],
            'maxAge' => 0
        ];
   ```