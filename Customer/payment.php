<?php
    $pay = $_GET['total'];
    $order = $_GET['order'];
    $uname = $_GET['uname'];
?>

<?php
    @include 'config.php';

    if(isset($_POST['paynow'])){
        $id = $_POST['id'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $telno = $_POST['telno'];
        
        $method = $_POST['method'];

        $update = "UPDATE customer SET Email = '$email', Address = '$address', ContactNo = '$telno' WHERE CustomerID = '$id'";
        mysqli_query($conn, $update);

        $insert = "INSERT INTO payment(PaymentID, Method, Total_Amount, OrderID) VALUES(CONCAT('PAY/', DATE_FORMAT(CURRENT_TIMESTAMP, '%Y%m%d'), '/', DATE_FORMAT(CURRENT_TIME, '%H%i'), '/', '$id'), '$method', '$pay', '$order')";
        mysqli_query($conn, $insert);
        header('location:shop.php');   
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="icon" type="image/x-icon" href="bxl-stripe.svg">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        body {
            font-family: 'poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
        }
        h1 {
            margin: 0;
        }

        form {
            display: flex;
            align-items:center;
            justify-content: center;
            width: 100%;
            margin-top: 1.5rem;
            gap: 2rem;
        }

        .billing-address, .payment-information {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30em;
            height: 24em;
            border: 2px solid #777;
            border-radius: 10px;
        }
        .payment-information .method{
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 1rem;
        }
        .method input[type='radio']{
            width: fit-content;
            margin-bottom: 7px;
        }
        .method label{
            padding: 0 1rem 0 .5rem;
        }

        .payment-information #cardPay{
            display: none;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 20rem;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .card-number-container {
            display: flex;
            gap: 10px;
        }

        .card-number-section {
            width: 2.2rem;
            padding: 3px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            font-family: monospace;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
        }

        .payment-information .card {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 3.2rem;
            margin: .5rem 0;
            margin-bottom: 1.5rem;
        }

        .expiry, .cvv {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .expiry label, .cvv label{
            margin-right: .2rem;
        }

        .expiry #ex{
            width: 1.35rem;
            text-align: center;
            margin: 0 2px;
        }

        .cvv #cvv{
            width: 1.5rem;
            text-align: center;
            margin: 0 2px;
        }

        #amount {
            color: #777;
        }

        button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            color: white;
            margin-top: .5rem;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer; 
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Payment Platform</h1>
        </header>

        <main>
            <form action="#" method="POST">

            <?php
                @include 'config.php';

                if($conn->connect_error){
                    die("Connection failed: ". $conn->connect_error);
                }
                if (isset($uname)) {
                    $sql = "SELECT * FROM customer c, customer_login cl WHERE c.CustomerID = cl.CusID AND cl.UserName = '$uname'";
                    $result = $conn->query($sql);
                    if($result-> num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                            $id = $row['CustomerID'];
                            $name = $row['CusName'];
                            $add = $row['Address'];
                            $em = $row['Email'];
                            $telno = $row['ContactNo'];
                        }
                    }
                }
                else{
                    $name = " ";
                    $add = " ";
                    $em = " ";
                    $telno = " ";
                }
            ?>

                <div class="billing-address">
                    <h2>Billing Information</h2>

                    <input type="number" id="name" name="id" value="<?php echo $id; ?>" style="display: none;">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $em; ?>" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $add; ?>" required>

                    <label for="telno">Contact No:</label>
                    <input type="text" id="telno" name="telno" value="<?php echo $telno; ?>" required>
                </div>

                <div class="payment-information">
                    <h2>Payment Information</h2>
                    <div class="method">
                        <input type="radio" name="method" id="cash" value="Cash" checked><label for="cash">Cash</label>
                        <input type="radio" name="method" id="card" value="Card"><label for="card">Card</label>
                    </div>
                    <div id="cardPay">
                        <label for="cardNumber">Credit Card Number:</label>
                        <div class="card-number-container">
                            <input type="text" class="card-number-section" maxlength="4" placeholder="5678">
                            <input type="text" class="card-number-section" maxlength="4" placeholder="9012">
                            <input type="text" class="card-number-section" maxlength="4" placeholder="3456">
                            <input type="text" class="card-number-section" maxlength="4" placeholder="1234">

                        </div>
                        <div class="card">
                            <span class="expiry">
                                <label for="expirationMonth">Expiry:</label>
                                <input type="text" id="ex" name="month" placeholder="MM" maxlength="2">
                                <input type="text" id="ex" name="year" placeholder="YY" maxlength="2">
                            </span>
        
                            <span class="cvv">
                                <label for="cvv">CVV:</label>
                                <input type="text" id="cvv" name="cvv" maxlength="3">
                            </span>
                        </div>
                    </div>

                    <label id="amount">Amount : Rs. <?php echo $pay;?>.00</label>

                    <button type="submit" name="paynow" onclick="window.alert('You paid successfully...')">Pay Now</button>
                </div>
            </form>
        </main>

        <footer>
            <p>© 2024 Sampath Food City (PVT) Ltd. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
<script>
    var cardPay = document.getElementById('cardPay');
    var card = document.getElementById('card');
    var cash = document.getElementById('cash');

    card.addEventListener("change", function(){
        cardPay.style.display = this.checked ? "block" : "none";
    });

    cash.addEventListener("change", function(){
        cardPay.style.display = this.checked ? "none" : "block";
    });
</script>

<script>
    const cardNumberSections = document.querySelectorAll('.card-number-section');

    cardNumberSections.forEach((section) => {
        section.addEventListener('keyup', (event) => {
            const value = event.target.value;

            if (value.length === 4) {
                const nextSection = section.nextElementSibling;
                if (nextSection) {
                    nextSection.focus();
                }
            }

            if (value.length > 0 && value.length % 4 === 0 && section !== cardNumberSections[cardNumberSections.length - 1]) {
                event.target.value += '-';
            }
        });
    });

</script>