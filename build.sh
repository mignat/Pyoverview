#!/usr/bin/env bash

#docker-compose down web && docker-compose build web && docker-compose start web
docker-compose up -d --build web
docker-compose up -d phpmyadmin