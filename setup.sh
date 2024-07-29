#!/bin/bash

# Verificar se o Docker está instalado
if ! [ -x "$(command -v docker)" ]; then
  echo 'Erro: Docker não está instalado.' >&2
  exit 1
fi

# Subir os contêineres Docker em segundo plano
docker-compose up -d

# Instalar as dependências do Composer dentro do contêiner
docker-compose exec laravel.test composer install

# Gerar a chave da aplicação
docker-compose exec laravel.test php artisan key:generate

echo "Configuração completa! Acesse sua aplicação em http://localhost"
