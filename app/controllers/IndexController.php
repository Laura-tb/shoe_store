<?php

require_once __DIR__ . '/../models/ProductModel.php';

class IndexController
{
    public static function index(mysqli $db): void
    {
        $products = ProductModel::getAll($db);
        require __DIR__ . '/../views/IndexView.php';
    }
}