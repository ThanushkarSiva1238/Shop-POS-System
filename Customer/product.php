<?php
    $proID = $_GET['proID'];
?>

<?php

    @include 'config.php';

    session_start();

    if(isset($_SESSION_1['user'])){
        header('location:shop.php');
    }

?>
    
<?php
    @include 'config.php';

    if(isset($_POST['addcart'])){

        if(isset($_SESSION['user'])){
            $proID = $_POST['productID'];
            $count = $_POST['quantity'];
            $id = $_POST['id'];
            $quantity = $_POST['quan'];
            
            $select = "SELECT * FROM ordertb WHERE CusID = '$id' AND STATUS = 'Pending' ORDER BY Order_Timestamp DESC LIMIT 1";
            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $order = $row['OrderID'];

                $check = "SELECT * FROM payment WHERE OrderID = '$order'";
                $res = mysqli_query($conn, $check);

                if(mysqli_num_rows($res) > 0){
                    $insert = "INSERT INTO ordertb(OrderID, STATUS, CusID) VALUES(CONCAT('ORD/', DATE_FORMAT(CURRENT_TIMESTAMP, '%Y%m%d'), '/', DATE_FORMAT(CURRENT_TIME, '%H%i'), '/', '$id'), 'Pending', '$id')";
                    mysqli_query($conn, $insert);
                    
                    $select = "SELECT * FROM ordertb WHERE CusID = '$id' ORDER BY Order_Timestamp DESC LIMIT 1";
                    $result = mysqli_query($conn, $select);
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_array($result);
                        $order = $row['OrderID'];
                        if($count <= $quantity){
                            $insert = "INSERT INTO order_product VALUES('$order', '$proID', '$count')";
                            mysqli_query($conn, $insert);
            
                            $calculation = $quantity - $count;
                            $update = "UPDATE product SET Total_Quantity = '$calculation' WHERE ProductID = '$proID'";
                            mysqli_query($conn, $update);
                        }
                        else{
                            $error[] = 'Few left in stock! :: Available : '.$quantity;
                        }
                    }
                } else{
                    $select1 = "SELECT * FROM order_product WHERE OrderID = '$order' AND ProductID = '$proID'";
                    $result1 = mysqli_query($conn, $select1);
        
                    if(mysqli_num_rows($result1) > 0){
                        $error[] = 'This product is already in your cart. To increase the quantity, please visit the View cart option...';
                    }
                    else{
                        if($count <= $quantity){
                            $insert = "INSERT INTO order_product VALUES('$order', '$proID', '$count')";
                            mysqli_query($conn, $insert);
            
                            $calculation = $quantity - $count;
                            $update = "UPDATE product SET Total_Quantity = '$calculation' WHERE ProductID = '$proID'";
                            mysqli_query($conn, $update);
                        }
                        else{
                            $error[] = 'Few left in stock! :: Available : '.$quantity;
                        }
                    }
                }
            }
            else{
                $insert = "INSERT INTO ordertb(OrderID, STATUS, CusID) VALUES(CONCAT('ORD/', DATE_FORMAT(CURRENT_TIMESTAMP, '%Y%m%d'), '/', DATE_FORMAT(CURRENT_TIME, '%H%i'), '/', '$id'), 'Pending', '$id')";
                mysqli_query($conn, $insert);

                $select = "SELECT * FROM ordertb WHERE CusID = '$id' ORDER BY Order_Timestamp DESC LIMIT 1";
                $result = mysqli_query($conn, $select);
                if(mysqli_num_rows($result0) > 0){
                    $row = mysqli_fetch_array($result);
                    $order = $row['OrderID'];
                    if($count <= $quantity){
                        $insert = "INSERT INTO order_product VALUES('$order', '$proID', '$count')";
                        mysqli_query($conn, $insert);
        
                        $calculation = $quantity - $count;
                        $update = "UPDATE product SET Total_Quantity = '$calculation' WHERE ProductID = '$proID'";
                        mysqli_query($conn, $update);
                    }
                    else{
                        $error[] = 'Few left in stock! :: Available : '.$quantity;
                    }
                    
                }
            } 
        }
        else{
            header('location:login.php');
        }      
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" type="image/x-icon" href="bxl-stripe.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            text-decoration: none;
            color: #000;
        }

        body {
            font-family:'poppins';
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        nav{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: -20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            justify-content: flex-start;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        nav ul li {
            display: inline;
            padding: 0 10px;
        }

        nav ul li .active {
            border-bottom: 2px solid #333;
            width: 100%;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        .products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .container {
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 0 20px #aaa;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        .product-image {
            float: left;
            width: 300px;
            margin-right: 5rem;
        }

        .product-image img {
            width: 100%;
            height: auto;
        }

        .product-info {
            float: left;
            width: 500px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: -5px;
        }
        .product-price{
            padding-bottom: 15px;
        }
        .new-price {
            color: #555;
            font-size: 20px;
            font-weight: 600;
        }
        .status {
            color: var(--c);
            font-weight: 600;
            margin-top: 13px;
            margin-left: 1rem;
        }

        .product-quantity {
            margin-top: -5px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            height: 15px;
            margin-left: 5px;
        }

        .error-msg{
            text-align: left;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            font-size: 14px;
            margin-top: 2px;
            margin-bottom: 5px;
            color: red;
        }

        .add-to-cart {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <header>
        <h1>Sampath Food City (PVT) Ltd</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php" class="active">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="products">

        <?php
            @include 'config.php';

            if($conn->connect_error){
                die("Connection failed: ". $conn->connect_error);
            }
            $sql = "SELECT * FROM product, category WHERE product.CategoryID = category.CategoryID AND ProductID = '$proID'";
            $result = $conn->query($sql);
            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
        ?>

        <div class="container">
            <div class="product-image">
                <img src="/Sampath Food City/Pic/<?= $row['Image'] ?>">
            </div>
    
            <div class="product-info">
                <h2><?= $row['ProductName']?></h2>
    
                <div class="product-price">
                    <span class="new-price">Rs. <?= $row['Unit_Price']?>.00</span>
                </div>
    
                <form action="" method="post">

                    <input type="text" name="productID" value="<?= $row['ProductID']?>" style="display: none;">
                    <input type="text" name="quan" value="<?= $row['Total_Quantity']?>" style="display: none;">

                    <div class="product-quantity">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="quantity-input" name="quantity" value="1" min="1" id="count">
                        <?php
                            $border = 20;
                            if($row['Total_Quantity'] > $border){
                                echo '<p class="status" style="--c : Green;">In Stock</p>';
                            }
                            else if($row['Total_Quantity'] == 0){
                                echo '<p class="status" style="--c : Red;">Out of Stock</p>';
                            }
                            else if($row['Total_Quantity'] <= $border){
                                echo '<p class="status" style="--c : #DCCF02;">Low Stock</p>';
                            }
                        ?>
                    </div>

                    <?php
                        @include 'config.php';

                        if($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                        }
                        if (isset($_SESSION['user'])) {
                            $name = $_SESSION['user'];
                            $sql = "SELECT cl.CusID FROM customer_login cl WHERE cl.UserName = '$name'";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        
                                    echo '<input type="num" name="id" value=',$row['CusID'],' style="display: none;">';
                                    
                                }
                            } 
                        }
                    ?>

                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
            
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo '<input type="submit" id="add-to-cart" class="add-to-cart" name="addcart" value="Add to Cart" onclick="window.alert(\'Added to cart!\')">';
                        }
                        else{
                            echo '<input type="submit" id="add-to-cart" class="add-to-cart" name="addcart" value="Add to Cart" onclick="window.alert(\'Please Login or Sign Up to proceed.\')">';
                        }
                    
                    ?>
                </form>

            </div>
        </div>

        <?php
                }
            }
        ?>
    </section>

    <footer>
        <p>&copy; 2024 Sampath Food City (PVT) Ltd. All Rights Reserved.</p>
    </footer>
    
</body>
</html>