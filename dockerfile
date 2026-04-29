FROM php:8.2-cli

WORKDIR /app

# Copie tous tes fichiers
COPY . .

# Expose le port
EXPOSE 10000

# Lance le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
