<?php
    $OrderID = $_GET['order'];
?>

<?php
    @include 'config.php';

    if(isset($_POST['refund'])){
        $id = $_POST['id'];

        $delete = "DELETE FROM Payment WHERE OrderID = '$id'";
        mysqli_query($conn, $delete);

        $check = "SELECT * FROM order_product WHERE OrderID = '$id'";
        $result = $conn->query($check);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $proID = $row['ProductID'];
                $quan = $row['Order_Quantity'];

                $select = "SELECT * FROM product WHERE ProductID = '$proID'";
                $res1 = $conn->query($select);
                if ($res1->num_rows > 0) {
                    $row1 = $res1->fetch_assoc();
                    $quantity = $row1['Total_Quantity'];

                    $final = $quantity + $quan;
                    $update = "UPDATE product SET Total_Quantity = '$final' WHERE ProductID = '$proID'";
                    mysqli_query($conn, $update);

                    $delete = "DELETE FROM order_product WHERE OrderID='$id' AND ProductID = '$proID'";
                    mysqli_query($conn, $delete);
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/order.svg">
    <title>Customer Orders</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lalezar&family=Marcellus&family=Noto+Sans:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        *{
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
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

        html{
            font-size: 14px;
        }
        body{
            position: relative;
            height: 100vh;
            width: 100%;
            background: #bbb;
            user-select: none;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        /*---------------MAIN---------------*/
        main{
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100%;
            width: 100%;
            padding: .8rem 1rem;
            font-family: 'Poppins', sans-serif;
            gap: 1rem;
        }
        main .h1{
            color: #f4f4f4;
            font-size: 2rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            text-align: center;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }

        main .insight{
            display: flex;
            width: 100%;
            column-gap: 1rem;
            height: 100%;
        }
        .insight .view{
            width: 100%;
            height: 100%;
        }
        .view .title{
            display: flex;
            position: relative;
            padding-bottom: .5rem;
            width: 100%;
        }
        .title h2{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            color: #16151f;
        }
        
        .title .out{
            display: flex;
            align-items: center;
            column-gap: 1rem;
            position: absolute;
            right: 0;
        }
        .out .in{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #16151f;
            color: #f4f4f4;
            padding: .3rem;
            column-gap: .5rem;
            border-radius: 5px;
            margin-bottom: 1px;
        }
        .in #home{
            font-size: 2rem;
            width: 30px;
            text-align: center;
        }
        .in .name{
            display: none;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            padding-right: .3rem;
            font-weight: 600;
        }
        .in:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }
        .in:hover .name{
            display: block;
        }

        .view .details{
            display: flex;
            color: #16151f;
            gap: 1rem;
            width: 100%;
            height: 79vh;
        }
        .details .main{
            font-size: 1rem;
            width: 50%;
        }
        #head{
            font-size: 22px;
        }
        .table{
            width: 95%;
            font-size: 1.1rem;
        }
        .table table{
            margin: 0 2rem;
            width: 95%;
            border-collapse: collapse;
        }
        .table table tr{
            text-align: left;
        }
        table tr th{
            padding: .4rem 0;
            width: 10em;
            border-bottom: 2px solid #16151f;
        }
        table tr td{
            border-bottom: 2px solid #16151f;
            position: relative;
        }
        table tr #space{
            padding: .2rem .5rem;
            text-align: right;
            width: .5rem;
        }
        table tr .btn {
            padding: .4rem 0;
            display: flex;
            align-items: center;
        }
        table tr .btn form{
            display: flex;
            align-items: center;
        }
        table tr .btn button{
            position: absolute;
            right: 0;
            top: 4px;
            font-family: 'poppins', sans-serif;
            padding: 3px 15px;
            border-radius: 5px;
            font-weight: 600;
            background: #16151f;
            color: #f4f4f4;
        }
        table tr .btn button:hover{
            background: #f4f4f4;
            color: #16151f;
        }
        table tr:last-child th{
            border: none;
        }
        table tr:last-child td{
            border: none;
        }
        .order-product{
            margin-top: .5rem;
        }
        .order-product .product{
            position: relative;
            height: 52vh;
            overflow-y: auto;
            margin: 0 1rem;
        }
        .product table{
            width: 100%;
        }
        .product table tr th{
            padding: .3rem;
            z-index: 99;
            position: sticky;
            top: 0;
            background-color: #f4f4f4;
            border: none;
        }
        .product table tr td{
            height: 2.2rem;
            border-bottom: 2px solid #16151f;
            text-align: center;
        }
        .product table tr:last-child td{
            border-bottom: none;

        }
        
        .right{
            width: 50%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="view">
                <div class="title">
                    <h2 id="title"></h2>
                    <div class="out">
                        <button onclick ="history.back()" class="in">
                            <span class="material-icons-round" id="home">first_page</span>
                            <span class="name">Back</span>
                        </button>
                    </div>
                </div>
                <div class="details">
                    <div class="main">
                        <div class="order table">
                            <?php
                                @include 'config.php';

                                $select = "SELECT * FROM ordertb WHERE OrderID = '$OrderID'";
                                $result = $conn->query($select);

                                if($result-> num_rows > 0){
                                    while($row = $result-> fetch_assoc()){

                            ?>
                            <h1 id="head">Order ID : <?= $row['OrderID'] ?></h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order Timestamp</th><td id="space">:</td><td><?= $row['Order_Timestamp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th id="DPR">Deliver Timestamp</th><td id="space">:</td><td id="date"><?= $row['Deliver_Timestamp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th><td id="space">:</td>
                                        <td class="btn"><span id="status"><?= $row['STATUS'] ?></span>
                                            <form action="" method="post" id="form">
                                                <input type="text" name="id" id="id" value="<?= $row['OrderID'] ?>" style="display: none;">
                                                <button type="submit" name="refund" id="refund">Refund</button>
                                            </form>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="order-product">
                            <h1 id="head">Order Products</h1>
                            <div class="product">
                                <table>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    <?php
                                        @include 'config.php';

                                        $select = "SELECT * FROM order_product op, product p WHERE p.ProductID = op.ProductID AND op.OrderID = '$OrderID'";
                                        $result = $conn->query($select);

                                        if($result-> num_rows > 0){
                                            while($row = $result-> fetch_assoc()){

                                    ?>
                                    <tr>
                                        <td><?= $row['ProductName'] ?></td>
                                        <td><?= $row['Unit_Price'] ?></td>
                                        <td><?= $row['Order_Quantity'] ?></td>
                                        <td>Rs. <?= 
                                            $total = $row['Unit_Price'] * $row['Order_Quantity'];
                                        ?>.00</td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="customer table">
                            <?php
                                @include 'config.php';

                                $select = "SELECT * FROM ordertb o, customer c WHERE o.CusID = c.CustomerID AND o.OrderID = '$OrderID'";
                                $result = $conn->query($select);

                                if($result-> num_rows > 0){
                                    while($row = $result-> fetch_assoc()){
                            ?>
                            <h1 id="head">Customer ID : CUS - <?= $row['CustomerID'] ?></h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Customer Name</th><td id="space">:</td><td><?= $row['CusName'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th><td id="space">:</td><td><a href="mailto:<?= $row['Email'] ?>"><?= $row['Email'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <th>Telephone No</th><td id="space">:</td><td><a href="tel:<?= $row['ContactNo'] ?>"><?= $row['ContactNo'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th><td id="space">:</td><td><?= $row['Address'] ?></td>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="payment table">
                            <?php
                                @include 'config.php';

                                $select = "SELECT * FROM ordertb o, payment p WHERE o.OrderID = p.OrderID AND o.OrderID = '$OrderID'";
                                $result = $conn->query($select);

                                if($result-> num_rows > 0){
                                    while($row = $result-> fetch_assoc()){
                            ?>
                            <h1 id="head">Payment ID : <?= $row['PaymentID'] ?></h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Payment Date</th><td id="space">:</td><td><?= $row['Payment_Timestamp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th><td id="space">:</td><td><?= $row['Method'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Paid Amount</th><td id="space">:</td><td>Rs. <?= $row['Total_Amount'] ?>.00</td>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="staff table">
                            <?php
                                @include 'config.php';

                                $select = "SELECT * FROM ordertb o, staff s WHERE o.StaffID = s.StaffID AND o.OrderID = '$OrderID'";
                                $result = $conn->query($select);

                                if($result-> num_rows > 0){
                                    while($row = $result-> fetch_assoc()){
                            ?>
                            <h1 id="head">Employee ID : <?= $row['StaffID'] ?></h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Staff Name</th><td id="space">:</td><td><?= $row['StaffName'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th><td id="space">:</td><td><a href="mailto:"><?= $row['Email'] ?></a></td>
                                    </tr>
                                    <tr>
                                        <th>Telephone No</th><td id="space">:</td><td><a href="tel:"><?= $row['ContactNo'] ?></a></td>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </main>
    <script>
        const title = document.getElementById('title');
        const status = document.getElementById('status');
        const dpr = document.getElementById('DPR');
        const form = document.getElementById('form');
        const date = document.getElementById('date');
        const staff = document.querySelector('.staff');
        if (status.innerText == "Deliver") {
            title.innerText = "Delivered-Order Details";
            dpr.innerText = "Deliver Timestamp";
            form.style.display = "none";
        } else if (status.innerText == "Return") {
            title.innerText = "Returned-Order Details";
            dpr.innerText = "Return Timestamp";
            form.style.display = "block";
        } else if (status.innerText == "Pending") {
            title.innerText = "Pending Order Details";
            date.innerText = "-";
            form.style.display = "none";
            staff.style.display = "none";
        }
    </script>
</body>
</html>