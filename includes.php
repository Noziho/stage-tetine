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

require __DIR__ . ' /Controller/AbstractController.php';
require __DIR__ . '/Controller/ErrorController.php';
require __DIR__ . '/Controller/HomeController.php';

require __DIR__ . '/Router.php';