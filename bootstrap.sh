#!/usr/bin/env bash
sudo apt-get update
sudo apt-get install -y sqlite3 php5-sqlite
echo "extension=sqlite3.so" > /etc/php5/conf.d/sqlite3.ini
sudo service apache2 restart