<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/scripts.js" defer></script>
</head>
<body>
    <h1>Каталог товаров</h1>
    <ul>
        {foreach from=$categories item=cat}
            <li>{$cat.name}</li>
        {/foreach}
    </ul>
    <div class="products">
        {foreach from=$products item=prod}
            <div class="product">
                <h2>{$prod.name}</h2>
                <img src="{$prod.main_image}" alt="{$prod.name}">
                <p>{$prod.description}</p>
                <p>Цена: {$prod.price} руб.</p>
                <a href="product.php?id={$prod.id}">Подробнее</a>
            </div>
        {/foreach}
    </div>
</body>
</html>