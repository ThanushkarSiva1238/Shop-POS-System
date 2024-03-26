<?php
    @include 'config.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['telno'];
        $add = $_POST['add'];

        $select = "SELECT * FROM supplier WHERE SupplierID = '$id'";
        $result = mysqli_query($conn, $select);
        
        if(mysqli_num_rows($result) > 0){
            $error[] = 'Supplier ID already exist...';
        }
        else{
            $insert = "INSERT INTO supplier VALUES('$id', '$name', '$email', '$tel', '$add')";
            mysqli_query($conn, $insert);
        }
    }
?>

<?php
    @include 'config.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $delete = "DELETE FROM supplier WHERE SupplierID = '$id'";
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
    <link rel="icon" type="image/x-icon" href="Svg/supplier.svg">
    <title>Supplier</title>
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
        .insight .form{
            width: 30%;
            height: 87vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            border-radius: 5px;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            padding: 1rem 1.5rem;
            row-gap: .5rem;
        }
        .form{
            display: flex;
            align-items: center;
            column-gap: .5rem;
        }
        .form .h2{
            font-family: 'Poppins', sans-serif;
            font-size: 26px;
            color: #16151f;
        }
        .form .icon{
            color: #bbb;
            font-size: 13rem;
            padding-bottom: 7px;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .fill{
            display: flex;
            flex-direction: column;
            row-gap: .5rem;
            width: 100%;
            color: #16151f;
        }
        .fill .table1{
            display: flex;
            justify-content: center;
            flex-direction: column;
            row-gap: .7rem;
        }
        .table1 .tr{
            display: flex;
            align-items: center;
        }
        .tr label{
            font-size: 16px;
            font-weight: 700;
            width: 6em;
        }
        .tr select{
            font-family: 'poppins', sans-serif;
            padding: 2px;
            width: 18em;
            border-radius: 5px;
            border: 2px solid #16151f;
            background: none;
        }
        select option{
            background: #4b4b4b;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            height: 3rem;
        }
        .tr input[type="text"], input[type="email"]{
            font-family: 'poppins', sans-serif;
            padding: 3px 5px;
            width: 18em;
            border-radius: 5px;
            border: 2px solid #16151f;
            background: none;
        }
        .error .special{
            display: flex;
            align-items: center;
            font-family: 'poppins', sans-serif;
            padding: 3px 5px;
            width: 17.05em;
            border-radius: 5px;
            border: 2px solid #16151f;
            position: relative;
        }
        .tr #id{
            padding: 0;
            border: none;
            width: 17em;
        }
        .tr #error{
            position: absolute;
            right: 5px;
            font-size: 22px;
            color: red;
            display: none;
        }
        .error p{
            color: red;
            font-size: 12px;
        }
        .button{
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 2rem;
            margin-top: 1rem;
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
        .btn:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .5rem 1.5rem #4b4b4b;
        }

        .insight .view{
            width: 70%;
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
            justify-content: center;
            flex-wrap: wrap;
            overflow-y: auto;
            height: 75vh;
            gap: 1rem;
            color: #16151f;
        }
        
        .details .card{
            padding: 10px 20px;
            border: 2px solid #16151f;
            border-radius: 5px;
            width: 29rem;
            height: 17rem;
        }
        .card h3{
            color: #16151f;
            font-size: 18px;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .card .cat{
            display: flex;
            align-items: center;
            position: relative;

        }
        .cat .p{
            padding: 5px 12px 0 0;
            margin-right: 10px;
            width: 85%;
            overflow-y: auto;
        }
        .p .field{
            padding-bottom: .5rem;
            display: flex;
            flex-direction: column;
        }
        .p .field label{
            font-weight: 600;
            font-size: 16px;
        }
        .p .field span{
            padding-left: 1rem;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cat .option{
            border-left: 2px solid #16151f;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            row-gap: 1rem;
            position: absolute;
            right: 0;
            padding-left: 1.2rem;
        }
        .option .opt{
            width: 2.5rem;
            height: 2.5rem;
            background: #16151f;
            color: #f4f4f4;
            border-radius: 5px;
        }
        .opt abbr{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 1.5px;
        }
        .opt:hover{
            background: #ccc;
            color: #16151f;
            box-shadow: 0 .3rem 1rem #4b4b4b;
        }

    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="form">
                <h2 class="h2">Register - Supplier</h2>
                <span class="material-symbols-rounded icon">conveyor_belt</span>
                <form action="" method="post" class="fill">
                    <div class="table1">
                        <div class="tr">
                            <label for="id">Supplier ID</label>
                            <div class="error">
                                <div class="special">
                                    <input type="text" name="id" id="id" value="SPR/" required>
                                    <i class='bx bx-error-circle bx-tada'  id="error"></i>
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
                        <div class="tr">
                            <label for="name">Supplier</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="tr">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="tr">
                            <label for="telno">Contact No</label>
                            <input type="text" min="0" name="telno" id="telno" required>
                        </div>
                        <div class="tr">
                            <label for="add">Address</label>
                            <input type="text" name="add" id="add" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="reset" id="reset" style="display: none;">
                        <label for="reset" class="btn">
                            <span class="material-symbols-rounded" id="cancel">highlight_off</span>
                            <span class="name">Clear</span>
                        </label>
                        <input type="submit" id="submit" style="display: none;" name="submit">
                        <label for="submit" class="btn">
                            <span class="material-symbols-rounded" id="home">add_circle_outline</span>
                            <span class="name">Create</span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="view">
                <div class="title">
                    <h2>Supplier Details</h2>
                    <div class="out">
                        <form action="" method="post" class="search">
                            <input type="text" name="search" placeholder="Search Supplier ...">
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
                    <?php
                        @include 'config.php';

                        $sql = "SELECT * FROM supplier";
                        $result = $conn->query($sql);

                        if (isset($_POST['searching'])) {
                            $id = $_POST['search'];
                            $sql1 = "SELECT * FROM supplier WHERE SupplierID ='$id' OR Supp_Name LIKE '$id%' OR Supp_Name LIKE '%$id%'";
                            $result1 = $conn->query($sql1);
                            if($result1-> num_rows > 0){
                                while($row = $result1-> fetch_assoc()){
                    ?>
                    <div class="card">
                        <h3><?= $row['SupplierID'] ?> : <?= $row['Supp_Name'] ?></h3>
                        <div class="cat">
                            <div class="p">
                                <div class="field">
                                    <label>Email Address :</label>
                                    <span><?= $row['Email'] ?></span> 
                                </div>
                                <div class="field">
                                    <label>Telephone Number :</label>
                                    <span><?= $row['ContactNo'] ?></span> 
                                </div>
                                <div class="field">
                                    <label>Location :</label>
                                    <span><?= $row['ADDRESS'] ?></span> 
                                </div>
                            </div>
                            <div class="option">
                                <a href="Manage-Supplier.php?SuppID=<?= $row['SupplierID'] ?>" class="opt"><abbr title="Modify"><span class="material-icons-round" id="logo">update</span></abbr></a>
                                <form action="" method="post">
                                    <input type="text" name="id" id="id" value="<?= $row['SupplierID'] ?>" style="display: none;">
                                    <button type="submit" class="opt" name="delete" value="Delete Cart" onclick="window.alert('Deleted from Supplier List!')"><abbr title="Delete"><span class="material-icons-round" id="logo">delete_outline</span></abbr></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                            }else{
                                echo '0 Results';
                            }
                        }else{
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        
                    ?>
                    <div class="card">
                        <h3><?= $row['SupplierID'] ?> : <?= $row['Supp_Name'] ?></h3>
                        <div class="cat">
                            <div class="p">
                                <div class="field">
                                    <label>Email Address :</label>
                                    <span><?= $row['Email'] ?></span> 
                                </div>
                                <div class="field">
                                    <label>Telephone Number :</label>
                                    <span><?= $row['ContactNo'] ?></span> 
                                </div>
                                <div class="field">
                                    <label>Location :</label>
                                    <span><?= $row['ADDRESS'] ?></span> 
                                </div>
                            </div>
                            <div class="option">
                                <a href="Manage-Supplier.php?SuppID=<?= $row['SupplierID'] ?>" class="opt"><abbr title="Modify"><span class="material-icons-round" id="logo">update</span></abbr></a>
                                <form action="" method="post">
                                    <input type="text" name="id" id="id" value="<?= $row['SupplierID'] ?>" style="display: none;">
                                    <button type="submit" class="opt" name="delete" value="Delete Cart" onclick="window.alert('Deleted from Supplier List!')"><abbr title="Delete"><span class="material-icons-round" id="logo">delete_outline</span></abbr></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                            }
                        }
                    ?>
                </div>
            </div>  
        </div>
    </main>       
    <script>
        const msg = document.getElementById('error-msg');
        const error = document.getElementById('error');
        const special = document.querySelector('.special');

        if (msg.innerText == "Supplier ID already exist...") {
            error.style.display = "block";
            special.style.border = "2px solid red";

        } else {
            error.style.display = "none";
            special.style.border = "2px solid #16151f";
        }

    </script>
</body>
</html>