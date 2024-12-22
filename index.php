<?php
use App\Product;
require_once __DIR__ . '/vendor/autoload.php';

session_start();

if(!isset($_SESSION['products']))
{
    $_SESSION['products'] = [];
}

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $price = $_POST["price"];

    $product = new Product($name, $price);

    $_SESSION['products'][] = $product;
}

$products = $_SESSION['products'];

$found_products = null;
if(isset($_GET['search_btn']))
{
    $search_name = $_GET['search'];
    $found_products = Product::searchByName($_SESSION['products'], $search_name);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <form method="post">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Price" name="price">
        <input type="submit" value="Add" name="add">
    </form>
    <?php if(!empty($products)): ?>
        <?php foreach($products as $product): ?>
            <h3><?php echo $product->getProduct(); ?></h3>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>No products added yet.</h3>
    <?php endif; ?>
<hr>
<form method="get">
    <input type="text" name="search" placeholder="Search">
    <input type="submit" name="search_btn" value="Search">
</form>
    <?php if(isset($_GET['search'])): ?>
        <?php if($found_products): ?>
            <h3><?php echo $found_products->getProduct(); ?></h3>
        <?php else: ?>
            <h3>Product not found.</h3>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>