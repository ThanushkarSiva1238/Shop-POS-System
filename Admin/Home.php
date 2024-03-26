<?php

@include 'config.php';

session_start();

if(isset($_SESSION_1['StaffID'])){
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/bxs-dashboard.svg">
    <title>DashBoard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lalezar&family=Marcellus&family=Noto+Sans:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        *{
            margin: 0;
            padding: 0;
            outline: none;
            appearance: none;
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
        }

        /*---------------MAIN---------------*/
        main{
            position: absolute;
            display: flex;
            height: 100%;
            width: 100%;
            padding: .8rem 1rem;
            font-family: 'Poppins', sans-serif;
            gap: 1.4rem;
        }
        main .main{
            width: 70%;
        }
        .main .h1{
            color: #f4f4f4;
            font-size: 2rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            text-align: center;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        main .text{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            font-weight: 500;
            color: #16151f;
        }

        .main .insight{
            font-family: 'Poppins', sans-serif;
            padding: 1rem;
            border-radius: 1.5rem;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            display: flex;
            align-items: center;
            column-gap: 2rem;
            margin-bottom: 1rem;        
        }
        .insight .profile_details{
            width: 65%;
            display: flex;
            flex-direction: column;
            row-gap: 1rem;
        }
        .profile_details .profile{
            display: flex;
            align-items: center;
            position: relative;
        }
        .profile #i{
            height: 45px;
            width: 45px;
            font-size: 45px;
            font-weight: 400;
            color: #16151f;
        }
        .profile .name_mail{
            margin-left: 10px;
        }
        .name_mail .name{
            color: #16151f;
            font-size: 20px;
            font-weight: 600;
        }
        .name_mail .mail{
            margin-top: -2px;
            font-size: 14px;
        }
        .profile .out{
            position: absolute;
            right: 0;
            display: flex;
            gap: 1rem;
        }

        .out #a{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #16151f;
            color: #f4f4f4;
            padding: .3rem;
            padding-left: .2rem;
            column-gap: .5rem;
            border-radius: 5px;
        }
        #a #log-out{
            font-size: 2rem;
            width: 30px;
            text-align: center;
        }
        #a .name{
            display: none;
            padding-right: .3rem;
            font-weight: 600;
        }
        .out #a:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }
        .out #a:hover .name{
            display: block;
        }
        .profile_details .details{
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1.2rem;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding-bottom: .5rem;
        }
        .details a{
            background: #ccc;
            border-radius: 10px;
            padding: 8px 0 0 0;
            cursor: pointer;
            border: 2px solid #ccc;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
            color: #16151f;
        }
        .details a .fieldname{
            font-weight: 500;
            font-size: 14px;
        }
        .details a .number{
            font-weight: 500;
            font-size: 2.3rem;
            margin: -5px;
            font-family: 'Lalezar', cursive;
        }
        .details a:hover{
            box-shadow: none;
            border: 2px solid #4b4b4b;
        }

        .insight #pay{
            display: flex;
            justify-content: center;
            flex-direction: column;
            background: #16151f;
            width: 35%;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 3px 3px 6px 0 #444,
                        -3px -3px 6px 0 #444;
            height: 10rem;
            color: #f4f4f4;
        }
        .insight #pay:hover{
            box-shadow: none;
        }
        #pay .payment{
            display: flex;
            align-items: left;
            column-gap: .6rem;
        }
        .payment #icon{
            font-size: 3.5rem;
        }
        .payment .middle{
            display: flex;
            flex-direction: column;
        }
        .middle #h4{
            font-size: 1.5rem;
            font-weight: 600;
        }
        .middle #h5{
            font-size: 15px;
            margin-top: -2px;
        }
        #pay .box{
            margin-top: 2.2rem;
            display: flex;
        }
        .box #note{
            font-weight: 600;
        }
        .box #paid{
            width: 11em;
            text-align: right;
        }

        main .recent{
            margin-top: 1rem;
            display: flex;
            height: 25.4rem;
            column-gap: 1.5rem;
        }
        .recent .product{
            width: 67%;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            color: #16151f;
        }
        .product h2{
            font-family: 'Lalezar', cursive;
            font-size: 2rem;
        }
        .product .table{
            width: 100%;
            padding: .2rem;
        }
        .product .table .thead{
            display: flex;
            text-align: left;
            font-size: 15px;
            font-weight: 700;
            height: 2.3rem;
            border-bottom: 3px solid #16151f;
        }
        .product .table .tbody{
            height: 240px;
            width: 100%;
            overflow: hidden;
            overflow-y: auto;
        }
        .tbody .tr{
            display: flex;
            align-items: center;
            width: 100%;
            height: 2.5rem;
            border-bottom: 1px solid #16151f;
            color: #16151f;
        }
        .td .progress-bar{
            position: relative;
            width: 210px;
            height: 20px;
            border-radius: 5px;
            background-color: #999;
            box-shadow: 0 1px 4px #444444,  0 -1px 4px #444444;
        }
        .td .progress-bar span{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #f4f4f4;
            font-size: 14px;
            line-height: 1.7;
            text-align: center;
            border-radius: 5px;
            background: #16151f;
            transition: width .5s linear;
        }
        #c1{
            width: 6em;
        }
        #c2{
            width: 16em;
            margin-right: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        #c3{
            width: 15em;
        }

        .recent .customer{
            width: 33%;
            border-radius: 10px;
            padding: 1rem .5rem;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            color: #16151f;
        }
        .customer h2{
            font-family: 'Lalezar', cursive;
            font-size: 1.9rem;
            text-align: center;
            border-bottom: 3px solid #16151f;
        }
        .tabs{
            height: 265px;
            overflow: hidden;
            overflow-y: auto;
        }
        .tabs .line{
            display: flex;
            align-items: center;
            column-gap: .4rem;
            padding: .3rem;
            border-bottom: 1px solid #16151f;
        }
        .line #cus{
            font-size: 3rem;
        }
        .line .cusname{
            font-size: 17px;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .row .total{
            font-family: 'poppins';
            font-size: 14px;
        }


        .right{
            margin: auto;
            height: 100%;
            width: 30%;
            display: flex;
            flex-direction: column;
            row-gap: 1rem;
        }
        .datetime{
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: .4rem;
            margin-top: 0.3rem;
            width: 100%;
            padding: 0.4rem 0.7rem;
            font-size: 16px;
            font-weight: 600;
            border: 3px solid #16151f;
        }
        .datetime .time{
            padding-left: 1rem;
        }
        .right .website{
            display: flex;
            align-items: center;
            justify-content: center;
            column-gap: .7rem;
            width: 100%;
            background: #16151f;
            padding: .5rem;
            color: #f4f4f4;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 5px;
            box-shadow: 0 .3rem .8rem #4b4b4b, 0 -.3rem .8rem #4b4b4b;
        }
        .website #icon{
            font-size: 2.5rem;
        }
        .right .website:hover{
            box-shadow: none;
        }

        .right .chart{
            padding: 5px;
            border-radius: .4rem;
            border: 3px solid #16151f;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #16151f;
        }
        .chart h2{
            font-family: 'Lalezar', cursive;
            font-size: 2rem;
        }
        canvas{
            color: #16151f;
        }

        .right .order{
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
            padding: .5rem;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            color: #16151f;
            height: 260px;
        }
        .order h2{
            font-family: 'Lalezar', cursive;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .orders{
            width: 100%;
            height: 170px;
            padding: 0 .5rem;
        }
        .orders .hd{
            display: flex;
            align-items: center;
            font-weight: 700;
            height: 2rem;
            border-bottom: 3px solid #16151f;
        }
        .hd .orderid{
            width: 13.3em;
        }
        .hd .amount{
            width: 6.4em;
        }
        .lines{
            overflow: hidden;
            overflow-y: auto;
            height: 140px;
        }
        .lines .row{
            display: flex;
            align-items: center;
            height: 2.3rem;
            border-bottom: 1px solid #16151f;
            color: #16151f;
        }
        .orderid{
            width: 14.5em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .amount{
            width: 7em;
        }
        .row .status{
            width: 6em;
            border: 2px solid var(--var);
            padding: 0 5px;
            border-radius: 5px;
            text-align: center;
            color: var(--var);
            font-weight: 600;
            font-size: 13px;
        }

        .order .view{
            padding-top: .5rem;
            text-decoration: underline;
            color: #444;
        }
        .view:hover{
            color: #16151f;
            font-weight: 600;
        }

    </style>
</head>
<body onload="initClock()">
    <main>
        <div class="main">
            <div class="h1">Sampath Food City (PVT) Ltd</div>
            <div class="text">Administrator Dashboard</div>

            <div class="insight">
                <div class="profile_details">
                    <div class="profile">
                        <i class='bx bx-user-circle bx-tada bx-flip-horizontal' id="i"></i>
                        <div class="name_mail">
                            <?php
                                @include 'config.php';

                                if($conn->connect_error){
                                    die("Connection failed: ". $conn->connect_error);
                                }
                                else{
                                    $id = $_SESSION['StaffID'];
                                    $sql = "SELECT * FROM staff WHERE staffID = '$id' ";
                                    $result = $conn->query($sql);
                                    if($result-> num_rows > 0){
                                        while($row = $result-> fetch_assoc()){
                        
                            ?>
                            <a href="StaffProfile.php?StaffID=<?= $id?>&profile=Admin" class="name"><abbr title="Admin Profile"><?= $row['StaffName']?></abbr></a>
                            <div class="mail"><?= $row['Email']?></div>
                            <?php
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <div class="out">
                            <a href="index.php" id="a"><i class='bx bx-log-out' id="log-out"></i><span class="name">Log out</span></a>
                        </div>
                    </div>
                    <div class="details">
                        <a href="Category.php">
                            <?php
                                @include 'config.php';

                                $sql = "SELECT * FROM Category";
                                $count_run = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($count_run);
                            ?>
                            <div class="option">
                                <div class="fieldname">Categories</div>
                                <div class="number"><?= $row?></div>
                            </div>
                        </a>
                        <a href="Products.php?profile=Admin">
                            <?php
                                @include 'config.php';

                                $sql = "SELECT * FROM product";
                                $count_run = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($count_run);
                            ?>
                            <div class="option">
                                <div class="fieldname">Products</div>
                                <div class="number"><?= $row ?></div>
                            </div>
                        </a>
                        <a href="Employees.php">
                            <?php
                                @include 'config.php';

                                $sql = "SELECT * FROM staff WHERE NOT StaffID LIKE 'AD%'";
                                $count_run = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($count_run);
                            ?>
                            <div class="option">
                                <div class="fieldname">Employees</div>
                                <div class="number"><?= $row ?></div>
                            </div>
                        </a>
                        <a href="Supplier.php">
                            <?php
                                @include 'config.php';

                                $sql = "SELECT * FROM Supplier";
                                $count_run = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($count_run);
                            ?>
                            <div class="option">
                                <div class="fieldname">Suppliers</div>
                                <div class="number"><?= $row ?></div>
                            </div>
                        </a>
                        <a href="Customer.php?profile=Admin">
                            <?php
                                @include 'config.php';

                                $sql = "SELECT * FROM Customer";
                                $count_run = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($count_run);
                            ?>
                            <div class="option">
                                <div class="fieldname">Customers</div>
                                <div class="number"><?= $row ?></div>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="Payment.php" id="pay">
                    <div class="payment">
                        <?php
                            @include 'config.php';

                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }
                            $sql = "SELECT SUM(Total_Amount) as 'Total' FROM Payment";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        ?>
                        <span class="material-icons-round" id="icon">savings</span>
                        <div class="middle">
                            <span id="h4">Rs. <?= $row['Total'] ?>.00</span>
                            <span id="h5">Total Revenue</span>                
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="box">
                        <span id="note">Recently Paid</span>
                        <?php 
                            @include 'config.php';

                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }
                            $sql1 = "SELECT Total_Amount FROM Payment ORDER BY PaymentID DESC LIMIT 1";
                            $result1 = $conn->query($sql1);
                            if($result1-> num_rows > 0){
                                while($row = $result1-> fetch_assoc()){

                        ?>
                        <span id="paid">Rs. <?= $row['Total_Amount'] ?>.00</span>
                        <?php
                                    }
                                }
                        ?>
                    </div>
                </a>
            </div>

            <div class="recent">
                <div class="product">
                    <h2>Most Sale Products</h2>
                    <div class="table">
                        <div class="thead">
                            <span class="th" id="c1">Product ID</span>
                            <span class="th" id="c2">Product Name</span>
                            <span class="th" id="c3">Quantity</span>
                        </div>
                        <div class="tbody">
                            <?php
                                @include 'config.php';

                                if($conn->connect_error){
                                    die("Connection failed: ". $conn->connect_error);
                                }
                                $sql = "SELECT SUM(Order_Quantity) as 'GrandTotal' FROM order_product";
                                $result = $conn->query($sql);
                                if($result-> num_rows > 0){
                                    while($row = $result-> fetch_assoc()){
                                        $sql1 = "SELECT p.ProductID, p.ProductName, SUM(Order_Quantity) as 'Total' FROM Product p, order_product op WHERE p.ProductID = op.ProductID GROUP BY op.ProductID ORDER BY Total DESC LIMIT 15";
                                        $result1 = $conn->query($sql1);
                                        if($result1-> num_rows > 0){
                                            while($row1 = $result1-> fetch_assoc()){
                                                $tot = ($row1['Total']/$row['GrandTotal'])*100;

                            ?>
                            <div class="tr">
                                <span class="td" id="c1"><?= $row1['ProductID']?></span>
                                <span class="td" id="c2"><?= $row1['ProductName']?></span>
                                <span class="td" id="c3">
                                    <div class="progress-bar">
                                        <span class="bar" data-width="<?= $tot?>%"><?= $row1['Total']?></span>
                                    </div>
                                </span>
                            </div>
                            <?php
                                            }
                                        }
                                    }
                                }else{
                                    echo '<div class="tr"></div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="customer">
                    <h2>Highly paid Customer</h2>
                    <div class="tabs">
                        <?php
                            @include 'config.php';
                            
                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }
                            $sql = "SELECT CusName, SUM(Total_Amount) AS 'sum' FROM customer c, ordertb o, payment p WHERE c.CustomerID=o.CusID AND o.OrderID = p.OrderID GROUP BY CusName HAVING SUM(Total_Amount)>10000 ORDER BY SUM(Total_Amount) DESC";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        ?>
                        <div class="line">
                            <i class='bx bx-user' id="cus"></i>
                            <span class="row">
                                <div class="cusname"><?= $row['CusName']?></div>
                                <div class="total">Rs. <?= $row['sum']?>.00</div>
                            </span>
                        </div>
                        <?php
                                }
                            }else{
                                echo '<div class="line"></div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="datetime">
                <div class="date">
                    <span id="dayname">day</span>,
                    <span id="month">month</span>
                    <span id="dayno">00</span>,
                    <span id="year">year</span>
                </div>
                <div class="time">
                    <span id="hour">00</span> :
                    <span id="min">00</span> :
                    <span id="sec">00</span>
                    <span id="period">AM</span>
                </div>
            </div>
            <a href="/Sampath Food City/Customer/index.php" target="_blank" class="website">
                <span class="material-icons-round" id="icon">web</span>Linked Ecommerce-Website
            </a>
            <div class="chart">
                <?php
                    @include 'config.php';

                    if($conn->connect_error){
                        die("Connection failed: ". $conn->connect_error);
                    }
                    $sql = "SELECT Month(Payment_Timestamp) as 'Month', SUM(Total_Amount) as 'Total' FROM payment GROUP BY Month(Payment_Timestamp) ORDER BY Year(Payment_Timestamp), Month(Payment_Timestamp) DESC LIMIT 6";
                    $result = $conn->query($sql);
                    if($result-> num_rows > 0){
                        $data = array();
                        $value = array();
                        while($row = $result-> fetch_assoc()){
                            $data[] = $row['Month'];
                            $value[] = $row['Total'];
                        }
                        function numericToMonthName($data) {
                            $months = array(
                                1 => 'Jan',
                                2 => 'Feb',
                                3 => 'Mar',
                                4 => 'Apr',
                                5 => 'May',
                                6 => 'Jun',
                                7 => 'Jul',
                                8 => 'Aug',
                                9 => 'Sep',
                                10 => 'Oct',
                                11 => 'Nov',
                                12 => 'Dec'
                            );
                
                            return isset($months[$data]) ? $months[$data] : 'Unknown';
                        }
                        $monthNames = array_map('numericToMonthName', $data);
                    }
                
                ?>
                <h2>Last 6 month Earnings</h2>
                <canvas id="myChart"></canvas>
            </div>
            <div class="order">
                <h2>Customer Orders</h2>
                <div class="orders">
                    <div class="hd">
                        <div class="orderid">OrderID</div>
                        <div class="amount">Payment</div>
                        <div class="status">Status</div>
                    </div>
                    
                    <div class="lines">
                        <?php
                            @include 'config.php';

                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }
                            $sql = "SELECT ob.OrderID, p.Total_Amount, o.STATUS FROM ordertb o, order_product ob, payment p WHERE o.OrderID = ob.OrderID AND o.OrderID = p.OrderID GROUP BY OrderID DESC";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        ?>
                        <a href="Order-details.php?order=<?= $row['OrderID'] ?>" class="row">
                                <div class="orderid"><?= $row['OrderID']?></div>
                                <div class="amount">Rs. <?= $row['Total_Amount']?>.00</div>
                                <?php
                                    if ($row['STATUS'] == "Deliver") {
                                        echo '<div class="status" style = "--var : Green;">'.$row['STATUS'].'</div>';
                                    }
                                    if ($row['STATUS'] == "Pending") {
                                        echo '<div class="status" style = "--var : #DCCF02;">'.$row['STATUS'].'</div>';
                                    }
                                    if ($row['STATUS'] == "Return") {
                                        echo '<div class="status" style = "--var : Red;">'.$row['STATUS'].'</div>';
                                    }
                                ?>
                        </a>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <a href="Order.php" class="view">See all</a>
            </div>
        </div>
    </main>
<!------------------------JavaScripts------------------------>
    <script type="text/javascript">
        function updateClock(){
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

                if(hou == 0){
                    hou = 12;
                }
                if(hou > 12){
                    hou= hou - 12;
                    pe = "PM";
                }

                Number.prototype.pad = function(digits){
                    for(var n = this.toString(); n.length < digits; n = 0 + n);
                    return n;
                }

                var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var ids = ["dayname", "month", "dayno", "year", "hour", "min", "sec", "period"];
                var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
                for(var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock(){
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>
    <script type="text/javascript">
        const spans = document.querySelectorAll('.progress-bar span');

        spans.forEach((span) => {
            span.style.width = span.dataset.width;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        var data = <?php echo json_encode($monthNames);?>;
        var value = <?php echo json_encode($value);?>;

        var ctx = document.getElementById('myChart');
        
        new Chart(ctx, {
            type: 'line',
            data: {
            labels: data,
            datasets: [{
                label: '# of Monthly Revenue',
                data: value,
                borderWidth: 1
            }]
            },
            options: {
                responsive: true,
                backgroundColor: '#16151f',
                borderColor: '#16151f',
                pointBorderWidth: 2,
                pointBackgroundColor: '#f4f4f4',
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>