FROM php:8.2-fpm-alpine

# Instala extensões necessárias para o MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o código da aplicação
COPY index.php .

# Usuário não-root para segurança
USER www-data