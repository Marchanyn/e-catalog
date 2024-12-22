<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addProduct($name, $description, $mainImage, $price, $categoryId) {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, main_image, price, category_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $mainImage, $price, $categoryId]);
    }

    public function getProducts() {
        $stmt = $this->pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>