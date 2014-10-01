#!/usr/bin/env bash

apt-get update
apt-get install -y sqlite3 php5-sqlite
echo "extension=sqlite3.so" > /etc/php5/conf.d/sqlite3.ini
service apache2 restart
