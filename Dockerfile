# 1. Usamos la imagen base de PHP con Apache
FROM php:8.2-apache

# 2. Activamos el módulo rewrite de Apache (útil para webs modernas)
RUN a2enmod rewrite

# 3. Copiamos TODOS tus archivos (public, src, etc) al contenedor
COPY . /var/www/html/

# 4. Ajuste IMPORTANTE:
# Como tu index.php está dentro de "public", le decimos a Apache que
# la carpeta raíz pública sea /var/www/html/public en vez de la defecto.
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 5. Damos permisos al usuario www-data (Apache) para evitar errores de lectura
RUN chown -R www-data:www-data /var/www/html