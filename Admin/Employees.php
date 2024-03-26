<?php
    @include 'config.php';

    if(isset($_POST['reg'])){
        $id = $_POST['EmpID'];
        $name = $_POST['EmpName'];
        $add = $_POST['EmpAdd'];
        $dob = $_POST['EmpDOB'];
        $gen = $_POST['gen'];
        $email = $_POST['EmpEmail'];
        $contact = $_POST['EmpContact'];
        $date = $_POST['Appointment'];

        $select = "SELECT * FROM staff WHERE StaffID = '$id'";
        $result = mysqli_query($conn, $select);
        
        if(mysqli_num_rows($result) > 0){
            $error[] = 'Staff ID already exist...';
        }
        else{
            $insert = "INSERT INTO staff VALUES('$id', '$name', '$add', '$gen', '$dob', '$email', '$contact', '$date')";
            mysqli_query($conn, $insert);
        }
    }

?>

<?php
    @include 'config.php';

    if(isset($_POST['status'])){
        $staff = $_POST['Staff'];
        $active = $_POST['active'];

        $update = "UPDATE staff_login SET Status='$active' WHERE StaffID = '$staff'";
        mysqli_query($conn, $update);
    }
?>

<?php
    @include 'config.php';

    if(isset($_POST['del'])){
        $staff = $_POST['id'];

        $delete = "DELETE FROM staff WHERE StaffID = '$staff'";
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
    <link rel="icon" type="image/x-icon" href="Svg/badge.svg">
    <title>Employees</title>
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
            right: 1rem;
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

        .cart .content{
            opacity: 0;
            z-index: 99;
            visibility: hidden;
            position: absolute;
            top: 18.5rem;
            left: -2.5rem;
            transform: translate(-50%, -50%);
            width: 420px;
            height: 450px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background: #16151f;
            padding: .3rem .6rem;
            column-gap: .5rem;
            border-radius: 5px;
        }
        .click-me #i{
            font-size: 2rem;
            width: 30px;
            text-align: center;
            color: #f4f4f4;
        }
        .click-me .name{
            color: #f4f4f4;
            font-weight: 600;
        }

        .click-me:hover{
            background: #ccc;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }
        .click-me:hover #i{
            color: #16151f;
        }
        .click-me:hover .name{
            color: #16151f;
        }

        .content .header{
            height: 68px;
            border-radius: 1rem 1rem 0 0;
            display: flex;
            align-items: center;
        }

        .header h2{
            font-family: 'poppins', sans-serif;
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
        #fa-xmark:hover{
            color: #16151f;
        }

        .content .main{
            color: #16151f;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            height: 362px;
            width: 400px;
            margin: 0 10px;
            overflow: hidden;
        }
        .main .table{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .main form .each{
            display: flex;
        }
        .main .table #l{
            min-width: 145px;
            padding: 5px;
        }
        
        .table .each .input{
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .table input[type="text"], input[type="email"], input[type="date"]{
            font-family: 'poppins', sans-serif;
            padding: 2px 5px;
            width: 19em;
            border-radius: 5px;
            border: 2px solid #16151f;
            background: none;
        }
        .each .error .special{
            display: flex;
            align-items: center;
            font-family: 'poppins', sans-serif;
            padding: 2px 5px;
            width: 18em;
            border-radius: 5px;
            border: 2px solid #16151f;
            position: relative;
        }
        .special #Employee-Id{
            padding: 0;
            border: none;
            width: 17em;
        }
        .special #error{
            position: absolute;
            right: 5px;
            font-size: 22px;
            color: red;
            display: none;
        }
        .error #error-msg{
            color: red;
            font-size: 12px;
        }
        .table .line{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.4rem;
            gap: 1rem;
        }

        .line button{
            font-family: 'poppins', sans-serif;
            font-weight: 600;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
            background-color: #16151f;
            width: 7rem;
            border-radius: 5px;
            color: #f4f4f4;
            padding: .5rem 1rem;
        }
        .line button:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
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
            width: 10em;
        }
        
        .table2 tbody tr td{
            text-align: center;
            border-bottom: 1px solid #4b4b4b;
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
                    <h2>Active Employee Details</h2>
                    <div class="out">
                        <form action="" method="post" class="search">
                            <input type="text" name="search" placeholder="Search Employee ...">
                            <input type="submit" style="display: none;" id="search" name="searching">
                            <label for="search" class="ic"><i class='bx bx-search-alt-2'></i></label>
                        </form>

                        <div class="cart" id="main">
                            <input type="checkbox" id="click" unchecked>
                            <label for="click" class="click-me"><span class="material-symbols-rounded" id="i">person_add</span><span class="name">Add Employee</span></label>
                            <div class="content">
                                <div class="header">
                                    <h2>Add Employee</h2>
                                    <label for="click"><span class="material-symbols-rounded" id="fa-xmark">close</span></label>
                                </div>
                                <div class="main">
                                    <form action="" method="post" class="table">
                                        <div class="each">
                                            <label for="Employee-Id" id="l">Employee ID</label>
                                            <div class="error">
                                                <div class="special">
                                                    <input type="text" name="EmpID" id="Employee-Id" value="ST/" required>
                                                    <i class='bx bx-error-circle bx-tada' id="error"></i>
                                                </div>
                                                <?php
                                                    if(isset($error)){
                                                        foreach($error as $error){
                                                            echo '<p id="error-msg">'.$error.'</p>';
                                                        }
                                                    };
                                                ?>
                                            </div>
                                            
                                        </div>
                                        <div class="each">
                                            <label for="name" id="l">Employee Name</label>
                                            <input type="text" name="EmpName" id="name" required>
                                        </div>
                                        <div class="each">
                                            <label for="add" id="l">Address</label>
                                            <input type="text" name="EmpAdd" id="add" required>
                                        </div>
                                        <div class="each">
                                            <label for="dob" id="l">Date of Birth</label>
                                            <input type="date" name="EmpDOB" id="dob" required>
                                        </div>
                                        <div class="each">
                                            <label for="Gender" id="l">Gender</label>
                                            <span class="input">
                                                <input type="radio" name="gen" id="male" value="Male" checked><label for="male">Male</label>
                                                <input type="radio" name="gen" id="female" value="Female"><label for="female">Female</label>
                                            </span>
                                        </div>
                                        <div class="each">
                                            <label for="Email" id="l">Email Address</label>
                                            <input type="email" name="EmpEmail" id="Email" required>
                                        </div>
                                        <div class="each">
                                            <label for="Contact" id="l">Contact No</label>
                                            <input type="text" name="EmpContact" id="Contact" required>
                                        </div>
                                        <div class="each">
                                            <label for="date" id="l">Appointment</label>
                                            <input type="date" name="Appointment" id="date" required>
                                        </div>
                                        <div class="line">
                                            <button type="reset"><span class="material-symbols-rounded" id="btn">cancel</span>Clear</button>
                                            <button type="submit" name="reg"><span class="material-symbols-rounded" id="btn">person_add</span>Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <a href="Home.php" class="in">
                            <span class="material-icons-round" id="home">home</span>
                            <span class="name">DashBoard</span>
                        </a>
                    </div>
                </div>
                <div class="details">
                    <table class="table2">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Contact No</th>
                                <th>Appointed Date</th>
                                <th>Active/ Inactive</th>
                                <th class="action">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php
                                @include 'config.php';

                                $sql = "SELECT s.*, sl.Status FROM staff s, staff_login sl WHERE s.StaffID = sl.StaffID AND s.StaffId LIKE 'ST%' ORDER BY StaffID ASC";
                                $result = $conn->query($sql);

                                if (isset($_POST['searching'])) {
                                    $id = $_POST['search'];
                                    $sql1 = "SELECT s.*, sl.Status FROM staff s, staff_login sl WHERE s.StaffID = sl.StaffID AND s.StaffId LIKE 'ST%' AND (s.StaffID ='$id' OR s.StaffName LIKE '$id%' OR s.StaffName LIKE '%$id%') ORDER BY StaffID ASC";
                                    $result1 = $conn->query($sql1);
                                    if($result1-> num_rows > 0){
                                        while($row = $result1-> fetch_assoc()){
                            ?>
                            <tr class="tr">
                                <td><?= $row['StaffID'] ?></td>
                                <td><?= $row['StaffName'] ?></td>
                                <td><a href="mailto:<?= $row['Email'] ?>"><?= $row['Email'] ?></a></td>
                                <td><a href="tel:<?= $row['ContactNo'] ?>"><?= $row['ContactNo'] ?></a></td>
                                <td><?= $row['Appointed_Date'] ?></td>
                                <td class="ac">
                                    <form action="" method="post" id="default">
                                        <?php
                                            if($row['Status'] == 0){
                                                echo '<input type="text" name="Staff" value="'. $row['StaffID'].'" style="display: none;">';
                                                echo '<input type="number" name="active" id="invisible" value="1" style="display: none;">';
                                                echo '<button type="submit" class="btn" name="status" style="--i : green;" onclick="window.alert(\''.$row['StaffID'].' : Account Unlocked!\')">';
                                                echo '<span class="material-icons-round" id="active">lock_open</span>';
                                                echo '<span class="name" id="tag">Activate</span>';
                                                echo '</button>';
                                            }
                                            else if($row['Status'] == 1){
                                                echo '<input type="text" name="Staff" value="'. $row['StaffID'].'" style="display: none;">';
                                                echo '<input type="number" name="active" id="invisible" value="0" style="display: none;">';
                                                echo '<button type="submit" class="btn" name="status" style="--i : red;" onclick="window.alert(\''.$row['StaffID'].' : Account Locked!\')">';
                                                echo '<span class="material-icons-round" id="active">lock_outline</span>';
                                                echo '<span class="name" id="tag">Deactivate</span>';
                                                echo '</button>';
                                            }
                                        ?>
                                    </form>
                                </td>
                                <td class="action">
                                    <a href="StaffProfile.php?StaffID=<?= $row['StaffID']?>&profile=Admin"><abbr title="View"><span class="material-icons-round">view_comfy</span></abbr></a>
                                    <a href="Manage-Staff.php?StaffID=<?= $row['StaffID']?>&profile=Admin"><abbr title="Modify"><span class="material-icons-round">auto_fix_high</span></abbr></a>
                                    <form action="" method="post" class="for">
                                        <input type="text" name="id" id="id" value="<?= $row['StaffID'] ?>" style="display: none;">
                                        <button type="submit" name="del"><abbr title="Delete"><span class="material-icons-round">delete_forever</span></abbr></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }else{
                                        echo '<tr><td colspan = "7" id = "no">0 Results</td></tr>';
                                    }

                                }else{
                                    if($result-> num_rows > 0){
                                        while($row = $result-> fetch_assoc()){
                                
                            ?>
                            <tr class="tr">
                                <td><?= $row['StaffID'] ?></td>
                                <td><?= $row['StaffName'] ?></td>
                                <td><a href="mailto:<?= $row['Email'] ?>"><?= $row['Email'] ?></a></td>
                                <td><a href="tel:<?= $row['ContactNo'] ?>"><?= $row['ContactNo'] ?></a></td>
                                <td><?= $row['Appointed_Date'] ?></td>
                                <td class="ac">
                                    <form action="" method="post" id="default">
                                        <?php
                                            if($row['Status'] == 0){
                                                echo '<input type="text" name="Staff" value="'. $row['StaffID'].'" style="display: none;">';
                                                echo '<input type="number" name="active" id="invisible" value="1" style="display: none;">';
                                                echo '<button type="submit" class="btn" name="status" style="--i : green;" onclick="window.alert(\''.$row['StaffID'].' : Account Unlocked!\')">';
                                                echo '<span class="material-icons-round" id="active">lock_open</span>';
                                                echo '<span class="name" id="tag">Activate</span>';
                                                echo '</button>';
                                            }
                                            else if($row['Status'] == 1){
                                                echo '<input type="text" name="Staff" value="'. $row['StaffID'].'" style="display: none;">';
                                                echo '<input type="number" name="active" id="invisible" value="0" style="display: none;">';
                                                echo '<button type="submit" class="btn" name="status" style="--i : red;" onclick="window.alert(\''.$row['StaffID'].' : Account Locked!\')">';
                                                echo '<span class="material-icons-round" id="active">lock_outline</span>';
                                                echo '<span class="name" id="tag">Deactivate</span>';
                                                echo '</button>';
                                            }
                                        ?>
                                    </form>
                                </td>
                                <td class="action">
                                    <a href="StaffProfile.php?StaffID=<?= $row['StaffID']?>&profile=Admin"><abbr title="View"><span class="material-icons-round">view_comfy</span></abbr></a>
                                    <a href="Manage-Staff.php?StaffID=<?= $row['StaffID']?>&profile=Admin"><abbr title="Modify"><span class="material-icons-round">auto_fix_high</span></abbr></a>
                                    <form action="" method="post" class="for">
                                        <input type="text" name="id" id="id" value="<?= $row['StaffID'] ?>" style="display: none;">
                                        <button type="submit" name="del" onclick="window.alert('Deleted from Employee List')"><abbr title="Delete"><span class="material-icons-round">delete_forever</span></abbr></button>
                                    </form>
                                </td>
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
    <script>
        const msg = document.getElementById('error-msg');
        const error = document.getElementById('error');
        const special = document.querySelector('.special');
        const font = document.querySelector('.name');
        const icon = document.getElementById('i');

        if (msg.innerHTML== "Staff ID already exist...") {
            icon.style.color = "red";
            font.style.color = "red";
            error.style.display = "block";
            special.style.border = "2px solid red";

        } else {
            error.style.display = "none";
            special.style.border = "2px solid #16151f";
        }

    </script>
</body>
</html>