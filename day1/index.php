<?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require 'connect.php';

    echo ("<script>alert('" . file_get_contents('php://input') . "');</script>");

    $items = "<ul>";

    foreach (explode("&", file_get_contents('php://input')) as $item) {
      $items = $items . "<li>$item</li>";
    }

    $items = $items . "</ul>";

    echo ("<script>alert('$items');</script>");

    echo ("<script>alert('Order placed successfully!');window.location.href='/php/day1/';</script>");

    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
  </head>
  <body>
    <?php require"cart.php" ?>
  </body>
</html>