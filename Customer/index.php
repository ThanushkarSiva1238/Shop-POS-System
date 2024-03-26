<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampath Food City</title>
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

        .banner {
            text-align: center;
            padding: 5px 0 30px 0;
            background-color: #eee;
        }

        .banner .btn {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            border-radius: 5px;
        }

        .products {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        a .product{
            margin: 10px 10px 20px 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            width: 200px;
            height: 17rem;
        }

        .product img {
            width: 200px;
            height: 200px;
            margin-top: -25px;
            object-fit: contain;
        }

        .product h3{
            color: #000;
            font-size: 16px;
        }

        .product .price {
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -15px 0 0 0;
            font-size: 18px;
            color: #333;
        }

    </style>
</head>
<body>
    <header>
        <h1>Sampath Food City (PVT) Ltd</h1>
        <nav>
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="banner">
        <h2>Welcome to Our Food City!</h2>
        <p>Explore our collection of products.</p>
        <a href="shop.php" class="btn">Shop Now</a>
    </section>

    <section class="products">
        <?php
            @include 'config.php';

            if($conn->connect_error){
                die("Connection failed: ". $conn->connect_error);
            }
            $sql = "SELECT * FROM product LIMIT 4";
            $result = $conn->query($sql);
            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
        ?>

        <a href="product.php?proID=<?= $row["ProductID"] ?>">
            <div class="product">
                <img src="/Sampath Food City/Pic/<?= $row['Image'] ?>" alt="<?= $row["ProductName"] ?>">
                <h3><?= $row["ProductName"] ?></h3>
                <p class="price">Rs. <?= $row["Unit_Price"] ?>.00</p>
            </div>
        </a>

        <?php
                }
            }
        ?>
        
        <!-- Add more product divs as needed -->
    </section>

    <footer>
        <p>&copy; 2024 Sampath Food City (PVT) Ltd. All Rights Reserved.</p>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>