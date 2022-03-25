<?php

require __DIR__ . '/Config.php';
require __DIR__ . '/Model/DB_Connect.php';

require __DIR__ . '/Model/Entity/AbstractEntity.php';
require __DIR__ . '/Model/Entity/User.php';
require __DIR__ . '/Model/Entity/Product.php';
require __DIR__ . '/Model/Entity/Role.php';
require __DIR__ . '/Model/Entity/Basket.php';
require __DIR__ . '/Model/Entity/Category.php';
require __DIR__ . '/Model/Entity/Order.php';

require __DIR__ . '/Model/Manager/AbstractManager.php';
require __DIR__ . '/Model/Manager/BasketManager.php';
require __DIR__ . '/Model/Manager/CategoryManager.php';
require __DIR__ . '/Model/Manager/OrderManager.php';
require __DIR__ . '/Model/Manager/ProductManager.php';
require __DIR__ . '/Model/Manager/RoleManager.php';
require __DIR__ . '/Model/Manager/UserManager.php';


require __DIR__ . '/Controller/AbstractController.php';
require __DIR__ . '/Controller/UserController.php';
require __DIR__ . '/Controller/ErrorController.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/CategoryController.php';
require __DIR__ .'/Controller/ProductController.php';
require __DIR__ .'/Controller/BasketController.php';



require __DIR__ . '/Router.php';