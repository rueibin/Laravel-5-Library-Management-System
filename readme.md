# Laravel-5 Library Management System



## Preview

**Login Page**

![avatar](https://github.com/rueibin/Laravel-Library/blob/master/public/images/login.PNG)



**Permission List Page**

![avatar](https://github.com/rueibin/Laravel-Library/blob/master/public/images/function.PNG)



## Technologies Used

- Front-end
  - Bootstrap 3.x
  - jQuery 2.x
  - Ajax
- Back-end
  - Laravel 5.x
  
  - Form Validation
  
  - Zizaco\Entrust
    



## System Module

![avatar](https://github.com/rueibin/Laravel-Library/blob/master/public/images/system.JPG)



## Features

- Front-end

  - User login and logout
  - Borrow and return operations
  - Adding and editing books
  - View the book list
  - more...

- Back-end

  - Using repository pattern and service Layer
  - Using users roles and permissions management 



## Requirements

- PHP 7.2+
- Mysql  5.7+



## Installation



1.Download code from Github
```
git clone https://github.com/rueibin/Laravel-5-Library-Management-System.git
```



2.Install the extended package dependency

```
composer install
```



3.Generate application key

```
php artisan key:generate
```



4.Copy .env.example to .env



5.Update .env file with DB information

```
DB_HOST=localhost
DB_DATABASE=library
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=array
```



6.Import database schema:

- library.sql



7.Start Application

```
php artisan serve
```



8.Open URL on your browser:

```
http://127.0.0.1:8000
```

account:admin

password:123456

