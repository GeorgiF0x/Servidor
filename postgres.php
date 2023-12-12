<?

sudo apt-get update --fix-missing
sudo apt-get install  postgresql  postgresql-contrib
sudo -i -u postgres
psql
sudo nano /etc/postgresql/14/main/postgresql.conf //añadir * envez de localhost en listener 

sudo nano /etc/postgresql/14/main/pg_hba.conf // añadir host 0.0.0.0/0

//CREAR USUARIO DESDE ROOT DE POSTGRES Y DARLE PERMISOS 

sudo nano /etc/php/8.1/apache2/php.ini //descomentar extension=pdo_pgsql
