<?php
    $profile = $_GET['profile'];
?>

<?php
    @include 'config.php';

    if(isset($_POST['create'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $quantity = $_POST['quan'];
        $price = $_POST['price'];
        $image = $_POST['img'];
        $cate = $_POST['category'];
        $supp = $_POST['supplier'];

        $select = "SELECT * FROM product WHERE ProductID = '$id'";
        $result = mysqli_query($conn, $select);
        
        if(mysqli_num_rows($result) > 0){
            $error[] = 'Product ID already exist...';
        }
        else{
            $insert = "INSERT INTO product VALUES('$id', '$name', '$quantity', '$price', '$image', '$cate', '$supp')";
            mysqli_query($conn, $insert);
        }
    }

?>

<?php
    @include 'config.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $delete = "DELETE FROM product WHERE ProductID = '$id'";
        mysqli_query($conn, $delete);
    }
?>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/inventory_2.svg">
    <title>Products</title>
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
        main .invisible{
            display: none;
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
            font-size: 10rem;
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
        .tr input[type="text"], input[type="number"]{
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
        }
        .error p{
            color: red;
            font-size: 12px;
        }
        
        input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button{
            -webkit-appearance: none;
        }
        input[type="file"]::-webkit-file-upload-button {
            display: none;
        }
        input[type="file"]::before {
            font-family: 'poppins', sans-serif;
            content: 'Select the picture';
            display: inline-block;
            border: 2px solid #16151f;
            border-radius: 3px;
            padding: .2rem .5rem;
            margin-top: 2px;
            margin-left: 3px;
            margin-right: 5px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            font-weight: 600;
            font-size: 10pt;
        }
        input[type="file"]:hover::before {
            background: #16151f;
            color: #ccc;
        }
        input[type="file"]:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
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
            flex-direction: column;
            overflow-y: auto;
            height: 76vh;
            row-gap: .5rem;
            color: #16151f;
        }
        .details .loop{
            width: 100%;
            padding-bottom: 7px;
            position: relative;
        }
        .table2{
            font-size: 1rem;
            width: 100%;
        }
        .table2 thead tr th{
            padding: .3rem;
            font-size: 15px;
            background-color: #f4f4f4;
            z-index: 99;
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
        .table2 tbody tr .left{
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .table2 tbody tr .cen{
            width: 8em;
            position: relative;
        }
        .table2 tbody tr td .status{
            background: var(--color);
            margin: 5px 8px;
            padding: 3px 5px;
            border-radius: 5px;
            font-weight: 600;
            z-index: -1;
        }
        .table2 tbody tr .action{
            display: flex;
            justify-content: center;
            align-items: center;
            column-gap: 1rem;
            width: 100%;
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
        

    </style>
</head>
<body>
    <main>
        <div class="h1">Sampath Food City (PVT) Ltd</div>
        
        <div class="insight">
            <div class="form">
                <h2 class="h2">Add Products</h2>
                <span class="material-symbols-rounded icon">inventory_2</span>

                <form action="" method="post" class="fill">
                    <div class="table1">
                        <div class="tr">
                            <label for="id">Category</label>
                            <select name="category" id="category" required>
                                <option value=""></option>
                                <?php
                                    @include 'config.php';

                                    $sql = "SELECT * FROM category";
                                    $result = $conn->query($sql);
                                    if($result-> num_rows > 0){
                                        while($row = $result-> fetch_assoc()){
                                ?>
                                <option value="<?= $row['CategoryID'] ?>"><?= $row['Name'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="tr">
                            <label for="id">Supplier</label>
                            <select name="supplier" id="supplier" required>
                                <option value=""></option>
                                <?php
                                    @include 'config.php';

                                    $sql = "SELECT * FROM supplier";
                                    $result = $conn->query($sql);
                                    if($result-> num_rows > 0){
                                        while($row = $result-> fetch_assoc()){
                                ?>
                                <option value="<?= $row['SupplierID'] ?>"><?= $row['Supp_Name'] ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="tr error-only">
                            <label for="id">Product ID</label>
                            <div class="error">
                                <div class="special">
                                    <input type="text" name="id" id="id" value="PRO/" required>
                                    <i class='bx bx-error-circle bx-tada'  id="error" style="display: none;"></i>
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
                            <label for="name">Product</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="tr">
                            <label for="quan">Quantity</label>
                            <input type="number" name="quan" id="quan" required>
                        </div>
                        <div class="tr">
                            <label for="price">Unit Price</label>
                            <input type="number" min="0" name="price" id="price" required>
                        </div>
                        <div class="tr">
                            <label for="img">Image</label>
                            <input type="file" name="img" id="img">
                        </div>
                    </div>
                    <div class="button">
                        <input type="reset" id="reset" style="display: none;">
                        <label for="reset" class="btn">
                            <span class="material-symbols-rounded" id="cancel">highlight_off</span>
                            <span class="name">Clear</span>
                        </label>
                        <input type="submit" id="submit" name="create" style="display: none;">
                        <label for="submit" class="btn">
                            <span class="material-symbols-rounded" id="home">add_circle_outline</span>
                            <span class="name">Create</span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="view">
                <div class="title">
                    <h2>Product Details</h2>
                    <div class="out">
                        <form action="" method="post" class="search">
                            <input type="text" name="search" placeholder="Search Product ..." autocomplete="off">
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
                    <div class="loop">
                        <table class="table2">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Status</th>
                                    <?php
                                        if ($profile == "Admin") {        
                                    ?>
                                    <th class="action">Actions</th>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    @include 'config.php';

                                    $sql = "SELECT * FROM product";
                                    $result = $conn->query($sql);

                                    if (isset($_POST['searching'])) {
                                        $id = $_POST['search'];
                                        $sql1 = "SELECT * FROM product WHERE ProductID ='$id' OR ProductName LIKE '$id%' OR ProductName LIKE '%$id%'";
                                        $result1 = $conn->query($sql1);
                                        if($result1-> num_rows > 0){
                                            while($row1 = $result1-> fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?= $row1['ProductID'] ?></td>
                                    <td class="left"><?= $row1['ProductName'] ?></td>
                                    <td><?= $row1['Total_Quantity'] ?></td>
                                    <td>Rs. <?= $row1['Unit_Price'] ?>.00</td>
                                    <td class="cen">
                                        <?php
                                            $quan = $row1['Total_Quantity'];
                                            $border = 20;
                                            if ($quan > $border) {
                                                echo '<div class="status" style= "--color: Green;">In Stock</div>';
                                            }
                                            else if ($quan == 0) {
                                                echo '<div class="status" style= "--color: Red;">Out of Stock</div>';
                                            }
                                            else if ($quan <= $border) {
                                                echo '<div class="status" style= "--color: Yellow;">Low Stock</div>';
                                            }
                                        ?>
                                    </td>
                                    <?php
                                        if ($profile == "Admin") {        
                                    ?>
                                        <td class="action click">
                                            <a href="View-Product.php?ProID=<?= $row['ProductID'] ?>"><abbr title="View"><span class="material-icons-round">view_comfy</span></abbr></a>
                                            <a href="Modify-Product.php?ProID=<?= $row['ProductID'] ?>"><abbr title="Modify"><span class="material-icons-round">auto_fix_high</span></abbr></a>
                                            <form action="" method="post">
                                                <input type="text" name="id" id="id" value="<?= $row['ProductID'] ?>" style="display: none;">
                                                <button type="submit" value="001" class="opt" name="delete" value="Delete Cart" onclick="window.alert('Deleted from Product List!')"><abbr title="Delete"><span class="material-icons-round" id="logo">delete_forever</span></abbr></button>
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
                                    <td><?= $row['ProductID'] ?></td>
                                    <td class="left"><?= $row['ProductName'] ?></td>
                                    <td><?= $row['Total_Quantity'] ?></td>
                                    <td>Rs. <?= $row['Unit_Price'] ?>.00</td>
                                    <td class="cen">
                                        <?php
                                            $quan = $row['Total_Quantity'];
                                            $border = 20;
                                            if ($quan > $border) {
                                                echo '<div class="status" style= "--color: Green;">In Stock</div>';
                                            }
                                            else if ($quan == 0) {
                                                echo '<div class="status" style= "--color: Red;">Out of Stock</div>';
                                            }
                                            else if ($quan <= $border) {
                                                echo '<div class="status" style= "--color: Yellow;">Low Stock</div>';
                                            }
                                        ?>
                                    </td>
                                    <?php
                                        if ($profile == "Admin") {        
                                    ?>
                                        <td class="action click">
                                            <a href="View-Product.php?ProID=<?= $row['ProductID'] ?>"><abbr title="View"><span class="material-icons-round">view_comfy</span></abbr></a>
                                            <a href="Modify-Product.php?ProID=<?= $row['ProductID'] ?>"><abbr title="Modify"><span class="material-icons-round">auto_fix_high</span></abbr></a>
                                            <form action="" method="post">
                                                <input type="text" name="id" id="id" value="<?= $row['ProductID'] ?>" style="display: none;">
                                                <button type="submit" value="001" class="opt" name="delete" value="Delete Cart" onclick="window.alert('Deleted from Product List!')"><abbr title="Delete"><span class="material-icons-round" id="logo">delete_forever</span></abbr></button>
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
        </div>
    </main>       
    <script>
        var val = <?php echo json_encode($profile);?>;

        const msg = document.getElementById('error-msg');
        const error = document.getElementById('error');
        const special = document.querySelector('.special');

        const form = document.querySelector('.form');
        const view = document.querySelector('.view');
        const cen = document.querySelector('.cen');

        if (val == "Admin") {
            if (msg.innerText == "Product ID already exist...") {
                error.style.display = "block";
                special.style.border = "2px solid red";

            } else {
                error.style.display = "none";
                special.style.border = "2px solid #16151f";
            }
            
        } else if (val == "Staff") {
            form.style.display = "none";
            view.style.width = "100%";
            cen.style.height = "2.5rem";
        }

    </script>
</body>
</html>