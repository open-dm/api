#!/bin/bash

opendm() {
  # echo "tml $1 ${@:2}" >> ~/odm-toolkit.log

  opendm_$1 ${@:2}
}

alias odm="opendm"



function opendm_dir {
  cd $ODM_DOCKER
}



#
# Manually Accessing Containers
#
function opendm_container:ssh {
  docker exec -it $1 bash
}
function opendm_container:cmd {
  docker exec -it $1 bash -c "${@:2}"
}
function opendm_container:run {
  opendm_dir && docker-compose run --rm $1 "${@:2}"
}



#
# Laravel / Composer
#
function opendm_composer:install {
  opendm_container:run composer composer install
}
function opendm_composer:update {
  opendm_container:run composer composer update
}
function opendm_composer:require {
  opendm_container:run composer composer require $@
}
function opendm_composer:remove {
  opendm_container:run composer composer remove $@
}
function opendm_composer:dump {
  opendm_container:run composer composer dump
}



#
# Vue / Node
#
function opendm_vue:install {
  opendm_container:run opendm npm install $@
}
function opendm_vue:uninstall {
  opendm_container:run opendm npm uninstall $@
}



#
# Api
#
function opendm_api:output {
  opendm_dir
  docker-compose logs --follow nginx mysql php phpmyadmin redis
}
function opendm_nginx:output {
  opendm_dir
  docker-compose logs --follow nginx
}
function opendm_mysql:output {
  opendm_dir
  docker-compose logs --follow mysql
}
function opendm_php:output {
  opendm_dir
  docker-compose logs --follow php
}
function opendm_redis:output {
  opendm_dir
  docker-compose logs --follow redis
}

function opendm_api:build {
  opendm_dir
  docker-compose build nginx php redis mysql phpmyadmin
  docker-compose build composer
  docker-compose build tinker
}
function opendm_api:start {
  opendm_dir
  docker-compose up -d nginx php redis mysql phpmyadmin
}
function opendm_api:stop {
  opendm_dir
  docker-compose stop nginx php redis mysql phpmyadmin
}
function opendm_api:restart {
  opendm_dir
  docker-compose restart nginx php redis mysql phpmyadmin
}



#
# Artisan / Tinker
#
function opendm_artisan {
  opendm_container:run tinker php artisan $@
}
function opendm_tinker {
  opendm_artisan tinker
}
