<?php
    $profile = $_GET['profile'];
?>

<?php
    @include 'config.php';

    session_start();

    if(isset($_SESSION_1['StaffID'])){
        header('location:index.php');
    }
?>

<?php
    @include 'config.php';

    if(isset($_POST['status'])){
        $cus = $_POST['Cus'];
        $active = $_POST['active'];

        $update = "UPDATE customer_login SET Status='$active' WHERE CusID = '$cus'";
        mysqli_query($conn, $update);
    }
?>

<?php
    @include 'config.php';

    if(isset($_POST['del'])){
        $cus = $_POST['id'];

        $delete = "DELETE FROM customer WHERE CustomerID = '$cus'";
        mysqli_query($conn, $delete);
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
    <link rel="icon" type="image/x-icon" href="Svg/person.svg">
    <title>Customers</title>
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
            column-gap: .5rem;
            border-radius: 5px;
            border: 2px solid #16151f;
        }
        .search input[type="text"]{
            font-family: 'poppins', sans-serif;
            color: #16151f;
            font-size: 16px;
            font-weight: 600;
            width: 20em;
            background: none;
            padding: 0 .5rem;
        }
        .search .ic i{
            font-size: 22px;
            padding: 6px .5rem 2px .5rem;
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
            flex-direction: column;
            column-gap: 1rem;
            row-gap: 1rem;
            color: #16151f;
        }
        .details{
            display: flex;
            flex-direction: column;
            width: fit-content;
            row-gap: .5rem;
            padding-bottom: .5rem;
            width: 100%;
            height: 78vh;
            overflow-y: auto;
        }
        .table2{
            font-size: 1rem;
        }
        .table2 thead tr th{
            padding: .3rem;
            font-size: 15px;
            background-color: #f4f4f4;
            position: sticky;
            top: 0;
        }
        .table2 thead tr .action{
            width: 7em;
        }
        
        .table2 tbody tr td{
            text-align: center;
            border-bottom: 1px solid #4b4b4b;
            height: 2.8rem;
        }
        .table2 tbody tr #no{
            color: red;
            padding-top: .5rem;
            text-align: center;
            font-weight: 600;
        }
        .table2 tbody tr .action{
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 1rem;
            width: 100%;
        }
        .table2 tbody tr .ac{
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
        .action form button{
            padding: 5px 5px 3px 6px;
            margin: .3rem auto;
            background: #16151f;
            color: #f4f4f4;
            border-radius: 5px;
        }
        form button:hover{
            background: #f4f4f4;
            color: #16151f;
        }
        .table2 tr:last-child td{
            border: none;
        }
        td #default{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        #default .btn{
            background: none;
            border-radius: 5px;
            color: var(--i);
            border: 2px solid var(--i);
            padding: .2rem .4rem;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
        }
        .btn #active{
            font-size: 20px;
        }
        .btn .name{
            font-weight: 600;
            font-size: 15px;
            padding-right: 2px;
            letter-spacing: .5px;
            font-family: 'poppins', sans-serif;
        }
        #default .btn:hover{
            background: var(--i);
            color: #fff;
        }

    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="view">
                <div class="title">
                    <h2>Active Customer Details</h2>
                    <div class="out">
                        <form action="" method="post" class="search">
                            <input type="text" name="search" placeholder="Search Customer ...">
                            <input type="submit" style="display: none;" id="search" name="searching">
                            <label for="search" class="ic"><i class='bx bx-search-alt-2'></i></label>
                        </form>
                        <?php
                            if($_SESSION['StaffID'] == "AD001"){
                                echo '<a href="Home.php" class="in"><span class="material-icons-round" id="home">home</span><span class="name">DashBoard</span></a>';
                            }
                            else{
                                echo '<a href="Staff-Home.php" class="in"><span class="material-icons-round" id="home">home</span><span class="name">DashBoard</span></a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="details">
                    <table class="table2">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Contact No</th>
                                
                                <?php
                                    if ($profile == "Admin") {
                                ?>
                                    <th class="ac">Active/ Inactive</th>
                                    <th class="action">Actions</th>
                                <?php
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                @include 'config.php';
                                $sql = "SELECT c.*, cl.Status FROM customer c, customer_login cl WHERE c.CustomerID = cl.CusID ORDER BY cl.CusID ASC";
                                $result = $conn->query($sql);

                                if (isset($_POST['searching'])) {
                                    $id = $_POST['search'];
                                    $sql1 = "SELECT c.*, cl.Status FROM customer c, customer_login cl WHERE c.CustomerID = cl.CusID AND (CustomerID ='$id' OR CusName LIKE '$id%' OR CusName LIKE '%$id%' OR ContactNo = '$id') ORDER BY cl.CusID ASC";
                                    $result1 = $conn->query($sql1);
                                    if($result1-> num_rows > 0){
                                        while($row0 = $result1-> fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row0['CustomerID'] ?></td>
                                <td><?= $row0['CusName'] ?></td>
                                <td><?= $row0['Email'] ?></td>
                                <td><?= $row0['ContactNo'] ?></td>
                                <?php
                                    if ($profile == "Admin") {
                                ?>
                                    <td class="ac ad">
                                        <form action="" method="post" id="default">
                                            <?php
                                                if($row0['Status'] == 0){
                                                    echo '<input type="text" name="Cus" value="'. $row0['CustomerID'].'" style="display: none;">';
                                                    echo '<input type="number" name="active" id="invisible" value="1" style="display: none;">';
                                                    echo '<button type="submit" class="btn" name="status" style="--i : green;" onclick="window.alert(\''.$row0['CustomerID'].' : Account Unlocked!\')">';
                                                    echo '<span class="material-icons-round" id="active">lock_open</span>';
                                                    echo '<span class="name" id="tag">Activate</span>';
                                                    echo '</button>';
                                                }
                                                else if($row0['Status'] == 1){
                                                    echo '<input type="text" name="Cus" value="'. $row0['CustomerID'].'" style="display: none;">';
                                                    echo '<input type="number" name="active" id="invisible" value="0" style="display: none;">';
                                                    echo '<button type="submit" class="btn" name="status" style="--i : red;" onclick="window.alert(\''.$row0['CustomerID'].' : Account Locked!\')">';
                                                    echo '<span class="material-icons-round" id="active">lock_outline</span>';
                                                    echo '<span class="name" id="tag">Deactivate</span>';
                                                    echo '</button>';
                                                }
                                            ?>
                                        </form>
                                    </td>
                                    <td class="action td">
                                        <a href="Customer-Profile.php?CusID=<?= $row0['CustomerID'] ?>"><abbr title="View"><span class="material-icons-round">view_comfy</span></abbr></a>
                                        <form action="" method="post">
                                            <input type="number" name="id" id="id" value="<?= $row0['CustomerID'] ?>" style="display: none;">
                                            <button type="submit" name="del" onclick="window.alert('Deleted from Customer List')"><abbr title="Delete"><span class="material-icons-round">delete_forever</span></abbr></button>
                                        </form>
                                    </td>
                                <?php
                                    }
                                ?>
                            </tr>
                            <?php
                                        }
                                    }else{
                                        echo '<tr><td colspan = "6" id = "no">0 Results</td></tr>';
                                    }

                                }else{
                                    if($result-> num_rows > 0){
                                        while($row = $result-> fetch_assoc()){
                                
                            ?>
                            <tr>
                                <td><?= $row['CustomerID'] ?></td>
                                <td><?= $row['CusName'] ?></td>
                                <td><?= $row['Email'] ?></td>
                                <td><?= $row['ContactNo'] ?></td>
                                <?php
                                    if ($profile == "Admin") {
                                ?>
                                    <td class="ac ad">
                                        <form action="" method="post" id="default">
                                            <?php
                                                if($row['Status'] == 0){
                                                    echo '<input type="text" name="Cus" value="'. $row['CustomerID'].'" style="display: none;">';
                                                    echo '<input type="number" name="active" id="invisible" value="1" style="display: none;">';
                                                    echo '<button type="submit" class="btn" name="status" style="--i : green;" onclick="window.alert(\''.$row['CustomerID'].' : Account Unlocked!\')">';
                                                    echo '<span class="material-icons-round" id="active">lock_open</span>';
                                                    echo '<span class="name" id="tag">Activate</span>';
                                                    echo '</button>';
                                                }
                                                else if($row['Status'] == 1){
                                                    echo '<input type="text" name="Cus" value="'. $row['CustomerID'].'" style="display: none;">';
                                                    echo '<input type="number" name="active" id="invisible" value="0" style="display: none;">';
                                                    echo '<button type="submit" class="btn" name="status" style="--i : red;" onclick="window.alert(\''.$row['CustomerID'].' : Account Locked!\')">';
                                                    echo '<span class="material-icons-round" id="active">lock_outline</span>';
                                                    echo '<span class="name" id="tag">Deactivate</span>';
                                                    echo '</button>';
                                                }
                                            ?>
                                        </form>
                                    </td>
                                    <td class="action td">
                                        <a href="Customer-Profile.php?CusID=<?= $row['CustomerID'] ?>"><abbr title="View"><span class="material-icons-round">view_comfy</span></abbr></a>
                                        <form action="" method="post">
                                            <input type="number" name="id" id="id" value="<?= $row['CustomerID'] ?>" style="display: none;">
                                            <button type="submit" name="del" onclick="window.alert('Deleted from Customer List')"><abbr title="Delete"><span class="material-icons-round">delete_forever</span></abbr></button>
                                        </form>
                                    </td>
                                <?php
                                    }
                                ?>
                            </tr>
                            <?php
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