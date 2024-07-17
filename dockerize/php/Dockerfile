FROM php:8.3.0-apache
# Create user "codedrian" with UID 1000
#RUN useradd -r --uid 1000 codedrian
# Create group "codedrian" with GID matching your host (replace 1000 with your actual host GID)
RUN useradd -m -u 1000 codedrian
#--user-group

# Mod Rewrite
RUN a2enmod rewrite

# Linux Library
RUN apt-get update -y && apt-get install -y \
libicu-dev \
libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs
    # Composer
    COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

    # PHP Extension
    RUN docker-php-ext-install gettext intl pdo_mysql gd

    RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
    # Set "codedrian" as the default user within the container
    USER codedrian

    WORKDIR /var/www/html
