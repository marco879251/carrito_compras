<?php
session_start();

$products = array(
    1 => array("name" => "Producto 1", "price" => 10, "image" => "https://via.placeholder.com/150"),
    2 => array("name" => "Producto 2", "price" => 15, "image" => "https://via.placeholder.com/150"),
    3 => array("name" => "Producto 3", "price" => 20, "image" => "https://via.placeholder.com/150")
);

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total = 0;

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
        <h2>Carrito de Compras</h2>
        <?php if (!empty($cart)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $id => $quantity): 
                    $product = $products[$id];
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>$<?php echo $product['price']; ?></td>
                    <td>$<?php echo $subtotal; ?></td>
                    <td>
                        <a href="remove_from_cart.php?id=<?php echo $id; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-right">
            <h3>Total: $<?php echo $total; ?></h3>
            <a href="checkout.php" class="btn btn-success">Pagar</a>
        </div>
        <?php else: ?>
        <p>No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
