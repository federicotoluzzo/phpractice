<form id="cart" method="post" action="/php/day1/">
  <?php
    require 'connect.php';

    $products = $conn->query('SELECT * FROM products')->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
      echo sprintf('
      <div class="item">
        <img class="icon" src="%s">
        <div class="column">
          <label>%s</label>
          <label>%s€</label>
        </div>
        <input type="number" id="%s" min="0" class="number" data-price="%s" onchange="updateTotal()">
      </div>', $product["Icon"], $product["ProductName"], $product["Price"], $product["ProductId"], $product["Price"]);
    }
  ?>
  <p id="total">Total: 0€</p>
  <input type="submit" value="Proceed to checkout" class="submit" onchange="updateTotal()">
</form>
