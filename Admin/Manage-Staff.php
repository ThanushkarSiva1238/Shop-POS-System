<?php
    $StaffId = $_GET['StaffID'];
    $profile = $_GET['profile'];
?>

<?php
    @include 'config.php';

    if(isset($_POST['update'])){
        $id = $StaffId;
        $name = $_POST['EmpName'];
        $add = $_POST['EmpAdd'];
        $dob = $_POST['EmpDOB'];
        $gen = $_POST['gender'];
        $email = $_POST['EmpEmail'];
        $contact = $_POST['EmpContact'];
        $date = $_POST['Appointment'];

        $update = "UPDATE staff SET StaffName = '$name', Address = '$add', Gender = '$gen', DOB = '$dob', Email = '$email', ContactNo = '$contact', Appointed_Date = '$date' WHERE StaffID = '$id'";
        $result = mysqli_query($conn, $update);
        
        header('location:StaffProfile.php?StaffID='.$id.'&profile='.$profile);
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
    <link rel="icon" type="image/x-icon" href="Svg/manage_accounts.svg">
    <title>Manage Profile</title>
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
        .profile{
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
        .left .button{
            color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            row-gap: 1rem;
            margin-top: 2rem;
        }
        .button .btn{
            background-color: #16151f;
            width: 11rem;
            border-radius: 5px;
            color: #f4f4f4;
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
            padding: .8rem 0;
            width: 10em;
            border-bottom: 2px solid #16151f;
        }
        .main table tr td{
            border-bottom: 2px solid #16151f;
        }
        .main table tr td .mark{
            padding: .2rem .5rem;
            background: none;
            border: 2px solid #16151f;
            width: 100%;
            font-family: 'poppins', sans-serif;
        }
        .main table tr #gen{
            display: flex;
            align-items: center;
            column-gap: 1rem;
        }
        .main table tr td #m, #f{
            margin-right: -8px;
        }
        .main table tr:last-child th{
            border: none;
        }
        .main table tr:last-child td{
            border: none;
        }

    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="path"></div>
            <div class="title">
                <span id="head">Update Administrator Profile</span>
                <button onclick="history.back()" class="out">
                    <span class="material-icons-round" id="home">first_page</span>
                    <span class="name">Back</span>
                </button>
            </div>
            <div class="profile_details">
                <form action="" method="post" class="profile">
                    <div class="left">
                        <i class='bx bx-user-circle bx-tada bx-flip-horizontal' id="i"></i>
                        <div class="position">Administrator</div>
                        <div class="button">
                            <input type="reset" id="reset" style="display: none;">
                            <label for="reset" class="btn">
                                <span class="material-icons-round" id="cancel">cancel</span>
                                <span class="name">Clear</span>
                            </label>
                            <input type="submit" id="submit" name="update" style="display: none;">
                            <label for="submit" class="btn">
                                <span class="material-icons-round" id="home">update</span>
                                <span class="name">Update</span>
                            </label>
                        </div>
                    </div>
                    <?php
                        @include 'config.php';

                        $sql = "SELECT * FROM staff WHERE StaffID = '$StaffId'";
                        $result = $conn->query($sql);
                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                    
                    ?>
                    <div class="main">
                        <span class="id" style="display: none;"><?= $row['StaffID'] ?></span>
                        <table>
                            <thead>
                                <tr>
                                    <th>Full Name</th><td><input type="text" class="mark" name="EmpName" value="<?= $row['StaffName'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Address</th><td><input type="text" class="mark" name="EmpAdd" value="<?= $row['Address'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th><td><input type="date" class="mark" name="EmpDOB" value="<?= $row['DOB'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        <div id="gen">
                                            <?php
                                                if ($row['Gender'] == "Male") {
                                                    echo '<input type="radio" name="gender" id="m" value="Male" checked><label for="m">Male</label>';
                                                    echo '<input type="radio" name="gender" id="f" value="Female"><label for="f">Female</label>';
                                                } else {
                                                    echo '<input type="radio" name="gender" id="m" value="Male"><label for="m">Male</label>';
                                                    echo '<input type="radio" name="gender" id="f" value="Female" checked><label for="f">Female</label>';
                                                }
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th><td><input type="Email" class="mark" name="EmpEmail" value="<?= $row['Email'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Contact No</th><td><input type="tel" class="mark" name="EmpContact" value="<?= $row['ContactNo'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Appointed Date</th><td><input type="date" class="mark" name="Appointment" value="<?= $row['Appointed_Date'] ?>" required></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </form>
            </div>    
        </div>
    </main>
    <script>
        const head = document.getElementById('head');
        const position = document.querySelector('.position');
        const id = document.querySelector('.id');

        if (id.innerText == "AD001") {
            head.innerText = "Update Administrator Profile";
            position.innerText = "Administrator";
        } else {
            head.innerText = "Update Employee Profile";
            position.innerText = "Employee";
        }
    </script>   
</body>
</html>