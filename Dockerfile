# Simple production-ish PHP + Apache image for a plain PHP site
# Keeps your current folder structure; serves from /var/www/html

FROM php:8.2-apache

# Enable commonly used Apache modules (rewrite for pretty URLs if needed)
RUN a2enmod rewrite headers expires

# Install mysql-client to run migrations
RUN apt-get update && apt-get install -y default-mysql-client && rm -rf /var/lib/apt/lists/*

# Copy project files to the web root
# If you later add composer or build steps, consider a multi-stage build
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Tighten permissions for Apache user (www-data)
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \;

# If you need custom Apache config or .htaccess, they will be picked up automatically.
# To force AllowOverride for .htaccess on DocumentRoot, you can add a site conf like below.
# Uncomment when needed.
# RUN echo '<Directory /var/www/html>\n\
#     AllowOverride All\n\
#     Require all granted\n\
# </Directory>' > /etc/apache2/conf-available/allow-override.conf \
#     && a2enconf allow-override

# Use production php.ini recommendations if desired
# RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

EXPOSE 80

# Default CMD comes from php:apache (apache2-foreground)
