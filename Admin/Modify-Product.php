<?php
    $ProductID = $_GET['ProID'];
?>

<?php
    @include 'config.php';

    if(isset($_POST['submit'])){
        $id = $ProductID;
        $name = $_POST['name'];
        $quantity = $_POST['quan'];
        $price = $_POST['price'];
        $image = $_POST['img'];
        $cate = $_POST['category'];
        $supp = $_POST['supp'];

        if ($_POST['on'] == 'on') {
            $update = "UPDATE product SET ProductName = '$name', Total_Quantity = '$quantity', Unit_Price = '$price', Image = '$image', CategoryID = '$cate', SupplierID = '$supp' WHERE ProductID = '$id'";
            mysqli_query($conn, $update);
        } else{
            $update = "UPDATE product SET ProductName = '$name', Total_Quantity = '$quantity', Unit_Price = '$price', CategoryID = '$cate', SupplierID = '$supp' WHERE ProductID = '$id'";
            mysqli_query($conn, $update);
        }
        
        header('location:View-Product.php?ProID='.$id);
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
    <link rel="icon" type="image/x-icon" href="Svg/auto_fix_high.svg">
    <title>Modify Products</title>
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
            height: 56vh;
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
        .left img{
            color: #bbb;
            width: 15em;
            padding: 1.5rem 0;
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
        .main table tr .img{
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .img #on{
            display: none;
        }
        .img .checkmark{
            display: flex;
            align-items: center;
            background-color: #777;
            width: 1.2rem;
            height: 1.2rem;
            border-radius: 5px;
            text-align: center;
            margin-top: 2px;
        }
        .checkmark .check{
            font-size: 12px;
            display: none;
            width: 100%;
        }
        .img #on:checked ~.checkmark{
            background-color: #2196F3;
            width: 4.5rem;
            height: 1.5rem;
            color: #fff;
            border-radius: 5px;
        }
        .img #on:checked ~.checkmark .check{
            display: block;
        }
        .main table tr td{
            border-bottom: 2px solid #16151f;
        }
        td select{
            font-family: 'poppins', sans-serif;
            margin: .4rem 0;
            padding: .2rem;
            width: 100%;
            border: 2px solid #16151f;
            background: none;
        }
        select option{
            background: #4b4b4b;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            height: 4rem;
        }
        .main table tr td input[type="text"], input[type="number"]{
            margin: .4rem 0;
            padding: .2rem .5rem;
            background: none;
            border: 2px solid #16151f;
            width: 100%;
            font-family: 'poppins', sans-serif;
        }
        input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button{
            -webkit-appearance: none;
        }

        tr input[type="file"]::-webkit-file-upload-button {
            display: none;
        }
        tr input[type="file"]::before {
            font-family: 'poppins', sans-serif;
            content: 'Select the picture';
            display: inline-block;
            border: 2px solid #16151f;
            border-radius: 3px;
            padding: .2rem .5rem;
            margin-top: 2px;
            margin-right: 5px;
            outline: none;
            white-space: nowrap;
            cursor: pointer;
            font-weight: 600;
            font-size: 10pt;
        }
        tr input[type="file"]:hover::before {
            background: #16151f;
            color: #ccc;
        }
        tr input[type="file"]:active::before {
            background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
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
                <span id="head">Modify Product</span>
                <button onclick="history.back()" class="out">
                    <span class="material-icons-round" id="home">first_page</span>
                    <span class="name">Back</span>
                </button>
            </div>
            <div class="profile_details">
                <?php
                    @include 'config.php';

                    $sql = "SELECT p.*, c.Name, s.Supp_Name FROM product p, category c, supplier s WHERE p.CategoryID = c.CategoryID AND p.SupplierID = s.SupplierID AND ProductID = '$ProductID'";
                    $result = $conn->query($sql);
                    if($result-> num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                ?>
                <div class="profile">
                    <div class="left">
                        <img src="/Sampath Food City/Pic/<?= $row['Image'] ?>" alt="<?= $row['ProductName']?>">
                        <div class="name">Product ID</div>
                        <div class="ID"><?= $row['ProductID'] ?></div>
                        
                    </div>
                    <form action="" method="post" class="main">
                        <table>
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <td>
                                        <select name="category" id="category" required>
                                            <?php
                                                @include 'config.php';

                                                $sql = "SELECT * FROM category";
                                                $result = $conn->query($sql);
                                                if($result-> num_rows > 0){
                                                    while($row1 = $result-> fetch_assoc()){
                                                        if ($row['CategoryID'] == $row1['CategoryID']) {
                                                            echo '<option value='.$row['CategoryID'].' selected>'. $row1['Name'].'</option>';
                                                        }else{
                                                            echo '<option value='.$row1['CategoryID'].'>'. $row1['Name'].'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Supplier</th>
                                    <td>
                                        <select name="supp" id="supplier" required>
                                            <?php
                                                @include 'config.php';

                                                $sql1 = "SELECT * FROM supplier";
                                                $result1 = $conn->query($sql1);
                                                if($result1-> num_rows > 0){
                                                    while($row1 = $result1-> fetch_assoc()){
                                                        if ($row['SupplierID'] == $row1['SupplierID']) {
                                                            echo '<option value="'.$row1['SupplierID'].'" selected>'. $row1['Supp_Name'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$row1['SupplierID'].'">'. $row1['Supp_Name'].'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Name</th><td><input type="text" class="mark" name="name" value="<?= $row['ProductName'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th>Total Quantity</th><td><input type="number" class="mark" name="quan" value="<?= $row['Total_Quantity'] ?>" min="0" required></td>
                                </tr>
                                <tr>
                                    <th>Unit Price</th><td><input type="number" class="mark" name="price" value="<?= $row['Unit_Price'] ?>" required></td>
                                </tr>
                                <tr>
                                    <th class="img">Image <input type="checkbox" name="on" id="on"><label for="on" class="checkmark"><span class="check">Enabled</span></label></th>
                                    <td><input type="file" name="img" id="picture" value="<?= $row['Image']?>" disabled></td>
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
    <script>
        var checkbox = document.getElementById("on");
        var input = document.getElementById("picture");

        checkbox.addEventListener("change", function() {
            input.disabled = !this.checked;
        });
    </script>    
</body>
</html>