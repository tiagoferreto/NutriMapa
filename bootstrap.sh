#!/usr/bin/env bash
 
#Variáveis de configuração do projeto
ProjectName="cms"
PathPublic="public"
 
sudo apt-get update
sudo apt-get install -y python-software-properties
 
#Pacote PHP 5.5 ou 5.4
#PHP5.5 sudo add-apt-repository ppa:ondrej/php5
sudo add-apt-repository ppa:ondrej/php5-oldstable
sudo apt-get update
 
# instala o suporte a NFS (sem ele o Vagrant fica uma carroça)
# Notas:
# - para usarmos Vagrant com NFS é necessário que tanto host quanto guest tenham suporte instalado.
# - no host, rode: sudo apt-get install nfs-common nfs-kernel-server portmap (note o nfs-common nfs-kernel-server que o guest não tem)
# - embora tenha colocado o pacote 'portmap', o apt-get instalou o pacote 'rpcbind' em seu lugar.
sudo apt-get install nfs-common portmap -y
 
#instalando PHP
sudo apt-get install -y php5 build-essential g++ git-core \
apache2 \
php5-xdebug \
php-apc \
php5-curl \
php5-gd \
php5-imagick \
php5-mssql \
php-pear \
php5-cli \
php5-json \
php5-mcrypt \
php5-intl \
php5-memcached \
php5-memcache \
memcached \
php5-dev \
libyaml-dev \
php5-mysql \
php5-imap \
php5-sqlite \
php5-common \
php5-ps \
php5-pspell \
php5-recode \
php5-snmp \
php5-tidy \
php5-xmlrpc \
php5-xsl \
firebird2.5-dev
 
# Mysql
# -----
# Ignore the post install questions
export DEBIAN_FRONTEND=noninteractive
# Install MySQL quietly
apt-get -q -y install mysql-server-5.5
 
# Laravel stuff
# -------------
# Set up the database
echo "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '' WITH GRANT OPTION; FLUSH PRIVILEGES;" | mysql
sudo /etc/init.d/mysql restart
 
#instalando Firebird
cd ~/
sudo apt-get source php5
cd php5-*
cd ext/pdo_firebird
phpize
sudo ln -s /usr/include/php5 /usr/include/php
./configure
make
sudo make install
cat << EOF | sudo tee -a /etc/php5/mods-available/pdo_firebird.ini
extension=pdo_firebird.so
EOF
 
sudo ln -s /etc/php5/mods-available/pdo_firebird.ini /etc/php5/apache2/conf.d/pdo_firebird.ini
 
#Adicionais
sudo apt-get install -y vim
 
# Configura xdebug
cat << EOF | sudo tee -a /etc/php5/conf.d/xdebug.ini
xdebug.scream=0
xdebug.cli_color=1
xdebug.show_local_vars=1
xdebug.max_nesting_level=250
xdebug.idekey="PHPSTORM"
EOF
sudo apt-get install sqlite3
sudo ln -s /usr/bin/sqlite3 /usr/bin/sqlite
#Configurando apache
sudo chmod -R 777 /vagrant/
sudo chown -R www-data.www-data /vagrant/
sudo rm -rf /var/www/index.html
sudo ln -s /vagrant/* /var/www/

cat << EOF | sudo tee -a /etc/apache2/sites-available/$ProjectName
<VirtualHost *:80>
ServerName localhost
ServerAdmin webmaster@localhost
DocumentRoot "/vagrant/$PathPublic"
SetEnv APPLICATION_ENV development
SetEnv APPLICATION_PATH /vagrant/
### Definicao para acesso do templumCliente
<Directory "/vagrant/$PathPublic">
DirectoryIndex index.php
AllowOverride All
Order allow,deny
Allow from all
</Directory>
ErrorLog /vagrant/error.log
# Possible values include: debug, info, notice, warn, error, crit,
# alert, emerg.
LogLevel warn
ServerSignature On
CustomLog /vagrant/access.log combined
</VirtualHost>
EOF
 
sudo a2dissite 000-default
sudo a2dissite default
sudo a2ensite $ProjectName
sudo a2enmod rewrite
sudo service apache2 restart