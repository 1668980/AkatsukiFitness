#!/bin/bash
mysql -e 'drop database akatsuki_db;create database akatsuki_db;'
mysql -D akatsuki_db < akatsuki_db.sql && echo "DB is reloaded"
