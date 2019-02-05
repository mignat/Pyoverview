#!/usr/bin/env bash


echo "=============================="
echo " PyOverview Deployment Script "
echo "=============================="
echo ""
echo ""
sudo echo "[INIT] Starting Install..."
echo "[INFO] Cloning Repo..."
git clone https://github.com/mignat/Pyoverview.git
cd PyOverview
echo "[INFO] Installing Prerequisites..."
sudo apt-get update > /dev/null && sudo apt-get -y upgrade > /dev/null && DEBIAN_FRONTEND=noninteractive apt-get -y install \
        apache2 php7.0 php7.0-mysql libapache2-mod-php7.0 curl lynx-cur dnsmasq hostapd > /dev/null
sudo systemctl stop dnsmasq
sudo systemctl stop hostapd
echo "[INFO] Installing APP"
cp containers/web/www/* /var/www/html
echo "[INFO] Installing MYSQL Database ( Please follow the onscreen instructions )"
sudo apt-get install mysql-server --fix-missing
printf "[!!!!]Please provide the mysql password to continue: "
read -r mysql_pass
echo "[INFO] Populating Database"
mysql -uroot -p$mysql_pass -hlocalhost -s << containers/db/pyoverview_db_1
