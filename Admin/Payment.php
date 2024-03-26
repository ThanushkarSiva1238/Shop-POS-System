<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/monitoring.svg">
    <title>Earnings</title>
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
        .out .search{
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 5px;
            border-radius: 5px;
            border: 2px solid #16151f;
            padding-left: 5px;
        }
        .search input[type="date"]{
            font-family: 'poppins', sans-serif;
            color: #16151f;
            font-size: 16px;
            font-weight: 600;
            background: none;
            padding: 0 .5rem;
            border: 1px solid #4b4b4b;
            border-radius: 5px;
        }
        .search .ic i{
            font-size: 22px;
            padding: 6px .5rem 2px .2rem;
            color: #2d2b3d;
            font-weight: 600;
        }
        .search .ic i:hover{
            color: #16151f;
            text-shadow: 0 0 20px #4b4b4b;
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
            gap: .5rem;
            width: 100%;
            height: 78vh;
        }
        .table{
            overflow-y: auto;
            font-size: 1rem;
            width: 70%;
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
            width: 10em;
        }
        
        .table1 tbody tr td{
            text-align: center;
            border-bottom: 1px solid #4b4b4b;
        }
        .table1 tbody tr .action{
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 1rem;
            width: 100%;
        }
        .table1 tbody tr .ac{
            width: 11em;
        }
        .action a{
            padding: 5px 5px 0 6px;
            background: #16151f;
            color: #f4f4f4;
            border-radius: 5px;
        }
        .action a:hover{
            background: #f4f4f4;
            color: #16151f;
        }
        .action .for button{
            padding: 5px 5px 3px 6px;
            margin: .3rem auto;
            background: #16151f;
            color: #f4f4f4;
            border-radius: 5px;
        }
        .for button:hover{
            background: #f4f4f4;
            color: #16151f;
        }
        .table1 tr:last-child td{
            border: none;
        }
        .right{
            width: 30%;
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
            height: 11.5rem;
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
            height: 16.5rem;
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
                    <h2>Payment Details</h2>
                    <div class="out">
                        <form action="" method="POST" class="search">
                            <input type="date" name="from">
                            <div class="range">to</div>
                            <input type="date" name="to">

                            <input type="submit" style="display: none;" id="search" name="searching">
                            <label for="search" class="ic"><i class='bx bx-search-alt-2'></i></label>
                        </form>
                        <a href="Home.php" class="in">
                            <span class="material-icons-round" id="home">home</span>
                            <span class="name">DashBoard</span>
                        </a>
                    </div>
                </div>
                <div class="details">
                    <div class="table">
                        <table class="table1">
                            <thead>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>Order ID</th>
                                    <th>Payment Timestamp</th>
                                    <th>Method</th>
                                    <th>Grand Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    @include 'config.php';

                                    $sql9 = "SELECT * FROM payment";
                                    $result9 = $conn->query($sql9);

                                    if (isset($_POST['searching'])) {
                                        $from = $_POST['from'];
                                        $to = $_POST['to'];
                                        $sql8 = "SELECT * FROM payment WHERE DATE(Payment_Timestamp) BETWEEN '$from' AND '$to'";
                                        $result8 = $conn->query($sql8);
                                        if($result8-> num_rows > 0){
                                            while($row1 = $result8-> fetch_assoc()){
                                ?>
                                    <tr>
                                        <td><?= $row1['PaymentID'] ?></td>
                                        <td><?= $row1['OrderID'] ?></td>
                                        <td><?= $row1['Payment_Timestamp'] ?></td>
                                        <td><?= $row1['Method'] ?></td>
                                        <td>Rs. <?= $row1['Total_Amount'] ?>.00</td>
                                    </tr>
                                <?php
                                            }
                                        }else{
                                            echo '<tr><td colspan = "5" id = "no">0 Results</td></tr>';
                                        }

                                    }else{
                                        if($result9-> num_rows > 0){
                                            while($row = $result9-> fetch_assoc()){
                                    
                                ?>
                                    <tr>
                                        <td><?= $row['PaymentID'] ?></td>
                                        <td><?= $row['OrderID'] ?></td>
                                        <td><?= $row['Payment_Timestamp'] ?></td>
                                        <td><?= $row['Method'] ?></td>
                                        <td>Rs. <?= $row['Total_Amount'] ?>.00</td>
                                    </tr>
                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="right">
                        <div class="up">
                            <div class="head">
                                <h3>Yearly Earnings</h3>
                                <form action="" method="post">
                                    <button type="submit" name="asc_1">
                                        <span class="material-icons-round" id="order">arrow_upward</span>
                                    </button>
                                    <button type="submit" name="desc_1">
                                        <span class="material-icons-round" id="order">arrow_downward</span>
                                    </button>
                                </form>  
                            </div>
                            <div id="up">
                                <table>
                                    <tr>
                                        <th>Year</th>
                                        <th>Earning</th>
                                    </tr>
                                    <?php
                                        @include 'config.php';

                                        $sql0 = "SELECT YEAR(Payment_Timestamp) as 'Year', SUM(Total_Amount) as 'Total' FROM payment GROUP BY YEAR(Payment_Timestamp)";
                                        $result0 = $conn->query($sql0);

                                        if(isset($_POST['asc_1'])){
                                            $sql1 = "SELECT YEAR(Payment_Timestamp) as 'Year', SUM(Total_Amount) as 'Total' FROM payment GROUP BY YEAR(Payment_Timestamp) ORDER BY Year ASC";
                                            $result1 = $conn->query($sql1);

                                            if($result1-> num_rows > 0){
                                                while($row = $result1-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['Year'] ?></td>
                                        <td>Rs. <?= $row['Total'] ?>.00</td>
                                    </tr>
                                    <?php
                                                }
                                            }
                                        }
                                        else{
                                            if(isset($_POST['desc_1'])){
                                                $sql2 = "SELECT YEAR(Payment_Timestamp) as 'Year', SUM(Total_Amount) as 'Total' FROM payment GROUP BY YEAR(Payment_Timestamp) ORDER BY Year DESC";
                                                $result2 = $conn->query($sql2);

                                                if($result2-> num_rows > 0){
                                                    while($row = $result2-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['Year'] ?></td>
                                        <td>Rs. <?= $row['Total'] ?>.00</td>
                                    </tr>
                                    <?php
                                                    }
                                                }
                                            }
                                        
                                        else{
                                            if($result0-> num_rows > 0){
                                                while($row = $result0-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['Year'] ?></td>
                                        <td>Rs. <?= $row['Total'] ?>.00</td>
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
                                <h3>Monthly Earnings</h3>
                                <form action="" method="post">
                                    <button type="submit" name="asc_2">
                                        <span class="material-icons-round" id="order">arrow_upward</span>
                                    </button>
                                    <button type="submit" name="desc_2">
                                        <span class="material-icons-round" id="order">arrow_downward</span>
                                    </button>
                                </form>  
                            </div>
                            <div id="up">
                                <table>
                                    <tr>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Earning</th>
                                    </tr>
                                    <?php
                                        @include 'config.php';

                                        $sql3 = "SELECT YEAR(Payment_Timestamp) as 'Year', MONTH(Payment_Timestamp) as 'Month', SUM(Total_Amount) as 'Total' FROM payment GROUP BY MONTH(Payment_Timestamp)";
                                        $result3 = $conn->query($sql3);

                                        if(isset($_POST['asc_2'])){
                                            $sql4 = "SELECT YEAR(Payment_Timestamp) as 'Year', MONTH(Payment_Timestamp) as 'Month', SUM(Total_Amount) as 'Total' FROM payment GROUP BY MONTH(Payment_Timestamp) ORDER BY Year ASC";
                                            $result4 = $conn->query($sql4);

                                            if($result4-> num_rows > 0){
                                                while($row = $result4-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['Year'] ?></td>
                                        <td><?= $row['Month'] ?></td>
                                        <td>Rs. <?= $row['Total'] ?>.00</td>
                                    </tr>
                                    <?php
                                                }
                                            }
                                        }
                                        else{
                                            if(isset($_POST['desc_2'])){
                                                $sql5 = "SELECT YEAR(Payment_Timestamp) as 'Year', MONTH(Payment_Timestamp) as 'Month', SUM(Total_Amount) as 'Total' FROM payment GROUP BY MONTH(Payment_Timestamp) ORDER BY Year DESC";
                                                $result5 = $conn->query($sql5);

                                                if($result5-> num_rows > 0){
                                                    while($row = $result5-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['Year'] ?></td>
                                        <td><?= $row['Month'] ?></td>
                                        <td>Rs. <?= $row['Total'] ?>.00</td>
                                    </tr>
                                    <?php
                                                    }
                                                }
                                            }
                                        
                                        else{
                                            if($result3-> num_rows > 0){
                                                while($row = $result3-> fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $row['Year'] ?></td>
                                        <td><?= $row['Month'] ?></td>
                                        <td>Rs. <?= $row['Total'] ?>.00</td>
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