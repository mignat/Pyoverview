#!/usr/bin/env bash
echo "Installing Prerequisits
sudo apt install nginx git -y

if [ -f ./Pyoverview ]; then
    echo "Pyoverview exists! Updating...."
    cd Pyoverview && git pull
else
    echo "Folder not found !  Creating it !"
    git clone https://github.com/mignat/Pyoverview.git
fi

echo " Creating symbolic link"
ln -s /var/www/html ./PyOverview/Containers/web/www