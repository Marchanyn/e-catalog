<?php
require_once '../config/config.php';
require_once '../libs/Smarty.class.php';

$smarty = new Smarty();
$product = new Product($pdo);
$category = new Category($pdo);

$smarty->assign('products', $product->getProducts());
$smarty->assign('categories', $category->getCategories());
$smarty->display('../templates/index.tpl');
?>