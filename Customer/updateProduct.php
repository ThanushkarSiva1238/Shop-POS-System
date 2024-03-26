<?php
    $proID = $_GET['proID'];
    $count = $_GET['quantity'];
    $amount = $_GET['amount'];
    $order = $_GET['OdrID'];
?>
    
<?php
    @include 'config.php';

    if(isset($_POST['updatecart'])){
        $new = $_POST['newQuantity'];
        $quantity = $_POST['quan'];

        $final = ($quantity + $count) - $new;

        if(0 <= $final){
            $modify = "UPDATE order_product SET Order_Quantity = '$new' WHERE OrderID = '$order' AND ProductID = '$proID'";
            mysqli_query($conn, $modify);

            $update = "UPDATE product SET Total_Quantity = '$final' WHERE ProductID = '$proID' ";

            if($conn->query($update)===True){
                header('location:shop.php');
            }  
        }
        else{
            $error[] = 'Few left in stock!';
        }

             
    };

    if(isset($_POST['deletecart'])){
        
        if($conn->connect_error){
            die("Connection Error :(".$conn->connect_error);
        }

        $delete = "DELETE FROM order_product WHERE OrderID = '$order' AND ProductID = '$proID' ";

        if($conn->query($delete)===True){
            header('location:shop.php');
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

        .product-quantity {
            margin-bottom: 10px;
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
            margin: 0;
            padding: 0;
            font-size: 16px;
            margin-top: 2px;
            margin-bottom: 5px;
            color: red;
        }

        .func {
            display: flex;
            gap: 20px;
            margin-top: 20px;
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
                    <input type="text" name="quan" value="<?= $row['Total_Quantity']?>" style="display: none;">

                    <div class="product-quantity">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="quantity-input" name="newQuantity" value="<?= $count?>" min="1" id="count">
                    </div>

                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
                    
                    <div class="func">
                        <input type="submit" id="add-to-cart" class="add-to-cart" name="updatecart" value="Update Cart" onclick="window.alert('Updated to cart!')">
                        <input type="submit" id="add-to-cart" class="add-to-cart" name="deletecart" value="Delete Cart" onclick="window.alert('Deleted to cart!')">
                    </div>
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