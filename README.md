# Estudo do Symfony 4.4

> Repositório utilizado para estudar Symfony4

---

## Material
- [Ambiente PHP](https://github.com/yurigauermarques/ambiente-php)
- [Symfony 4](https://symfony.com/4)
- [Symfony Documentation](https://symfony.com/doc/4.4/index.html)

---

## Instalação e Configuração
  - [Setup](https://symfony.com/doc/4.4/setup.html)
    - Instalação para a aplicação web tradicional
      ```bash
      docker run --rm --interactive --tty --volume  C:\Users\yurig\Projetos\estudo-symfony-4\:/app composer create-project symfony/website-skeleton:"^4.4" app;
      ```
    - Configuração
      - **host**
        - editar o `hosts`
          - no **Windows**  `C:\Windows\System32\drivers\etc `
          - no **CentOS**   `/etc/hosts`
        - adicione o conteúdo no final do arquivo
          ```bash
          127.0.0.1 estudo-syfmony-4.localhost
          ```
      - **Configurar o Web Server**
        - [Como configurar o webserver](https://symfony.com/doc/4.4/setup/web_server_configuration.html#nginx)

---

##

---
      What's next?


     * Run your application:
       1. Go to the project directory
       2. Create your code repository with the git init command
       3. Download the Symfony CLI at https://symfony.com/download to install a development web server

     * Read the documentation at https://symfony.com/doc


    What's next?


     * You're ready to send emails.

     * If you want to send emails via a supported email provider, install
       the corresponding bridge.
       For instance, composer require mailgun-mailer for Mailgun.

     * If you want to send emails asynchronously:

       1. Install the messenger component by running composer require messenger;
       2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the
          config/packages/messenger.yaml file under framework.messenger.routing
          and replace amqp with your transport name of choice.

     * Read the documentation at https://symfony.com/doc/master/mailer.html


    Database Configuration


     * Modify your DATABASE_URL config in .env

     * Configure the driver (mysql) and
       server_version (5.7) in config/packages/doctrine.yaml


    How to test?


     * Write test cases in the tests/ folder
     * Run php bin/phpunit
