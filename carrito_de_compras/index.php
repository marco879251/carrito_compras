<?php
session_start();

$products = array(
    1 => array("name" => "Producto 1", "price" => 10, "image" => "images/producto1.jpg"),
    2 => array("name" => "Producto 2", "price" => 15, "image" => "images/producto2.jpg"),
    3 => array("name" => "Producto 3", "price" => 20, "image" => "images/producto3.jpg")
);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <?php foreach ($products as $id => $product): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text">$<?php echo $product['price']; ?></p>
                        <a href="add_to_cart.php?id=<?php echo $id; ?>" class="btn btn-primary">Añadir al Carrito</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
