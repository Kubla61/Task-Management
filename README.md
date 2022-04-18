## About Project
This is simple CRUD RESTful API task and user management system, without front-end. 
After installation user will be able to Add, View, Update, Delete Tasks and Users. 
Search tasks by status and by assignee.

 Project is written on Laravel Framework 8.83.8 and PHP 7.4.26.

## Instalation
To setup this project basic knowledge of git, composer, PHP/Laravel and local enviroment is required. 

- [Download and install composer on your machine](https://getcomposer.org).
- Download and install [Xampp](https://xamppguide.com/xampp-7-4-26/) Or [MAMP](https://www.mamp.info/en/mamp/windows/). For windows Xampp is recommended, For macOS MAMP is required. Please keep in mind project is written on PHP 7.4.26. 
- [Download and install composer on your machine](https://getcomposer.org).
- Clone project from git using HTTPS method.
- Open project folder with your favourite IDE (In my case VSC is recommended).
- Open Terminal with ``` ctrl + ` ``` and run command ``` composer install ```.
- In the meantime create new database in your ``` localhost phpmyadmin ```.
- If ``` .env ``` file wasn't created automaticaly, open and copy ``` .env.example ```, then create ``` .env ``` and paste copied code. 
- Fill ``` .env ``` with the correct credentials of Database, if you don't know your db credentials you can check it in ``` localhost phpmyadmin ``` under "User Accounts". 
- Next step is to fill database. First run ``` php artisan key:generate ``` in terminal, next run ``` php artisan migrate ``` and ``` php artisan db:seed ```. 
- Now run ``` php artisan serve ``` in terminal, copy/click the link provided in termianl.

## Detailed description of the endpoints
