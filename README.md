<div align="center">
  <br>
	<a href="https://nfactory.school"><img src="assets/img/logo/logo-blue-bg-none.png" height="160"></a>
  <br>
  <p>
    <a href="/../../"><img src="https://img.shields.io/github/last-commit/nfactoryschool-2020/nfactory-netron" alt="GitHub last-commit" /></a>
  </p>
</div>

# NFactory - Netron
Netron est un projet dans le cadre d'une formation [NFactory School](https://nfactory.school) qui consiste à développer un site vitrine représentant une entreprise spécialisée dans l’analyse réseau.

## Installation
* [Installer Composer](https://getcomposer.org/download).

* Ensuite executer les commandes suivantes:
```
# Cloner le projet pour télécharger son contenu
> cd projects/
> git clone https://github.com/AntoineKM/nfactory-netron.git

# Faire en sorte que Composer installe les dépendances du projet dans le dossier vendor/
> cd nfactory-netron/
> composer install
```

* Pour finir, configurez votre ``.env`` comme le [.env.example](.env.example)

## Usage
Notes:

* Faites vos tests dans un dossier ``tests``.

### Base de données

**Utilisateurs**
| nr_users   	|                      	|
|------------	|----------------------	|
| id         	| int(11)              	|
| mail       	| varchar(160)         	|
| password   	| varchar(250)         	|
| token      	| varchar(255)         	|
| firstname  	| varchar(100)         	|
| lastname   	| varchar(100)         	|
| created_at 	| datetime             	|
| updated_at 	| datetime             	|
| role       	| varchar(20)         	|

**Logs**
| nr_logs   	|                      	|
|------------	|----------------------	|
| id         	| int(11)              	|
| user_id    	| int(11)              	|
| data        | json                	|
| created_at 	| datetime             	|
| updated_at 	| datetime             	|

**Contact**
| nr_contact 	|              	|
|------------	|--------------	|
| id         	| int(11)      	|
| mail       	| varchar(160)  |
| firstname  	| varchar(100) 	|
| lastname   	| varchar(100) 	|
| subject    	| varchar(255) 	|
| message    	| text         	|
| created_at 	| datetime     	|

## Credits
Ce projet contient les éléments open source suivants:
* [Autoprefixer](https://autoprefixer.github.io/)
* [Chart.js](https://chartjs.org/)
* [dotenv](https://github.com/symfony/dotenv)
* [Composer](https://getcomposer.org/)
* [Google Fonts](https://fonts.google.com)
* [jQuery](https://jquery.com/)
* [PHP](https://www.php.net/)
* [PHPMailer](https://github.com/PHPMailer/PHPMailer)
* [Remix Icon](https://remixicon.com)
* [Reset CSS](https://meyerweb.com/eric/tools/css/reset/)
* [Swiper](https://swiperjs.com/)
* [unDraw](https://undraw.co)

## Links
* [NFactory](https://nfactory.io)
* [NFactory School](https://nfactory.school)
* [Campus Saint Marc](https://campus-saint-marc.com)
