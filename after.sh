#!/bin/sh

# Refresh package list
sudo apt-get update

# Install basic packages
sudo apt-get install -y mc

# Remove Node.js v12.x:
sudo apt-get -y purge nodejs
sudo rm -rf /usr/lib/node_modules/npm/docs
sudo rm -rf /usr/lib/node_modules/npm/lib
sudo rm -rf /etc/apt/sources.list.d/nodesource.list

# Install nvm and node and npm
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.37.2/install.sh | bash
export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
nvm install 14

# Upgrade composer
composer selfupdate --2
