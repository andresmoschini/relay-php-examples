FROM dopplerrelay/doppler-relay-php-base

# Replace with your values
ENV DOPPLERRELAY_USERNAME myusername@mydomain.com
ENV DOPPLERRELAY_PASSWORD my_api_key

# Copy current code
WORKDIR /usr/src/php-swiftmailer-smtp-cli-example
COPY . .

# Example script
CMD [ "php", "./php-swiftmailer-smtp-cli-example.php" ]
