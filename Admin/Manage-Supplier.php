<?php
    $SuppID = $_GET['SuppID'];    
?>

<?php
    @include 'config.php';

    if(isset($_POST['submit'])){
        $id = $SuppID;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['telno'];
        $add = $_POST['address'];

        $update = "UPDATE supplier SET  Supp_Name = '$name', Email = '$email', ContactNo = '$tel', ADDRESS = '$add' WHERE SupplierID = '$id'";
        mysqli_query($conn, $update);
        header('location:Supplier.php');
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Rounded" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/auto_fix_high.svg">
    <title>Manage Supplier</title>
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
            padding-bottom: 0;
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
            height: 45vh;
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
            padding-right: .5rem;
        }
        .icon{
            color: #bbb;
            font-size: 13rem;
            padding-bottom: 7px;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .left .name{
            font-size: 1.7rem;
            font-weight: 800;
            color: #16151f;
        }
        .left .ID{
            font-size: 1.2rem;
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
            width: 95%;
            margin: 1rem auto;
            font-size: 1.1rem;
            padding: 1rem;
            margin: 1rem;
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
        td select{
            font-family: 'poppins', sans-serif;
            margin: .4rem 0;
            padding: .2rem .7rem;
            width: 100%;
            border: 2px solid #16151f;
            background: none;
        }
        select option{
            background: #4b4b4b;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            height: 3rem;
        }
        .main table tr td input[type="text"], input[type="email"]{
            margin: .4rem 0;
            padding: .2rem .5rem;
            background: none;
            border: 2px solid #16151f;
            width: 100%;
            font-family: 'poppins', sans-serif;
        }
        .main table tr:last-child th{
            border: none;
        }
        .main table tr:last-child td{
            border: none;
        }
        .main .button{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .button .btn{
            background-color: #16151f;
            border-radius: 5px;
            color: #f4f4f4;
            width: 10rem;
            margin: 1rem;
            padding: .5rem 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: .5rem;
        }
        .btn .name{
            font-family: 'poppins', sans-serif;
            font-weight: 600;
            letter-spacing: .5px;
            font-size: 15px;
        }
        .button .btn:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }
    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="path"></div>
            <div class="title">
                <span id="head">Modify Details</span>
                <button onclick="history.back()" class="out">
                    <span class="material-icons-round" id="home">first_page</span>
                    <span class="name">Back</span>
                </button>
            </div>
            
            <div class="profile_details">
                <?php
                    @include 'config.php';

                    $sql = "SELECT * FROM supplier WHERE SupplierID = '$SuppID'";
                    $result = $conn->query($sql);
                    if($result-> num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                ?>
                <div class="profile">
                    <div class="left">
                        <span class="material-symbols-rounded icon">conveyor_belt</span>
                        <div class="name">Supplier ID</div>
                        <div class="ID"><?= $row['SupplierID'] ?></div>
                        
                    </div>
                    <form action="" method="post" class="main">
                        <table>
                            <thead>
                                <tr>
                                    <th>Supplier Name</th><td><input type="text" class="mark" name="name" value="<?= $row['Supp_Name'] ?>"  required></td>
                                </tr>
                                <tr>
                                    <th>Email Address</th><td><input type="email" class="mark" name="email" value="<?= $row['Email'] ?>"  required></td>
                                </tr>
                                <tr>
                                    <th>Telephone No</th><td><input type="text" class="mark" name="telno" value="<?= $row['ContactNo'] ?>"  required></td>
                                </tr>                                
                                <tr>
                                    <th>Address</th><td><input type="text" class="mark" name="address" value="<?= $row['ADDRESS'] ?>"  required></td>
                                </tr>                                
                            </thead>
                        </table>
                        <div class="button">
                            <button type="reset" class="btn" name="clear">
                                <span class="material-icons-round">cancel</span>
                                <span class="name">Clear</span>
                            </button>
                            <button type="submit" class="btn" name="submit" onclick="window.alert('Modified Successfully!')">
                                <span class="material-icons-round">update</span>
                                <span class="name">Update</span>
                            </button>
                        </div>
                    </form>
                </div>
                <?php
                        }
                    }
                ?>
            </div>   

        </div>
    </main>       
</body>
</html>