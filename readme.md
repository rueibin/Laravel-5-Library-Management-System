
## 圖書管理系統 Library System

- 登入畫面 login
![avatar](https://github.com/rueibin/Laravel-Library/blob/master/public/images/login.PNG)

- 功能畫面 function
![avatar](https://github.com/rueibin/Laravel-Library/blob/master/public/images/function.PNG)


1.下載程式碼 download
- git clone https://github.com/rueibin/Laravel-Library.git

2.進入專案目錄，之後composer安裝 install
- composer install

3.配置.evn 
- 將.env.example複製成.env

4.配置資料庫 
- DB_HOST=localhost
- DB_DATABASE=homestead
- DB_USERNAME=homestead
- DB_PASSWORD=secret

5.遷移資料
- php artisan migrate

6.填充資料
- php artisan db:seed --class=ManagerTableSeeder
- php artisan db:seed --class=BookTypeTableSeeder
- php artisan db:seed --class=BookCaseTableSeeder
- php artisan db:seed --class=PublishingTableSeeder
- php artisan db:seed --class=ReaderTableSeeder
- php artisan db:seed --class=BookTableSeeder

7.匯入權限資料
- data.sql


