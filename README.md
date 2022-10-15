# PHP MVC SYSTEM FOR SALE PHONES
Using php to create a coffee sale coffee website <br />
With mvc structure we divide project into many folder: <br />

- bootstrap: contain bootstrap framework. <br />
- font: contain font. <br />
- img: contain img. <br />
- views: contain files to display front-end. <br />
- layouts: contain files to display layout, includes home, admin, auth. <br />
- models: contain php files to deploy back-end. <br />
- controllers: contain php to deploy back-end. <br />
- migrations: update database. <br />
- middlewares: contain middleware. <br />
- core: contain the core classes. <br />

It's a simple php-mvc template version 1.0. We will maintain and develop in future.

## SET UP

### Tạo mysql database:

1. Đầu tiên, sử dụng DBMS của bạn tạo một connection mysql database
2. Chạy lệnh sau để khởi tạo biến môi trường `.env`
    ```bash
    cp .env.example .env
    ```

### Tạo dotenv

1. Vào folder project, truy cập file `.env`.
2. Copy các biến môi trường sau vào file `.env`
    ```bash
    DB_DSN=mysql:host=localhost;dbname=
    DB_USER=
    DB_PASSWORD=
    ```
3. Điền các thông tin về `mysql server` của bạn. 
- Trong đó `DB_PASSWORD`, `DB_USER` lần lượt là các thôn tin về `user` và `password` của `mysql server`. 
- `dbname` là tên `schema` mà bạn đặt cho `database` trong project này.

### Install dependencies package
1. Mở terminal lên rồi lệnh sau:

    ```bash
    composer install
    ```
2. Nếu chưa có `composer` thì tiến hành cài đặt ở trang web [này](https://getcomposer.org/download/).
### Run migration:

1. Mở terminal lên rồi lệnh sau:

    ```bash
    php migrations.php
    ```

2. Terminal trả về như sau là thành công:

    ```bash
    [2021-10-28 19:10:49] - Applying migration m0001_initial.php
    [2021-10-28 19:10:49] - Applyied migration m0001_initial.php
    ```

3. Nếu không được như vậy thì hãy `drop` hết table trong `database` rồi chạy migrate lại.<br />



## Run project

Để chạy project, chạy lệnh sau:

```bash
cd public
php -S localhost:8000
```
