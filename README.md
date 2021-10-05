# Teste em Laravel com authenticação

## Configurações do Ambiente

As Configurações menciondas abaixo server para o ubuntu 18.04, caso esteja em um ambiente Windows é sugerido baixar o xampp, vas se atente as versoes minimas de cada parte do processo.

### Inntalando alguns pacotes

Instale o **Apache** usando o gerenciador de pacotes do Ubuntu, apt:

```
$ sudo apt update
$ sudo apt install apache2
```

Instale o **MySQL**:

```
$ sudo apt install mysql-server
```

Instalando o **PHP**, nessa etapa vc pode escolher qual versão pode trabalhar, mas como o projeto vai rodar em laravel, certifique-se que a versão minima seja a 7.2.  Além da propria linguagem, tem mais alguns pacotes que devem ser baixados, para que a linguagem se cominique com o banco mysql e o apache:

```
$ sudo apt install php libapache2-mod-php php-mysql php-cli unzip
```

Terminando a instalação, verifique a versão do PHP:

```
$ php -v
```

```
PHP 7.4.23 (cli) (built: Aug 26 2021 15:51:17) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.23, Copyright (c), by Zend Technologies
```

## Instalando o Composer

Vamos utilizar alguns pacotes no nosso sistema, então instale o composer e configure no seu ambiente com o comando abaixo:

```
$ curl -sS https://getcomposer.org/installer -o composer-setup.php
```

```
HASH=`curl -sS https://composer.github.io/installer.sig`
```

```
$ php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

```

Verifique a saída:
```
Installer verified
```

Configure o composer para global no seu ambiente:
```
$ sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

Para testar a instalação, execute:
```
$ composer
```

```
   ______
  / ____/___  ____ ___  ____  ____  ________  _____
 / /   / __ \/ __ `__ \/ __ \/ __ \/ ___/ _ \/ ___/
/ /___/ /_/ / / / / / / /_/ / /_/ (__  )  __/ /
\____/\____/_/ /_/ /_/ .___/\____/____/\___/_/
                    /_/
Composer version 2.1.8 2021-09-15 13:55:14

Usage:
  command [options] [arguments]

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
      --no-cache                 Prevent use of the cache
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

``` 

## Instale o Framework Laravel

```
$ sudo composer global require laravel/installer
```

## Agora vamos a parte de clonar o projeto e fazer algumas configurações nos arquivos 

- Clone o projeto
```
$ git clone https://github.com/WesleyMeneghini/search_cars.git
```
- Crie um Banco de dados
- Crie um arquivo de ambiente ```.env``` e coloque as informações de acesso do banco de dados, como nome que escolheu no passo anterior
-Execute o compando abaixo para baixar as dependencias do projeto:
```
$ composer install
```

- Rode as Migrates para que as tabelas sejam criadas no banco:
```
$ php artisan migrate
```

- Inicie o Servidor com o comando:

```
$ php artisan serve
```

- Acesse a url que é gerada após o serviço começar a rodar.
- Para poder fazer a busca registre-se no sistema.
- Aṕos isso jpa esta disponivel as rota de pesquisa de veiculos.


