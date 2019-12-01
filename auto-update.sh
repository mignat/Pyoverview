#!/usr/bin/env bash

if [ -d ./Pyoverview ]; then
    echo "Pyoverview exists! Updating...."
    cd Pyoverview && git pull

    if [ $1 == "testing" ]; then
        git checkout testing
    else
        git checkout stable
    fi
else
    echo "Folder not found !  Creating it !"
    git clone https://github.com/mignat/Pyoverview.git
fi

echo "Creating symbolic link"
rm -R /var/www/html
ln -sf ./Pyoverview/containers/web/www/ /var/www/html
