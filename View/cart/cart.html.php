<?php

use App\Model\Entity\Product;

if (isset($_SESSION['product'])) {
        echo "<pre>";
        var_dump($_SESSION['product']);
        echo "</pre>";
}