Versão das ferramentas utilizadas

    Composer: 2.7.8
    PHP: 8.2.12
    NPM: 10.8.2
    Node.js: 22.7.0
    laravel: 11.4.0

Configuração do arquivo .env

    Altere as configurações no arquivo .env de acordo com o ambiente do MySQL:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1    # IP do servidor MySQL
    DB_PORT=3306         # Porta onde o MySQL está rodando
    DB_DATABASE=gestaobbl   # Nome do banco. Não é necessário criá-lo previamente, pois ele será criado ao executar as migrações.
    DB_USERNAME=root     # Usuário do banco de dados
    DB_PASSWORD=123456   # Senha do usuário do banco de dados

Observação importante:
    
    Certifique-se de que a seguinte variável de ambiente esteja vazia inicialmente:

    APP_KEY=

Passos para inicialização do sistema

    Após configurar o arquivo .env, siga os comandos abaixo para preparar o sistema:

    Gerar a chave da aplicação:

        php artisan key:generate

    Executar as migrações para criação das tabelas e, se necessário, do banco de dados:

        php artisan migrate

    Executar composer

        composer update


    Instalar Bootstrap
    
        npm install
    
        npm i --save bootstrap @popperjs/core
    
        npm i --save-dev sass
    
        (ir em resources/js/bootstrap e alterar o arquivo)
    
        import 'bootstrap';
    
        (ir em resources e criar nova pasta e arquivo)
    
        criar pasta sass
        criar arquivo app.scss
    
        (dentro do app.scss)
    
        @import 'bootstrap/scss/bootstrap';

        para rodar em desenvolvimento
    
        npm run dev
    
        em produção
    
        npm run build


Considerações finais

    1. Após realizar todos os passos, o sistema deverá funcionar corretamente. Caso ocorra algum erro, verifique:

        A versão do PHP utilizada.
        A versão do Laravel instalada.
        Esses fatores podem impactar o funcionamento do sistema.

    2. Na pasta "modelagem BrModel" consta a modelagem do banco feito no sistema BrModelo
