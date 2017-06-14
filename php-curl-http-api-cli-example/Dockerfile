FROM dopplerrelay/doppler-relay-php-base

# Replace with your values
ENV DOPPLERRELAY_ACCOUNT_ID 12345 
ENV DOPPLERRELAY_ACCOUNT_NAME my-account-name
ENV DOPPLERRELAY_APIKEY my_api_key

# Copy current code
WORKDIR /usr/src/php-curl-http-api-cli-example
COPY . .

# Example script
CMD [ "php", "./php-curl-http-api-cli-example.php" ]
