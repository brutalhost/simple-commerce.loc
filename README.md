# LaravelCommerce
A website with a shopping cart, orders and the YooKassa payment system. Uses Laravel, Bootstrap 5 and the [laravel-commerce](https://github.com/Yiddishe-Kop/laravel-commerce) package.

https://github.com/brutalhost/simple-commerce.loc/assets/18640248/ddab522d-3e08-41bd-a579-d48b39a4a321

### What has been implemented
An anonymous user can add items to the cart. This data is stored in the session and database.

Payment data is stored in the Payments table. Changing the status of payment and order is carried out when receiving a webhook from Yandex servers, so for correct operation you need to place the site on hosting or use a tunnel like ngrok.

If the payment is successful, the user can use the proposed redirect to the list of baskets and orders. If the payment was successful, the paid order will have a green background.

### How to start
-   Run  `composer install`
-   Add yout database to  `.env`
-   `php artisan key:generate`
-   `php artisan storage:link`
-   `php artisan migrate --seed`
-   `php artisan db:seed --class Database\Seeders\DatabaseSeeder`
-   `npm install`
-   `npm run dev`


If the site is running on a local machine, start a proxy tunnel. Example command for ngrok: ```ngrok http --host-header=simple-commerce.loc 80```. Instead of host, specify the url where the site is accessible on the local machine.

Specify the url ```https://****-**-**-**-**.ngrok-free.app/commerce/webhook``` in [YooKassa personal account](https://yookassa.ru/my/merchant/integration/http-notifications) to receive webhook notifications so that the gateway can change the order status to “completed”.
