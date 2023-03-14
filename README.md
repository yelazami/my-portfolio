# My Protfolio APP

## In this project, my goal is to showcase my expertise in backend & frontend development

### Tech used
- [X] [Docker](https://docs.docker.com/engine/install/)
- [X] [Docker Compose](https://docs.docker.com/compose/install/)
- [X] [Docker PHP & Nginx]()
- [X] [Symfony Framwork v6](https://symfony.com/doc/current/setup.html)
- [X] [PHP 8](https://www.php.net/releases/8.0/fr.php) 
- [X] [React.JS 17](https://fr.reactjs.org/blog/2020/08/10/react-v17-rc.html) 
- [X] [MakeFile](https://borntocode.fr/creer-un-makefile-pour-son-projet/) 

### Local installation
To install this project locally, you only need Docker and thanks to the magical use of Makefile, you only need to run :

```console
make install-dev
```
This will use:

    tear-down
which will stop and remove any container up

    clear
removes any back cache and logs

    container-up

Building and starting Docker container

    composer-install

Running composer install 

    npm-dev

Run npm install, and npm run dev

    load-data

And finaly Run doctrine migrations and loading fixtures
