<?php

@include 'config.php';

session_start();

if(isset($_SESSION_1['StaffID'])){
    header('location:index.php');
}

?>

<?php
    @include 'config.php';

    if(isset($_POST['SubReg'])){
        $name = $_POST['name'];
        $desc = $_POST['Desc'];

        $insert = "INSERT INTO Category(Name, Description) VALUES('$name','$desc')";
        mysqli_query($conn, $insert);
    }

?>

<?php
    @include 'config.php';

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $delete = "DELETE FROM category WHERE CategoryID = '$id'";
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/category.svg">
    <title>Categories</title>
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
            width: 100%;
            column-gap: 1rem;
            height: 100%;
        }
        .insight .form{
            width: 30%;
            height: 85vh;
            display: flex;
            align-items: center;
            flex-direction: column;
            border-radius: 5px;
            box-shadow: 5px 5px 6px 0 #919191,
                        -5px -5px 6px 0 #919191;
            padding: 2rem;
            row-gap: .5rem;
        }
        .form h2{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            color: #16151f;
        }
        .form #icon{
            color: #bbb;
            font-size: 12rem;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        form{
            display: flex;
            flex-direction: column;
            row-gap: .5rem;
            width: 100%;
            color: #16151f;
        }
        form label{
            font-size: 16px;
            font-weight: 700;
        }
        form input[type="text"]{
            font-family: 'poppins', sans-serif;
            padding: 5px;
            border-radius: 5px;
            border: 2px solid #16151f;
            background: none;
            margin-bottom: 12px;
        }
        form textarea{
            resize: none;
            padding: 5px;
            height: 6rem;
            font-family: 'poppins', sans-serif;
            border-radius: 5px;
            border: 2px solid #16151f;
            background: none;
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
            padding: 0 0 .5rem 0;
        }
        .title h2{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            color: #16151f;
        }
        .title .out{
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
        .view .details{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            overflow-y: auto;
            height: 75vh;
            column-gap: 1rem;
            row-gap: 1rem;
        }
        .details .card{
            padding: 10px 20px;
            border: 2px solid #16151f;
            border-radius: 5px;
            width: 27.5rem;
            height: 17rem;
        }
        .card h3{
            color: #16151f;
            font-size: 18px;
        }
        .card .cat{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .cat p{
            text-align: justify;
            border-right: 2px solid #16151f;
            padding: 5px 12px 0 0;
            margin-right: 10px;
            overflow-y: auto;
            height: 28vh;
        }
        .cat .option{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            row-gap: 1rem;
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
                <h2>Categories</h2>
                <span class="material-icons-round" id="icon">category</span>
                <form action="" method="post">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" required>
                    <label for="Desc">Description</label>
                    <textarea name="Desc" id="Desc" required></textarea>
                    <div class="button">
                        <input type="reset" id="reset" style="display: none;">
                        <label for="reset" class="btn">
                            <span class="material-icons-round" id="cancel">highlight_off</span>
                            <span class="name">Clear</span>
                        </label>
                        <input type="submit" id="submit" name="SubReg" style="display: none;">
                        <label for="submit" class="btn">
                            <span class="material-icons-round" id="home">add_circle_outline</span>
                            <span class="name">Create</span>
                        </label>
                    </div>
                </form>
            </div>
            <div class="view">
                <div class="title">
                    <h2>Category Details</h2>
                    <a href="Home.php" class="out">
                        <span class="material-icons-round" id="home">home</span>
                        <span class="name">DashBoard</span>
                    </a>
                </div>
                <div class="details">
                    <?php
                        @include 'config.php';

                        if($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                        }
                        else{
                            $sql = "SELECT * FROM Category";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                
                    ?>
                    <div class="card">
                        <h3><?= $row['CategoryID']?> : <?= $row['Name']?></h3>
                        <div class="cat">
                            <p><?= $row['Description'] ?></p>
                            <div class="option">
                                <a href="Modify-Category.php?CateID=<?= $row['CategoryID'] ?>" class="opt"><abbr title="Modify"><span class="material-icons-round" id="logo">update</span></abbr></a>
                                <form action="" method="post">
                                    <input type="number" name="id" id="id" value="<?= $row['CategoryID'] ?>" style="display: none;">
                                    <button type="submit" class="opt" name="delete" value="Delete Cart" onclick="window.alert('Deleted from Category List!')"><abbr title="Delete"><span class="material-icons-round" id="logo">delete_outline</span></abbr></button>
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
</body>
</html>