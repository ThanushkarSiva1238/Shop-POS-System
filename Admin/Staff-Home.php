<?php
    @include 'config.php';

    session_start();

    if(isset($_SESSION_1['StaffID'])){
        header('location:index.php');
    }
?>

<?php
    @include 'config.php';

    if (isset($_POST['deliver'])) {
        $staff = $_POST['id'];
        $order = $_POST['status'];

        $update = "UPDATE ordertb SET STATUS = 'Deliver', Deliver_Timestamp = NOW(), StaffID = '$staff' WHERE OrderID = '$order'";
        mysqli_query($conn, $update);
    }

    if (isset($_POST['return'])) {
        $staff = $_POST['id'];
        $order = $_POST['status'];

        $update = "UPDATE ordertb SET STATUS = 'Return', Deliver_Timestamp = NOW(), StaffID = '$staff' WHERE OrderID = '$order'";
        mysqli_query($conn, $update);
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
            width: 10px;
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
            flex-direction: column;
            height: 100%;
            width: 100%;
            padding: .8rem 1rem;
            font-family: 'Poppins', sans-serif;
            gap: .5rem;
        }
        main .main{
            display: flex;
            gap: 2rem;
        }
        .main .head{
            width: 70%;
        }
        .head .h1{
            color: #f4f4f4;
            font-size: 2rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            text-align: center;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .head .text{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            font-weight: 500;
            color: #16151f;
        }

        .head .insight{
            font-family: 'Poppins', sans-serif;
            padding: 1rem;
            border-radius: 1.5rem;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            display: flex;
            align-items: center;
            column-gap: 2rem;
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
            grid-template-columns: repeat(3, 1fr);
            gap: 1.2rem;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding-bottom: .5rem;
        }
        .details a, .a{
            display: flex;
            flex-direction: column;
            padding: 10px;
            height: 6em;
            background: #ccc;
            border-radius: 10px;
            cursor: pointer;
            border: 2px solid #ccc;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
            color: #16151f;
        }
        .details a .fieldname, .a .fieldname{
            font-weight: 500;
            font-size: 16px;
        }
        .details a .number, .a .number{
            font-weight: 500;
            font-size: 2.3rem;
            margin: -5px;
            font-family: 'Lalezar', cursive;
        }
        .details a:hover, .a:hover{
            box-shadow: none;
            border: 2px solid #4b4b4b;
        }

        .insight #pay{
            display: flex;
            align-items: center;
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
            align-items: center;
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
            position: relative;
            width: 100%;
        }
        .box #note{
            font-weight: 600;
            width: fit-content;
            text-align: left;
        }
        .box #paid{
            position: absolute;
            right: 0;
        }

        .right{
            margin: auto;
            height: 100%;
            width: 30%;
            display: flex;
            flex-direction: column;
            row-gap: 1rem;
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
            height: 100%;
        }
        .order h2{
            font-family: 'Lalezar', cursive;
            font-weight: 500;
            color: #16151f;
            font-size: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }
        .tabs{
            width: 100%;
            overflow: hidden;
            overflow-y: auto;
            height: 15em;
        }
        .tabs .line{
            display: flex;
            align-items: center;
            width: 100%;
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
        }
        .row .total{
            font-family: 'poppins';
            font-size: 14px;
        }


        main .recent{
            margin-top: 1rem;
            height: 25rem;
            width: 100%;
        }
        .recent .pending{
            display: flex;
            align-items: center;
            position: relative;
            height: 2.5rem;
            font-family: 'poppins', sans-serif;
        }
        .pending h2{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            font-weight: 400;
            color: #16151f;
        }
        .pending .search{
            position: absolute;
            right: 0;
            display: flex;
            align-items: center;
            gap: 7px;
        }
        .search button{
            padding: 3px 4px 1px 4px;
            border-radius: 5px;
            background-color: #16151f;
            color: #f4f4f4;
        }
        .search button #order{
            font-size: 18px;
        }
        .search button:hover{
            background-color: #F4F4F4;
            color: #16151f;
        }

        .table{
            position: relative;
            height: 47vh;
            overflow-y: auto;
        }
        .table .table1{
            width: 100%;
        }
        .table1 thead tr th{
            padding: .3rem;
            font-size: 15px;
            background-color: #f4f4f4;
            position: sticky;
            top: 0;
        }
        .table1 thead tr .ac{
            width: 12em;
        }
        .table1 thead tr .action{
            width: 6em;
        }
        .table1 tbody tr td{
            text-align: center;
            border-bottom: 1px solid #4b4b4b;
            height: 2.5rem;
        }
        .table1 tbody tr .ac form button{
            padding: 4px 12px;
            margin: 0 5px;
            gap: 1rem;
            background: none;
            border: 2px solid var(--i);
            color: var(--i);
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
        }
        .table1 tbody tr .ac form button:hover{
            background-color: var(--i);
            color: #f4f4f4;
        }
        .table1 tbody tr .action a{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            margin: 0 5px 1px 5px;
            padding: 2px 5px;
            background: #16151f;
            color: #f4f4f4;
            border-radius: 5px;
            font-weight: 600;
        }
        .action a #view{
            font-size: 16px;
        }
        .table1 tbody tr .action a:hover{
            background: #f4f4f4;
            color: #16151f;
        }
        .table1 tr:last-child td{
            border: none;
        }

    </style>
