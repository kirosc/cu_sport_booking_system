#!/bin/bash

echo "export SERVER_NAME='$SERVER_NAME'" | tee -a /etc/apache2/envvars
source /etc/apache2/envvars
service apache2 reload
exec apache2 -D FOREGROUND