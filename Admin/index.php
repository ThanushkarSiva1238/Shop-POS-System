<?php
    @include 'config.php';

    if(isset($_POST['SubReg'])){
        $id = mysqli_real_escape_string($conn, $_POST['user']);
        $name = mysqli_real_escape_string($conn, $_POST['uname']);
        $em = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = md5($_POST['password']);
        $cpw = md5($_POST['cpassword']);

        $select = " SELECT * FROM staff WHERE StaffID = '$id' AND Email = '$em'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            if($pw != $cpw){
                $error1[] = 'Password not matched!';
            }else{
                $select1 = " SELECT * FROM Staff_Login WHERE UserName = '$name'";
                $result1 = mysqli_query($conn, $select1);

                if(mysqli_num_rows($result1) > 0){
                    $error2[] = 'User name already exist!';
                }else{
                    $insert = "INSERT INTO Staff_Login(UserName, Password, Status, StaffID) VALUES('$name','$pw','1','$id')";
                    mysqli_query($conn, $insert);
                }
            }

        }else{
            $error3[] = 'StaffID not matched!';
        }
    }
?>

<?php
    @include 'config.php';

    session_start();

    if(isset($_POST['SubLog'])){
        $name = mysqli_real_escape_string($conn, $_POST['user']);
        $pw = md5($_POST['password']);
        
        $select = "SELECT * FROM staff_login WHERE UserName='$name' && Password='$pw'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            $select1 = "SELECT * FROM staff_login WHERE Status='1' AND StaffID ='". $row['StaffID']."'";
            $result1 = mysqli_query($conn, $select1);
            
            if (mysqli_num_rows($result1) > 0) {

                if($row['StaffID'] == 'AD001'){
                    $_SESSION['StaffID'] = $row['StaffID'];
                    header('location:Home.php');
                }
                else{
                    $_SESSION['StaffID'] = $row['StaffID'];
                    header('location:Staff-Home.php');
                }
            }
            else{
                $error[] = 'You\'re Blocked!';
            }
        }
        else{
            $error[] = 'Incorrect UserID or Password!';
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fe543d9714.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="Svg/bx-log-in-circle.svg">
    <title>Sampath Food City</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }
        body{
            background: #bbb;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .color{
            position: absolute;
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(90deg, #333 55%, #999 100%);
            clip-path: circle(500px  at right 120px);
            z-index: 0;
        }
        .main{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .content{
            color: rgb(255, 255, 255);
            width: 65em;
            height: 100vh;
            z-index: 99;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        h3{
            font-size: 65px;
            margin-top: 5vh;
            text-transform: uppercase;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        #title{
            font-size: 2.6em;
            color: #16151f;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .container{
            width: 100%;
            height: 10vh;
            color: #fff;
            display: flex;
            margin-top: 20px;
            justify-content: center;
        }
        .container h2{
            font-size: 31px;
            font-weight: 600;
        }
        span{
            color: #16151f;
        }
        .img{ 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img img{
            width: 60vh;
        }
        .form-box{
            width: 23.2rem;
            height: 485px;
            border-radius: 30px;
            position: relative;
            float: right;
            margin: 0 6%;
            padding: 15px 10px;
            box-shadow: 5px 5px 6px 0 rgba(0,0,0,0.5),
                        -5px -5px 6px 0 rgba(0,0,0,0.5);
            color: #fff;
            transform-style: preserve-3d;
        }
        h6{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .P{
            padding: 15px 0 20px;
            line-height: 10px;
            font-family: Tahoma, sans-serif;
            text-align: center;
            font-size: 40px;
            color: #16151f;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .button-box{
            width: 220px;
            margin: 15px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #ff61241f;
            border-radius: 30px;
            box-shadow: -1.5px -1.5px 3px 0 rgba(255,255,255,0.3),
                        5px 5px 5px 0 rgba(0,0,0,0.3),
                        15px 15px 15px 4px rgba(0,0,0,0.3);
        }
        .toggle-btn{
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            font-size: 12.5px;
            font-weight: 600;
            font-family: cursive;
        }
        #LI{
            padding-left: 30px;
            color: #f4f4f4;
        }
        #RS{
            float: right;
            left: 7px;
            top: -37.6px;
            color: #16151f;
        }
        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: #16151f;
            border-radius: 30px;
            transition: .5s;
        }
        .input-login{
            position: absolute;
            width: 250px;
            transition: .5s;
            margin-left: -25.5px;
        }
        .input-register{
            top: 110px;
            position: absolute;
            width: 250px;
            margin-left: 25px;
        }
        .input-field{
            width: 100%;
            padding: 5px 5px;
            margin: 7px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
            font-size: 15px;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }
        
        input[type=text]:focus{
            border-bottom: 2px solid #16151f;
        }
        input[type=password]:focus{
            border-bottom: 2px solid #16151f;
        }
        input[type=email]:focus{
            border-bottom: 2px solid #16151f;
        }
        #pass{
            width: 90%;
        }
        #pass:focus{
            border-bottom: 2px solid #16151f;
            width: 90%;
        }
        ::placeholder{
            color: #bbb;
        }
        
        #cb{
            display: none;
        }
        #lab i{
            color: #bbb;
            cursor: pointer;
            margin: 0px 5px;
            font-size: 18px;
            position: relative;
            top: -52px;
        }
        .submit-btn{
            width: 85%;
            height: 40px;
            padding: 5px 30px;
            cursor: pointer;
            display: flex;
            background: #16151f;
            color: #fff;
            border: 0;
            outline: none;
            border-radius: 30px;
            font-size: 15px;
            font-family: cursive;
            font-weight: 700;
            box-shadow: inset 0 0 0 0 white;
            transition: ease-out 0.4s;
            align-items: center;
            justify-content: center;
        }
        .submit-btn i{
            font-size: 24px;
            margin: 0 5px;
        }
        .submit-btn:hover{
            background: white;
            color: #11101d;
            cursor: pointer;
            box-shadow: inset 300px 0 0 0 white;
        }
        label{
            color: white;
            font-size: 15px;
            bottom: 63.5px;
            position: absolute;
        }
        #login{
            left: 50px;
        }
        #login a{
            color: white;
            font-size: 13px;
            text-decoration: none;
            letter-spacing: .8px;
            margin: 20px 10px;
        }
        #fp:hover{
            color: #16151f;
        }
        #login input{
            color: white;
            font-size: 15;
        }
        #register{
            left: 0;
            display: none;
            margin-top: 20px;
        }
        #register input{
            color: white;
            font-size: 15;
        }
        .error {
            display: flex;
            flex-direction: column;
        }
        .error .special{
            display: flex;
            align-items: center;
            position: relative;
        }
        .special #id{
            width: 100%;
            padding: 5px 5px;
            margin: 5px 0;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
            font-size: 15px;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }
        .special #log-error, #SId-error, #Un-error, #Pw-error{
            position: absolute;
            right: 5px;
            font-size: 22px;
            color: red;
        }
        .error #log-msg, #regS-msg, #regU-msg, #regP-msg{
            color: red;
            font-weight: 600;
            margin-top: -3px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="color"></div>
    <div class="main">
        <div class="content">
            <h3>Sampath Food City</h3>
            <H1 id="title">Data Management System</H1>
            <div class="container">
                <h2>Like a <span class="auto-type"></span></h2>
            </div>
            <div class="img">
                <img src="Pic/market.png" alt="Super Market">
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script>
            var typed = new Typed(".auto-type", {
                strings: ["Web Application ", "Database System ", "Maintenance System "],
                typeSpeed: 150,
                backSpeed: 150,
                loop: true
            })
        </script>

        <div class="form-box">
            <h6><span class="P">Sampath FC</span></h6>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" onclick="login()" class="toggle-btn" id="LI">LOG IN</button>
                <button type="button" onclick="register()" class="toggle-btn" id="RS">REGISTER</button>
            </div>

        <!--------------------Login Page-------------------->
            <form action="" method="POST" id="login" class="input-login">
                <div class="error">
                    <div class="special">
                        <input type="text" name="user" class="input-field" id="logid" placeholder="User ID" required autocomplete="off">
                        <i class='bx bx-error-circle bx-tada' id="log-error" style="display: none;"></i>
                    </div>
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span id="log-msg">'.$error.'</span>';
                            }
                        };
                    ?>
                </div>
                <input type="password" name="password" class="input-field" id="pass" placeholder="Enter Password" required>
                <label for="cb" id="lab"><i class="fa-solid fa-eye" id="eye1"></i></label>
                <input type="checkbox" onclick="myFunction1()" id="cb">
                <a href="Password Reset.php" id="fp">Forgot Password?</a><br>
                <button type="submit" name="SubLog" class="submit-btn" style="margin: 40px auto 0;">Log In<i class='bx bx-log-in'></i></button>
            </form>

        <!--------------------Register Page-------------------->
            <form action="" method="POST" id="register" class="input-register">
                
                <div class="error">
                    <div class="special">
                        <input type="text" name="user" class="input-field" id="Regid1" placeholder="Staff ID" required>
                        <i class='bx bx-error-circle bx-tada' id="SId-error" style="display: none;"></i>
                    </div>
                    <?php
                        if(isset($error3)){
                            foreach($error3 as $error3){
                                echo '<span id="regS-msg">'.$error3.'</span>';
                            };
                        };
                    ?>
                </div>
                <div class="error">
                    <div class="special">
                        <input type="text" name="uname" class="input-field" id="Regid2" placeholder="User Name" maxlength="15" required>
                        <i class='bx bx-error-circle bx-tada' id="Un-error" style="display: none;"></i>
                    </div>
                    <?php
                        if(isset($error2)){
                            foreach($error2 as $error2){
                                echo '<span class="error-msg">'.$error2.'</span>';
                            };
                        };
                    ?>
                </div>
                <input type="email" name="email" class="input-field" placeholder="Email ID" required>
                <input type="password" name="password" id="pass1" class="input-field" placeholder="Enter Password" required>
                <div class="error">
                    <div class="special">
                        <input type="password" name="cpassword" class="input-field" id="pass2" placeholder="Confirm Password" required>
                        <i class='bx bx-error-circle bx-tada' id="Pw-error" style="display: none;"></i>
                    </div>
                    <?php
                        if(isset($error1)){
                            foreach($error1 as $error1){
                                echo '<span class="error-msg">'.$error1.'</span>';
                            };
                        };
                    ?>
                    <!-- <span id="regP-msg">Password not matched!</span> -->
                </div>
                <button type="submit" name="SubReg" class="submit-btn" style="margin: 20px auto;">Register<i class='bx bx-user-plus'></i></button>
            </form>
        </div>
    </div>
    <script>
        function myFunction1(){
            var x = document.getElementById("pass");
            var y = document.getElementById("eye1");
            if (x.type === "password") {
                x.type = "text";
                y.style.color = "#16151f";
                y. style.textShadow = "0 0 25px #16151f";
            } else {
                x.type = "password";
                y.style.color = "rgb(104, 104, 104)";
                y. style.textShadow = "none";
            }
        }
    </script>
    <script>
        var a = document.getElementById('LI');
        var b = document.getElementById('RS');
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');
        function register()
        {
            z.style.left = '110px';
            a.style.color = '#16151f';
            b.style.color = 'white';
            x.style.display = 'none';
            y.style.display = 'block';
        }

        function login()
        {
            z.style.left = '0px';
            a.style.color = 'white';
            b.style.color = '#16151f';
            y.style.display = 'none';
            x.style.display = 'block';
        }
    </script>
    <script>
        var model = document.getElementById('login-form');
        window.onclick = function(event){
            if(event.target == model){
                model.style.display = "none";
            }
        }
    </script>
    <script>
        const log = document.getElementById('log-msg');
        const id = document.getElementById('logid');
        const icon1 = document.getElementById('log-error');

        if (log.innerHTML == "Incorrect UserID or Password!" || log.innerHTML == "You're Blocked!") {
            id.style.borderBottomColor = "red";
            icon1.style.display = "block";
        }        
    </script>
    <script>
        const reg1 = document.getElementById('regS-msg');
        const id1 = document.getElementById('Regid1');
        const icon2 = document.getElementById('SId-error');

        const reg2 = document.getElementById('regU-msg');
        const id2 = document.getElementById('Regid2');
        const icon3 = document.getElementById('Un-error');

        const reg3 = document.getElementById('regP-msg');
        const id3 = document.getElementById('pass2');
        const icon4 = document.getElementById('Pw-error');

        
        if (reg1.innerText == "StaffID not matched!") {
            id1.style.borderBottomColor = "red";
            icon2.style.display = "block";
        }
        if (reg2.innerText == "User name already exist!") {
            id2.style.borderBottomColor = "red";
            icon3.style.display = "block";
        }
        if (reg3.innerText == "Password not matched!") {
            id3.style.borderBottomColor = "red";
            icon4.style.display = "block";
        }
    </script>
</body>
</html>
