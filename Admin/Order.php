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
            width: 65%;
        }
        .main .deliver{
            display: flex;
            align-items: center;
            position: relative;
            height: 2.5rem;
            font-family: 'poppins', sans-serif;
        }
        .deliver .search{
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
            height: 73vh;
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
        .table1 thead tr .action{
            width: 6em;
        }
        
        .table1 tbody tr td{
            text-align: center;
            border-bottom: 1px solid #4b4b4b;
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
        .right{
            width: 35%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .right .up{
            height: 15em;
            border: 3px solid #16151f;
            border-radius: 10px;
        }
        .up .head{
            display: flex;
            align-items: center;
            padding: 0 10px;
            height: 2.5rem;
            position: relative;
            border-bottom: 3px solid #4b4b4b;
        }
        .head form{
            position: absolute;
            right: 5px;
            display: flex;
            gap: 7px;
        }
        form button{
            padding: 3px 4px 1px 4px;
            border-radius: 5px;
            background-color: #16151f;
            color: #f4f4f4;
        }
        button #order{
            font-size: 18px;
        }
        .up #up{
            overflow-y: auto;
            height: 11.3rem;
            padding: 0 5px;
            margin-top: 5px;
        }
        #up table{
            width: 100%;
            text-align: center;
        }
        table tr th{
            background: #fff;
            padding: 3px 0;
            position: sticky;
            top: 0;
        }
        table tr td{
            padding: 3px 0;
            border-bottom: 1px solid #4b4b4b;
        }
        
        table tr .action{
            width: 6em;
        }
        table tr .action a{
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
        table tr .action a:hover{
            background: #f4f4f4;
            color: #16151f;
        }
        
        .right .down{
            height: 21em;
            border: 3px solid #16151f;
            border-radius: 10px;
        }
        .down .head{
            display: flex;
            align-items: center;
            padding: 0 10px;
            height: 2.7rem;
            position: relative;
            border-bottom: 3px solid #4b4b4b;
        }
        .head form{
            position: absolute;
            right: 5px;
            display: flex;
            gap: 7px;
        }
        form button{
            padding: 3px 4px 1px 4px;
            border-radius: 5px;
            background-color: #16151f;
            color: #f4f4f4;
        }
        button #order{
            font-size: 18px;
        }
        .down #up{
            overflow-y: auto;
            height: 17rem;
            padding: 0 5px;
            margin-top: 5px;
        }
        #up table{
            width: 100%;
            text-align: center;
        }
        table tr:last-child td{
            border: none;
        }

    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="view">
                <div class="title">
                    <h2>Order Details</h2>
                    <div class="out">
                        <a href="Home.php" class="in">
                            <span class="material-icons-round" id="home">home</span>
                            <span class="name">DashBoard</span>
                        </a>
                    </div>
                </div>
                <div class="details">
                    <div class="main">
                        <div class="deliver">
                            <h2>Delivered Order</h2>
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
                                        <th>Deliver Timestamp</th>
                                        <th class="action">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        @include 'config.php';

                                        $sql = "SELECT * FROM ordertb WHERE STATUS = 'Deliver'";
                                        $result = $conn->query($sql);

                                        if(isset($_POST['asc'])){
                                            $sql1 = "SELECT * FROM ordertb WHERE STATUS = 'Deliver' ORDER BY Deliver_Timestamp ASC";
                                            $result1 = $conn->query($sql1);

                                            if($result1-> num_rows > 0){
                                                while($row = $result1-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Order_Timestamp'] ?></td>
                                        <td><?= $row['Deliver_Timestamp'] ?></td>
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
                                                $sql2 = "SELECT * FROM ordertb WHERE STATUS = 'Deliver' ORDER BY Deliver_Timestamp DESC";
                                                $result2 = $conn->query($sql2);

                                                if($result2-> num_rows > 0){
                                                    while($row = $result2-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Order_Timestamp'] ?></td>
                                        <td><?= $row['Deliver_Timestamp'] ?></td>
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
                                        <td><?= $row['Deliver_Timestamp'] ?></td>
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
                    <div class="right">
                        <div class="up">
                            <div class="head">
                                <h3>Returned Orders</h3>
                                <form action="" method="post">
                                    <button type="submit" name="asc1">
                                        <span class="material-icons-round" id="order">arrow_upward</span>
                                    </button>
                                    <button type="submit" name="desc1">
                                        <span class="material-icons-round" id="order">arrow_downward</span>
                                    </button>
                                </form>  
                            </div>
                            <div id="up">
                                <table>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Return Timestamp</th>
                                        <th class="action">Action</th>
                                    </tr>
                                    <?php
                                        @include 'config.php';

                                        $sql = "SELECT * FROM ordertb WHERE STATUS = 'Return'";
                                        $result = $conn->query($sql);

                                        if(isset($_POST['asc1'])){
                                            $sql1 = "SELECT * FROM ordertb WHERE STATUS = 'Return' ORDER BY Deliver_Timestamp ASC";
                                            $result1 = $conn->query($sql1);

                                            if($result1-> num_rows > 0){
                                                while($row = $result1-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Deliver_Timestamp'] ?></td>
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
                                            if(isset($_POST['desc1'])){
                                                $sql2 = "SELECT * FROM ordertb WHERE STATUS = 'Return' ORDER BY Deliver_Timestamp DESC";
                                                $result2 = $conn->query($sql2);

                                                if($result2-> num_rows > 0){
                                                    while($row = $result2-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Deliver_Timestamp'] ?></td>
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
                                        <td><?= $row['Deliver_Timestamp'] ?></td>
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
                                </table>
                            </div>
                        </div>

                        <div class="down">
                            <div class="head">
                                <h3>Pending Orders</h3>
                                <form action="" method="post">
                                    <button type="submit" name="asc2">
                                        <span class="material-icons-round" id="order">arrow_upward</span>
                                    </button>
                                    <button type="submit" name="desc2">
                                        <span class="material-icons-round" id="order">arrow_downward</span>
                                    </button>
                                </form>  
                            </div>
                            <div id="up">
                                <table>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Timestamp</th>
                                        <th class="action">Action</th>
                                    </tr>
                                    <?php
                                        @include 'config.php';

                                        $sql = "SELECT * FROM ordertb WHERE STATUS = 'Pending'";
                                        $result = $conn->query($sql);

                                        if(isset($_POST['asc2'])){
                                            $sql1 = "SELECT * FROM ordertb WHERE STATUS = 'Pending' ORDER BY Order_Timestamp ASC";
                                            $result1 = $conn->query($sql1);

                                            if($result1-> num_rows > 0){
                                                while($row = $result1-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Order_Timestamp'] ?></td>
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
                                            if(isset($_POST['desc2'])){
                                                $sql2 = "SELECT * FROM ordertb WHERE STATUS = 'Pending' ORDER BY Order_Timestamp DESC";
                                                $result2 = $conn->query($sql2);

                                                if($result2-> num_rows > 0){
                                                    while($row = $result2-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Order_Timestamp'] ?></td>
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </main>
</body>
</html>