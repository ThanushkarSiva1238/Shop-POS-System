<?php
    $StaffId = $_GET['StaffID'];
    $profile = $_GET['profile'];
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
        header('location:Employees.php');
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
    <link rel="icon" type="image/x-icon" href="Svg/bx-user-circle.svg">
    <title id="title">Admin Profile</title>
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
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 100%;
            width: 100%;
            padding: .8rem 1rem;
            font-family: 'Poppins', sans-serif;
            gap: 1.5rem;
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
            align-items: center;
            flex-direction: column;
            width: 60%;
            font-family: 'Poppins', sans-serif;
            transform-style: preserve-3d;
            flex-wrap: wrap;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
        }
        .path{
            position: absolute;
            min-height: 100%;
            width: 100%;
            background: linear-gradient(45deg, #333 50%, #afafaf 100%);
            clip-path: circle(90px at right 70px top 30px);

            z-index: 1;
        }
        .insight .title{
            padding: 1rem;
            z-index: 2;
            display: flex;
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            color: #16151f;
            width: 100%;
            position: relative;
        }
        #head{
            margin-bottom: -5px;
        }
        .out{
            display: flex;
            justify-content: center;
            align-items: center;
            background: #16151f;
            color: #f4f4f4;
            padding: .3rem;
            column-gap: .5rem;
            border-radius: 5px;
            position: absolute;
            right: 1rem;
        }
        .out #home{
            font-size: 2rem;
            width: 30px;
            text-align: center;
        }
        .out .name{
            display: none;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            padding-right: .3rem;
            font-weight: 600;
        }
        .title .out:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }
        .title .out:hover .name{
            display: block;
        }

        .insight .profile_details{
            display: flex;
            flex-direction: column;
            width: 100%;
            column-gap: 1rem;
            padding: 0 .5rem;
            padding-bottom: 1rem;
        }
        .profile_details .profile{
            z-index: 2;
            width: 100%;
            height: 60vh;
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
        }
        
        .left{
            border-right: 3px solid #21202c;
            height: 100%;
            width: 32.5%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        .left i{
            color: #bbb;
            font-size: 12rem;
            padding: 1.5rem 0 .8rem 0;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .left .position{
            font-size: 1.7rem;
            font-weight: 800;
            color: #16151f;
        }
        .left #bold{
            margin-top: 1rem;
            font-weight: 600;
            font-size: 18px;
        }
        .left .btn{
            background-color: #16151f;
            border-radius: 5px;
            color: #f4f4f4;
            position: absolute;
            bottom: 10px;
            margin: 1rem;
            padding: .5rem 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
        }
        .btn .name{
            font-weight: 600;
            letter-spacing: .5px;
        }
        .left .btn:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }

        .main{
            height: 100%;
            width: 67.5%;
            z-index: 2;
            padding: 1.5rem 1rem;
            color: #16151f;
            position: relative;
        }
        h1{
            margin-bottom: -.2rem;
            font-size: 1.8rem;
            z-index: 1;
        }
        .main table{
            width: 100%;
            margin: 1rem auto;
            font-size: 1rem;
            padding-left: 1rem;
            border-collapse: collapse;
        }
        .main table tr{
            text-align: left;
        }
        .main table tr th{
            padding: .4rem 0;
            width: 10em;
            border-bottom: 2px solid #16151f;
        }
        .main table tr td{
            border-bottom: 2px solid #16151f;
        }
        .main table tr #space{
            padding: .2rem .5rem;
            text-align: right;
            width: .5rem;
        }
        .main table tr:last-child th{
            border: none;
        }
        .main table tr:last-child td{
            border: none;
        }
        .main form{
            display: flex;
            justify-content: center;
            width: 100%;
        }
        form .btn{
            background-color: #16151f;
            border-radius: 5px;
            color: #f4f4f4;
            bottom: 10px;
            margin: 1rem;
            padding: .5rem 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
        }
        .btn .name{
            font-weight: 600;
            font-size: 15px;
            letter-spacing: .5px;
            font-family: 'poppins', sans-serif;
        }
        form .btn:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }

    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight" id="insight">
            <div class="path"></div>
            <div class="title">
                <span id="head">Administrator Profile</span>                
                <?php
                    if ($profile == "Admin") {
                        if($StaffId == "AD001"){
                            echo '<a href="Home.php" class="out"><span class="material-icons-round" id="home">first_page</span><span class="name">Back</span></a>';
                        }
                        else{
                            echo '<a href="Employees.php" class="out"><span class="material-icons-round" id="home">first_page</span><span class="name">Back</span></a>';
                        }
                    } else{
                        echo '<a href="Staff-Home.php" class="out"><span class="material-icons-round" id="home">first_page</span><span class="name">Back</span></a>';
                    }
                    
                ?>
            </div>
            <div class="profile_details">
                <?php
                    @include 'config.php';
                    if($conn->connect_error){
                        die("Connection failed: ". $conn->connect_error);
                    }
                    else{
                        $sql = "SELECT s.*, sl.Status FROM staff s, staff_login sl WHERE s.StaffID = sl.StaffID AND s.StaffID = '$StaffId'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                
                ?>
                <div class="profile">
                    <div class="left">
                        <i class='bx bx-user-circle bx-tada bx-flip-horizontal' id="i"></i>
                        <div class="position">Administrator</div>
                        <div id="bold">Staff ID</div>
                        <div id="check"><?= $row['StaffID']?></div>

                        <a href="Manage-Staff.php?StaffID=<?= $row['StaffID']?>&profile=<?= $profile?>" class="btn">
                            <span class="material-icons-round" id="update">manage_accounts</span>
                            <span class="name">Manage Account</span>
                        </a>
                    </div>
                    <div class="main">
                        <h1 id="head"><?= $row['StaffName']?></h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Address</th><td id="space">:</td><td><?= $row['Address']?></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th><td id="space">:</td><td><?= $row['DOB']?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th><td id="space">:</td><td><?= $row['Gender']?></td>
                                </tr>
                                <tr>
                                    <th>Email</th><td id="space">:</td><td><?= $row['Email']?></td>
                                </tr>
                                <tr>
                                    <th>Contact No</th><td id="space">:</td><td><?= $row['ContactNo']?></td>
                                </tr>
                                <tr>
                                    <th>Appointed Date</th><td id="space">:</td><td><?= $row['Appointed_Date']?></td>
                                </tr>
                            </thead>
                        </table>
                        <form action="" method="post" id="default">
                            <?php
                                if($row['Status'] == 0){
                                    echo '<input type="text" name="Staff" value="'. $row['StaffID'].'" style="display: none;">';
                                    echo '<label id="color" style="display: none;">'. $row['Status'].'</label>';
                                    echo '<input type="number" name="active" value="1" style="display: none;">';
                                    echo '<button type="submit" class="btn" name="status">';
                                    echo '<span class="material-icons-round" id="active">lock_open</span>';
                                    echo '<span class="name" id="tag">Activate</span>';
                                    echo '</button>';
                                }
                                else if($row['Status'] == 1){
                                    echo '<input type="text" name="Staff" value="'. $row['StaffID'].'" style="display: none;">';
                                    echo '<label id="color" style="display: none;">'. $row['Status'].'</label>';
                                    echo '<input type="number" name="active" value="0" style="display: none;">';
                                    echo '<button type="submit" class="btn" name="status">';
                                    echo '<span class="material-icons-round" id="active">lock_outline</span>';
                                    echo '<span class="name" id="tag">Deactivate</span>';
                                    echo '</button>';
                                }
                            ?>

                            <input type="text" name="id" id="id" value="<?= $row['StaffID'] ?>" style="display: none;">
                            <button type="submit" class="btn" name="del">
                                <span class="material-icons-round">delete</span>
                                <span class="name">Delete Account</span>
                            </button>
                        </form>
                    </div>
                </div>
                <?php
                            }
                        }
                    }
                ?>
            </div>    
        </div>
    </main>
    <script>
        var profile = <?php echo json_encode($profile)?>;

        const title = document.getElementById('title');
        const color = document.getElementById('color');
        const action = document.getElementById('insight');
        const head = document.getElementById('head');
        const position = document.querySelector('.position');

        var check = document.getElementById('check');
        const form = document.getElementById('default');
        const icon = document.getElementById('active');
        const tag = document.getElementById('tag');

        if (profile == "Admin") {
            if (check.innerText == "AD001") {
                title.innerText = "Admin Profile";
                head.innerText = "Administrator Profile";
                form.style.display = "none";
                position.innerText = "Administrator";
            }
            else{
                title.innerText = "Staff Profile";
                head.innerText = "Employee Profile";
                position.innerText = "Employee";

                if (color.innerText == 0) {
                    action.style.boxShadow = "5px 5px 12px 0 red, -5px -5px 12px 0 red";
                    icon.innerText = "lock_open";
                    tag.innerText = "Activate";
                }
                else if (color.innerText == 1) {
                    action.style.boxShadow = "5px 5px 12px 0 green, -5px -5px 12px 0 green";
                    icon.innerText = "lock_outline";
                    tag.innerText = "Deactivate";
                }
            }
        } else if (profile == "Staff"){
            title.innerText = "Staff Profile";
            head.innerText = "Employee Profile";
            form.style.display = "none";
            position.innerText = "Employee";
        }
    </script>       
</body>
</html>