# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Mettre à jour les paquets, installer nano et les extensions PHP
RUN apt-get update && apt-get install -y \
    nano \
    && docker-php-ext-install pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Activer le module mod_rewrite d'Apache
RUN a2enmod rewrite

# Copier les fichiers de l'application dans le répertoire de travail
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier et installer les dépendances Composer
RUN composer install

# Configurer les permissions pour le dossier de stockage Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configurer Apache
RUN echo '<Directory /var/www/html>' > /etc/apache2/sites-available/000-default.conf \
    && echo '    Options Indexes FollowSymLinks' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    AllowOverride All' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    Require all granted' >> /etc/apache2/sites-available/000-default.conf \
    && echo '</Directory>' >> /etc/apache2/sites-available/000-default.conf

# Exposer le port 80
EXPOSE 80
