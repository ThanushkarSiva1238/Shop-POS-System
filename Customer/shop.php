<?php
    @include 'config.php';

    session_start();

    if(isset($_SESSION_2['user'])){
        header('location:shop.php');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" type="image/x-icon" href="bxl-stripe.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            text-decoration: none;
            color: #000;
        }
        /* width */
        *::-webkit-scrollbar {
            width: 7px;
            height: 10px;
        }
        /* Track */
        *::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }        
        /* Handle */
        *::-webkit-scrollbar-thumb {
            background: #2d2b3d; 
            border-radius: 10px;
        }
        /* Handle on hover */
        *::-webkit-scrollbar-thumb:hover {
            background: #16151f; 
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

        .banner {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 15px 20px;
            background-color: #eee;
        }

        .banner form{
            width: 70%;
            padding: 0px 10px;
            margin: 7px 0 0 10px;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner form input[type='text']{
            width: 100%;
            outline: none;
            border: 0px;
            background: transparent;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
        }

        .banner form #search {
            display: none;
        }

        .banner #main {
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .banner .material-symbols-outlined{
            margin-right: 5px;
        }

        .banner form .material-symbols-outlined {
            color: #aaa;
            font-weight: 900;
            width: 100%;
        }

        .cart .content{
            opacity: 0;
            visibility: hidden;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 360px;
            background: #ccc;
            border-radius: 1rem;
            box-shadow: 0 2px 12px 700px rgba(0, 0, 0, 0.5);
            color: #fff;
            transition: .3s ease-in;
        }

        #click{
            display: none;
        }

        #click:checked ~ .content{
            opacity: 1;
            visibility: visible;
        }

        .click-me{
            width:max-content;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .click-me i{
            font-size: 1.4em;
            padding-right: 10px;
            position: relative;
            top: 5px;
        }

        .click-me:hover{
            box-shadow: none;
        }

        .content .header{
            background: var(--color-pro);
            height: 68px;
            overflow: hidden;
            border-radius: 1rem 1rem 0 0;
            display: flex;
            align-items: center;
        }

        .header h2{
            padding-top: -20px;
            padding-left: 32px;
            font-weight: normal;
            font-size: 20px;
            font-weight: 700;
        }

        #fa-xmark{
            position: absolute;
            right: 32px;
            top: 25px;
            color: #999;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .content .main{
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            height: 225px;
            width: 380px;
            margin: 0 10px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .main .table{
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 380px;
            height: fit-content;
        }

        .table .cartProduct {
            display: flex;
            align-items: center;
            padding: 0 1rem 0 .5rem;
        }

        .main .table .cartProduct img {
            width: 3.5rem;
            height: 3.5rem;
            object-fit: contain;
            margin-right: 2px;
        }

        .cartProduct .detail {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 260px;
            margin: 0 5px;
            text-align: left;
        }

        .detail .h4{
            font-size: 16px;
            margin: 0;
            width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .detail .h5{
            font-size: 14px;
            font-weight: 700;
        }

        .quantity-input {
            width: 20px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
        }
        #Login{
            display: flex;
            justify-content: center;
        }
        #Login .cartProduct .detail{
            background-color: #007bff;
            padding: .5rem;
            text-align: center;
            width: 3rem;
            color: #f4f4f4;
            border-radius: 5px;
        }

        hr{
            width: 380px;
            height: 1px;
        }

        #main .line{
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: .5rem 0 .3rem;
        }

        .line button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
        }
        a .login{   
            width: 8em;
        }

        .products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product {
            margin: 10px;
            padding: 40px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            width: 200px;
            height: 16rem;
        }

        .product span{
            display:flex;
            position: relative;
            background: red;
            padding: 5px 10px;
            width: fit-content;
            top: -36px;
            color: #eee;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 5px;
        }

        .product img {
            width: 200px;
            height: 200px;
            margin-top: -20px;
            object-fit: contain;
            margin-bottom: -10px;
        }

        .product h3{
            font-size: 14px;
            height: 2.6rem;
            padding-bottom: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product .price {
            font-weight: 700;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -15px 0 0 0;
            font-size: 18px;
        }

        .product strike{
            font-weight: 500;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sampath Food City (PVT) Ltd</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#" class="active">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <form action="" method="post">
            <input type="text" name="engine" id="engine" placeholder="Search Product...">
            <label for="search"><span class="material-symbols-outlined">search</span></label>
            <input type="submit" id="search" name="sub">
        </form>

        <div class="cart" id="main">
            <input type="checkbox" id="click">
            <label for="click" class="click-me"><span class="material-symbols-outlined">shopping_cart</span>View Cart</label>
            <div class="content">
                <div class="header">
                    <h2>My Cart</h2>
                    <label for="click"><span class="material-symbols-outlined" id="fa-xmark">close</span></label>
                </div>
                <div class="main">
                    <div class="table">
                        <?php
                            @include 'config.php';

                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }
                            if (isset($_SESSION['user'])) {
                                $name = $_SESSION['user'];
                                $sql0 = "SELECT * FROM customer c, customer_login cl WHERE c.CustomerID = cl.CusID AND cl.UserName = '$name' ";
                                $result0 = $conn->query($sql0);
                                if($result0-> num_rows > 0){
                                    $row0 = $result0-> fetch_assoc();
                                    $id = $row0['CustomerID'];

                                    $check = "SELECT o.OrderID FROM ordertb o, customer c WHERE c.CustomerID = o.CusID AND c.CustomerID = '$id' AND o.STATUS = 'pending' ORDER BY o.Order_Timestamp DESC LIMIT 1";
                                    $result0 = $conn->query($check);

                                    if($result0-> num_rows > 0){
                                        $line = $result0->fetch_assoc();
                                        $order = $line['OrderID'];

                                        $check1 = "SELECT * FROM payment WHERE OrderID = '$order'";
                                        $res0 = $conn->query($check1);

                                        if($res0-> num_rows > 0){
                                            echo '<div class="cartProduct"><div class="detail"> 0 Results </div></div>';
                                        }
                                        
                                        else{
                                            $sql = "SELECT p.ProductID, p.ProductName, p.Image, p.Unit_Price, o.OrderID, op.Order_Quantity FROM product p, order_product op, ordertb o, customer c WHERE (p.ProductID = op.ProductID AND o.OrderID = op.OrderID AND c.CustomerID = o.CusID) AND c.CustomerID = '$id' AND o.OrderID = '$order'";
                                            $result = $conn->query($sql);

                                            $total = 0;
                                            if($result-> num_rows > 0){
                                                while($row = $result-> fetch_assoc()){
                                                    $odrID = $row['OrderID'];
                                                    $price = $row['Order_Quantity'] * $row['Unit_Price'];
                                                    $total = $total + $price;
                        ?>
                        
                        <a href="updateProduct.php?proID=<?= $row['ProductID']?>&quantity=<?= $row['Order_Quantity'] ?>&amount=<?= $price ?>&OdrID=<?= $row['OrderID'] ?>">
                            <div class="cartProduct">
                                <img src="/Sampath Food City/Pic/<?= $row['Image'] ?>">
                                <div class="detail">
                                    <p class="h4"><?= $row["ProductName"] ?></p>
                                    <span class="h5">Rs. <?= $price ?>.00</span>
                                </div>
                                <input type="text" class="quantity-input" value="<?= $row["Order_Quantity"] ?>" id="count" readonly>
                            </div>
                        </a>
                        <hr>

                        <?php
                                                }  
                                            }
                                        }
                                    }
                                } 
                            }
                            
                            else {
                                echo '<a href="login.php" id="Login"><div class="cartProduct"><div class="detail"> Login </div></div></a>';
                            }   
                        ?>
                    </div>
                </div>
                <?php
                    if (isset($_SESSION['user'])) {
                ?>
                <div class="line">
                    <a href="payment.php?total=<?php echo $total; ?>&order=<?php echo $odrID;?>&uname=<?php echo $name;?>"><button>Buy Now</button></a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <a href="login.php">
            <div class="login" id="main">
            <?php
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                }
                else {
                    $user = "Login";
                }
        
            ?>
                <span class="material-symbols-outlined">account_circle</span>
                <label id="user_name"><?php echo $user; ?></label>
            </div>
        </a>
    </section>

    <section class="products">

        <?php
            @include 'config.php';

            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);

            if(isset($_POST['sub'])){
                $engine =  $_POST['engine'];
                $sql = "SELECT * FROM product WHERE ProductName LIKE '$engine%' or ProductName LIKE '%$engine%'";
                $result = $conn->query($sql);

                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                    
        ?>

        <a href="product.php?proID=<?= $row['ProductID']?>">
            <div class="product">
                <img src="/Sampath Food City/Pic/<?= $row['Image'] ?>">
                <h3><?= $row["ProductName"]?></h3>
                <p class="price">Rs. <?= $row["Unit_Price"]?>.00 </p>
            </div>
        </a>

        <?php
                    }
                }
                else{
                    echo '<div class="tab" id="zero"> 0 Results </div>';
                };
            }
            else {
                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                        echo '<a href = "product.php?proID=', $row['ProductID'],'"><div class="product">
                                <img src="/Sampath Food City/Pic/', $row['Image'] ,'">
                                <h3>',$row["ProductName"],'</h3>
                                <p class="price">Rs. ',$row["Unit_Price"] ,'.00 </p>
                              </div></a>';
                    }
                }
            }
        ?>
        
    </section>

    <footer>
        <p>&copy; 2024 Sampath Food City (PVT) Ltd. All Rights Reserved.</p>
    </footer>
    
</body>
</html>