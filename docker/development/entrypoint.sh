#!/usr/bin/env bash
composer update

service nginx start
php-fpm
