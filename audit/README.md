Installation du projet
======================

Exemple d'installation sous une debian-like via apache2.

Prérequis
---------

Ce projet requiert un serveur web, avec php installé
et configuré, ainsi qu'un serveur MySQL.

```# apt-get install apache2 libapache2-mod-php5 php5-mysql mysql-server```

Installation
------------

# Créer une base de donnée et un utilisateur pour l'application

```# cd path/to/git/audit/conf ; mysql --defaults-file=/etc/mysql/debian.cnf < setup.sql```

# Déployer les sources dans le répertoire du serveur web

```# cd path/to/git/audit; mkdir -p /var/www/tiir; cp -r . /var/www/tiir/ ; chown -R www-data:www-data /var/www ```

# Configurer le serveur web
```
# (cat <<CONF
<VirtualHost *:80>
  ServerName tiir
  DocumentRoot /var/www/tiir/audit/src/
  CustomLog /var/log/apache2/tiir.log combined
  ErrorLog /var/log/apache2/tiir-error.log
</VirtualHost>
CONF
) > /etc/apache2/sites-available/tiir
# a2ensite tiir
```

# Déployer le binaire "inv" dans un répertoire accessible et dans
  le path de l'utilisateur sous lequel tourne votre serveur web.
  
  cp path/to/git/inv /usr/bin

Sur votre poste
---------------

Configurez votre dns (ou fichier hosts) pour que tiir pointe sur l'IP de 
votre machine virtuelle.

Autre serveur web
-----------------
Une configuration d'exemple pour nginx vous est donnée dans le 
sous-dossier conf.

