<?php
session_start();
// Set page title
$page_title = "Cart";
// Include header
require_once "header.php";
?>
<body>
  <main>
    <h2>Your Cart</h2>
    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_price = 0;
        foreach($_SESSION['cart'] as $product_id => $quantity):
          $sql = "SELECT * FROM products WHERE id = $product_id";
          $result = $conn->query($sql);
          $product = $result->fetch_assoc();
          $subtotal = $quantity * $product['price'];
          $total_price += $subtotal;
        ?>
        <tr>
          <td><?= $product['name'] ?></td>
          <td><?= $product['price'] ?></td>
          <td><?= $quantity ?></td>
          <td><?= $subtotal ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3">Total:</td>
          <td><?= $total_price ?></td>
        </tr>
      </tfoot>
    </table>
    <?php else: ?>
    <p>Your cart is empty.</p>
    <?php endif; ?>
  </main>
</body>