</head>
<body>
    <main>
        <div class="main">
            <div class="head">
                <div class="h1">Sampath Food City (PVT) Ltd</div>
                <div class="text">Employee Dashboard</div>

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
                                <a href="StaffProfile.php?StaffID=<?= $id?>&profile=Staff" class="name"><abbr title="Admin Profile"><?= $row['StaffName']?></abbr></a>
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
                            <div class="a">
                                <div class="option">
                                    <?php
                                        @include 'config.php';

                                        $sql = "SELECT * FROM Category";
                                        $count_run = mysqli_query($conn, $sql);
                                        $row = mysqli_num_rows($count_run);
                                    ?>
                                    <div class="fieldname">Categories</div>
                                    <div class="number"><?= $row?></div>
                                </div>
                            </div>
                            <a href="Products.php?profile=Staff">
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
                            <a href="Customer.php?profile=Staff">
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
                    <div id="pay">
                        <div class="payment">
                            <span class="material-icons-round" id="icon">emoji_events</span>
                            <div class="middle">
                                <?php
                                    @include 'config.php';

                                    $select = "SELECT SUM(Total_Amount) as 'Total' FROM ordertb o, payment p WHERE o.OrderID = p.OrderID AND o.StaffID = '$id' AND o.STATUS = 'Deliver'";
                                    $res = $conn->query($select);
                                    if ($res->num_rows > 0) {
                                        $row = $res->fetch_assoc();
                                        $pay = $row['Total'];
                                        if ($pay != 0) {
                                ?>
                                <span id="h4">Rs. <?php echo $pay;?>.00</span>
                                <?php
                                        }
                                    }
                                ?>        
                                <span id="h5">Total Delivered Amount</span>        
                            </div>
                        </div>
                        <div class="box">
                            <span id="note">Recent Order</span>
                            <?php
                                @include 'config.php';

                                $select = "SELECT p.Total_Amount FROM ordertb o, payment p WHERE o.OrderID = p.OrderID AND o.StaffID = '$id' AND o.STATUS = 'Deliver' ORDER BY p.Payment_Timestamp DESC LIMIT 1";
                                $res = $conn->query($select);
                                if ($res->num_rows > 0) {
                                    $row = $res->fetch_assoc();
                                    $pay = $row['Total_Amount'];
                                    if ($pay != 0) {
                            ?>
                            <span id="paid">Rs. <?php echo $pay;?>.00</span>
                            <?php
                                    }
                                }
                            ?> 
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="right">
                <div class="order">
                    <h2>Delivered Orders</h2>
                    <div class="tabs">
                        <?php
                            @include 'config.php';
                            
                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }
                            $sql = "SELECT * FROM ordertb WHERE StaffID = '$id' AND STATUS = 'Deliver' ORDER BY Deliver_Timestamp DESC";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        ?>
                        <div class="line">
                            <span class="material-icons-round" id="cus">inventory</span>
                            <span class="row">
                                <div class="cusname">OrderID : <?= $row['OrderID'] ?></div>
                                <div class="total">Delivered Date : <?= $row['Deliver_Timestamp'] ?></div>
                            </span>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="recent">
            <div class="ord">
                <div class="pending">
                    <h2>Pending Order</h2>
                    <form action="" method="post" class="search">
                        <button type="submit" name="asc">
                            <span class="material-icons-round" id="order">arrow_upward</span>
                        </button>
                        <button type="submit" name="desc">
                            <span class="material-icons-round" id="order">arrow_downward</span>
                        </button>
                    </form>
                </div>
                <div class="table">
                    <table class="table1">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Timestamp</th>
                                <th>Customer Name</th>
                                <th>Telephone No</th>
                                <th class="ac">Order Status</th>
                                <th class="action">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                @include 'config.php';

                                $sql = "SELECT * FROM ordertb o, customer c, payment p WHERE (o.CusID = c.CustomerID AND o.OrderID = p.OrderID) AND o.STATUS = 'Pending'";
                                $result = $conn->query($sql);

                                if(isset($_POST['asc'])){
                                    $sql1 = "SELECT * FROM ordertb o, customer c, payment p WHERE (o.CusID = c.CustomerID AND o.OrderID = p.OrderID) AND o.STATUS = 'Pending' ORDER BY Order_Timestamp ASC";
                                    $result1 = $conn->query($sql1);

                                    if($result1-> num_rows > 0){
                                        while($row = $result1-> fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row['OrderID'] ?></td>
                                <td><?= $row['Order_Timestamp'] ?></td>
                                <td><?= $row['CusName'] ?></td>
                                <td><a href="tel:<?= $row['ContactNo'] ?>"><?= $row['ContactNo'] ?></a></td>
                                <td class="ac">
                                    <form action="" method="post" id="default">
                                        <input type="text" name="id" value="<?= $id ?>" style="display: none;">
                                        <input type="text" name="status" value="<?= $row['OrderID'] ?>" style="display: none;">
                                        <button type="submit" class="btn" name="deliver" style="--i: green;">
                                            <span class="name" id="tag">Deliver</span>
                                        </button>
                                        <button type="submit" class="btn" name="return" style="--i: red;">
                                            <span class="name" id="tag">Return</span>
                                        </button>
                                    </form>
                                </td>
                                <td class = "action">
                                    <a href="Order-details.php?order=<?= $row['OrderID'] ?>">
                                        <span class="material-icons-round" id="view">view_comfy</span>
                                        <div class="name">View</div>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                                }
                                else{
                                    if(isset($_POST['desc'])){
                                        $sql2 = "SELECT * FROM ordertb o, customer c, payment p WHERE (o.CusID = c.CustomerID AND o.OrderID = p.OrderID) AND o.STATUS = 'Pending' ORDER BY Order_Timestamp DESC";
                                        $result2 = $conn->query($sql2);

                                        if($result2-> num_rows > 0){
                                            while($row = $result2-> fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row['OrderID'] ?></td>
                                <td><?= $row['Order_Timestamp'] ?></td>
                                <td><?= $row['CusName'] ?></td>
                                <td><a href="tel:<?= $row['ContactNo'] ?>"><?= $row['ContactNo'] ?></a></td>
                                <td class="ac">
                                    <form action="" method="post" id="default">
                                        <input type="text" name="id" value="<?= $id ?>" style="display: none;">
                                        <input type="text" name="status" value="<?= $row['OrderID'] ?>" style="display: none;">
                                        <button type="submit" class="btn" name="deliver" style="--i: green;">
                                            <span class="name" id="tag">Deliver</span>
                                        </button>
                                        <button type="submit" class="btn" name="return" style="--i: red;">
                                            <span class="name" id="tag">Return</span>
                                        </button>
                                    </form>
                                </td>
                                <td class = "action">
                                    <a href="Order-details.php?order=<?= $row['OrderID'] ?>">
                                        <span class="material-icons-round" id="view">view_comfy</span>
                                        <div class="name">View</div>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                            }
                                        }
                                    }
                                
                                else{
                                    if($result-> num_rows > 0){
                                        while($row = $result-> fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row['OrderID'] ?></td>
                                <td><?= $row['Order_Timestamp'] ?></td>
                                <td><?= $row['CusName'] ?></td>
                                <td><a href="tel:<?= $row['ContactNo'] ?>"><?= $row['ContactNo'] ?></a></td>
                                <td class="ac">
                                    <form action="" method="post" id="default">
                                        <input type="text" name="id" value="<?= $id ?>" style="display: none;">
                                        <input type="text" name="status" value="<?= $row['OrderID'] ?>" style="display: none;">
                                        <button type="submit" class="btn" name="deliver" style="--i: green;">
                                            <span class="name" id="tag">Deliver</span>
                                        </button>
                                        <button type="submit" class="btn" name="return" style="--i: red;">
                                            <span class="name" id="tag">Return</span>
                                        </button>
                                    </form>
                                </td>
                                <td class = "action">
                                    <a href="Order-details.php?order=<?= $row['OrderID'] ?>">
                                        <span class="material-icons-round" id="view">view_comfy</span>
                                        <div class="name">View</div>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                            }
                                        }
                                    }   
                                }                                    
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>       
</body>
</html>