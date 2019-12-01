#!/usr/bin/env bash

if [ -d ./Pyoverview ]; then
    echo "Pyoverview exists! Updating...."
    cd Pyoverview && git pull
else
    echo "Folder not found !  Creating it !"
    git clone https://github.com/mignat/Pyoverview.git
fi

echo "Creating symbolic link"
rm -R /var/www/html
ln -sf ./Pyoverview/containers/web/www/ /var/www/html
