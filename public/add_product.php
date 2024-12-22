<?php
require_once '../config/config.php';
require_once '../classes/Product.php';
require_once '../classes/Category.php';

$product = new Product($pdo);
$category = new Category($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $mainImage = $_FILES['main_image']['name'];
    $price = $_POST['price'];
    $categoryId = $_POST['category_id'];

    move_uploaded_file($_FILES['main_image']['tmp_name'], "../uploads/$mainImage");

    $product->addProduct($name, $description, $mainImage, $price, $categoryId);
    header('Location: index.php');
}

$categories = $category->getCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
</head>
<body>
    <h1>Добавить товар</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Название:</label>
        <input type="text" name="name" required>
        <label>Описание:</label>
        <textarea name="description" required></textarea>
        <label>Основное изображение:</label>
        <input type="file" name="main_image" required>
        <label>Цена:</label>
        <input type="number" name="price" required>
        <label>Категория:</label>
        <select name="category_id">
            {foreach from=$categories item=cat}
                <option value="{$cat.id}">{$cat.name}</option>
            {/foreach}
        </select>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>