<?php
    @include 'config.php';

    if(isset($_POST['SubReg'])){
        $fname = $_POST['fname'];
        $dob = $_POST['dob'];
        $gen = $_POST['gen'];
        $telno = $_POST['telno'];

        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $em = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = md5($_POST['password']);
        $cpw = md5($_POST['cpassword']);

        if($pw != $cpw){
            $error[] = 'Password not matched!';
        }
        else{
            $check = "SELECT * FROM customer_login WHERE UserName = '$uname' && Password = '$pw'";
            $result = mysqli_query($conn, $check);

            if(mysqli_num_rows($result) > 0){
                $error[] = 'User Name already exist!';
            }
            else{
                $insert = "INSERT INTO customer(CusName, GENDER, DOB, Email, ContactNo) VALUES('$fname','$gen','$dob','$em','$telno')";
                mysqli_query($conn, $insert);

                $select = "SELECT CustomerID FROM customer WHERE ContactNo = '$telno'";
                $result1 = mysqli_query($conn, $select);

                if($result1-> num_rows > 0){
                    $row = $result1-> fetch_assoc();

                    $insert1 = "INSERT INTO customer_login(UserName, Password, STATUS, CusID) VALUES('$uname', '$pw', '1', '".$row['CustomerID']."')";
                    $result1 = mysqli_query($conn, $insert1);
                    header('location:login.php');
                }

            }

        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href="bxl-stripe.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            font-family: 'poppins', sans-serif;
        }

        body {
            font-family: 'poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0 0 -10px;
            font-size: 30px;
        }

        .form-container {
            margin-top: -10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1rem;
        }
        .form-container form{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
        }
        form .app{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        .app fieldset{
            padding: .5rem;
            width: 20rem;
            display: flex;
            flex-direction: column;
            height: 310px;
        }
        fieldset span{
            display: flex;
            flex-direction: column;
        }
        fieldset .gen{
            display: flex;
            align-items: center;
            margin-top: -2px;
            padding-bottom: 7px;
            padding-left: 10px;
            margin-bottom: 5px;
        }
        fieldset .gen input[type="radio"]{
            margin-right: .5rem;
        }
        .gen label{
            margin-right: 1rem;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }
            
        .error-msg{
            text-align: center;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            font-size: 16px;
            margin-top: 2px;
            color: red;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

    </style>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
        <h1>Sampath Food City</h1>
        <h2>Registration</h2>
        </div>

        <div class="form-container">
            <form action="" method="post">
                <div class="app">
                    <fieldset>
                        <legend>Personal Information</legend>
                        <span>
                            <label for="fname">Full Name:</label>
                            <input type="text" id="fname" name="fname" required>
                        </span>
                        <span>
                            <label for="dob">Date Of Birth:</label>
                            <input type="date" id="dob" name="dob" required>
                        </span>
                        <span>
                            <label>Gender:</label>
                            <div class="gen">
                                <input type="radio" id="Male" name="gen" value = "Male" required><label for="Male">Male</label>
                                <input type="radio" id="Female" name="gen" value = "Female" required><label for="Female">Female</label>
                            </div>
                        </span>
                        <span>
                            <label for="telno">Contact Number:</label>
                            <input type="text" id="telno" name="telno" required>
                        </span>
                    </fieldset>
                    <fieldset>
                        <legend>Authentication Details</legend>
                        <span>
                            <label for="uname">User Name:</label>
                            <input type="text" id="uname" name="uname" required>
                        </span>
                        <span>
                            <label for="email">Email address:</label>
                            <input type="email" id="email" name="email" required>
                        </span>
                        <span>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </span>
                        <span>
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="cpassword" required>
                        </span>
                    </fieldset>
                </div>

                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                ?>

                <button type="submit" name="SubReg" onclick="window.alert('You\'re Registered Successfully...');">Register</button>
            </form>
        </div>

        <div class="footer">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
