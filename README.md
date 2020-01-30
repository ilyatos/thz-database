# THz Modern Storage

## Motivation
Welcome to innovative and modern THz storage. Here you will find nothing except some code and magic!
The main purpose of this project – be a great place for scientists to share their experiment data with others. For What? 
Well, here are the reasons:
1. A lot of researches can make life easier as far as you don't need to perform the same experiment twice;
2. The faster investigation is equal to money-saving;
3. It's an excellent opportunity to compare your measurements with computations made by other people;
4. You don't need confused Excel, complicated databases and other proprietary software.

## Contribution
If you want to become part of the future, just read further.
### Build it, run it, do it!
Make sure that you have installed Docker and `docker-compose`, then follow these steps:
1. Change directory to `thz-ms` and rename *.env.dev* to *.env*;
2. Go to root, rename *docker-compose.dev.yml* to *docker-compose.yml*;
3. Run command `docker-compose up --build` to run project containers;
4. After a successful building execute `docker exec -it thz-db_php_1 sh` and you will get PHP container shell;
5. Execute `composer install` and then `php artisan migrate --seed` to make the backend alive;
6. Outside of container in **thz-ms** folder `run yarn install && yarn run development` to build the frontend;
7. Feel free to add beautiful code!
