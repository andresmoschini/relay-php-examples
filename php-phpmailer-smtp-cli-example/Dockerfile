FROM dopplerrelay/doppler-relay-php-base

# Replace with your values
ENV DOPPLERRELAY_USERNAME myusername@mydomain.com
ENV DOPPLERRELAY_PASSWORD my_api_key

# Copy current code
WORKDIR /usr/src/php-phpmailer-smtp-cli-example
COPY . .

# Example script
CMD [ "php", "./php-phpmailer-smtp-cli-example.php" ]
