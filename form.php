<?php

$servername = 3306;
$username = root;
$password = ajithkavi@123;
$dbname = pizza_orders;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pizzaSize = $_POST["pizzaSize"];
    $toppings = implode(", ", $_POST["topping"]);
    $deliveryAddress = $_POST["deliveryAddress"];

    // 
    $sql = "INSERT INTO orders (pizza_size, toppings, delivery_address) VALUES ('$pizzaSize', '$toppings', '$deliveryAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "Order saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
          
