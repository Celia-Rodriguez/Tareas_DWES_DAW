# copia y pega todo esto en la terminal

sudo apt update

# instalar mysql
sudo apt install mysql-server -y

# instalar php (y meter otro repositorio)
sudo apt install software-properties-common -y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install php7.4 -y
sudo apt-get install -y php7.4-cli php7.4-json php7.4-common php7.4-mysql php7.4-zip php7.4-gd php7.4-mbstring php7.4-curl php7.4-xml php7.4-bcmath

# instalar apache
sudo apt install apache2 -y

# la carpeta del servidor está en /var/www/html
# doy permisos 
sudo chmod -R 777 /var/www/html



