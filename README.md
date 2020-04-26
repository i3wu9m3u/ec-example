# ec-example

## How to install

```
# install
git clone repository_url project_dir
cd project_dir/

# change permissions
chmod -R 777 ./storage ./bootstrap/cache

# composer
composer install

# install nodejs
curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
sudo apt install -y nodejs

# env
cp -iv .env.example .env
vim .env
php artisan key:generate

# DB
php artisan migrate:fresh --seed

# storage
php artisan storage:link

# compile assets
npm install && npm run dev
```
