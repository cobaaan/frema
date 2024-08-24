FROM php:7.4.9-fpm

# PHPの設定ファイルをコピー
COPY php.ini /usr/local/etc/php/

# 必要な依存関係とGDライブラリをインストール
RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  && apt install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo_mysql zip gd \
  && apt clean

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

# 作業ディレクトリの設定
WORKDIR /var/www

# GDライブラリの確認のためにphpinfo出力（必要であればコメント解除）
# RUN php -r "phpinfo();" | grep GD

