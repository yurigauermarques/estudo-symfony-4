# Estudo do Symfony 4.4

> Repositório utilizado para estudar Symfony4

---

## Material
- [Ambiente PHP](https://github.com/yurigauermarques/ambiente-php)
- [Symfony 4](https://symfony.com/4)
- [Symfony Documentation](https://symfony.com/doc/4.4/index.html)
- [Modelo utilizado para montar o container do Node para rodar o encore](https://github.com/symfony/webpack-encore/issues/366)

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
- [Databases + Doctrine ORM](https://symfony.com/doc/4.4/doctrine.html)
  ```bash
  docker-compose run --rm composer require symfony/orm-pack;
  ```

- [MakerBundle](https://symfony.com/doc/current/bundles/SymfonyMakerBundle/index.html)
  ```bash
  docker-compose run --rm composer require --dev symfony/maker-bundle;
  ```

- [CSRF Protection](https://symfony.com/doc/4.4/security/csrf.html)
  ```bash
  docker-compose run --rm composer require symfony/security-csrf;
  ```

- [Installing Encore](https://symfony.com/doc/4.4/frontend/encore/installation.html)
  ```bash
  docker-compose run --rm composer require symfony/webpack-encore-bundle;
  docker-compose run --rm node yarn install;
  ```

- [Enabling React.js](https://symfony.com/doc/current/frontend/encore/reactjs.html)
  ```bash
  yarn add @babel/preset-react --dev
  yarn add react react-dom prop-types
  ```
---

## Symfony


- Form
    - [Types](https://symfony.com/doc/4.4/reference/forms/types.html)
- Encore
    - [Encore: Setting up your Project](https://symfony.com/doc/4.4/frontend/encore/simple-example.html)
    - [Encore Documentation](https://symfony.com/doc/4.4/frontend.html#encore-toc)






## Ideias para implementar

- [Aplicação com Symfony e React](https://auth0.com/blog/developing-modern-apps-with-symfony-and-react/)
- [Symfony Cast](https://symfonycasts.com/screencast/symfony3/reactjs-api)