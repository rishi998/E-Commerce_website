<?php include('../connection.php');
if (!empty($_SESSION['log-in'])) {
  $username = $_SESSION['log-in'];
}
if (empty($_SESSION['log-in'])) {
  $_SESSION['failed'] = "<div style='color:#ed8585;'><span class='rr' style='width:fit-content;margin-left:10%;padding-top:5px;color:white,font-size:15px;font-weight:500;'>Login In First !</span><div>";
  header("location:login.php");
  die();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cara</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
  <style>
    .payment-form {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .payment-icons {
      text-align: center;
      margin-bottom: 20px;
    }

    .payment-icons i {
      font-size: 24px;
      margin: 10px;
    }

    .qr-code {
      width: 200px;
      height: 200px;
      margin: 0 auto 20px;
      background-color: #f2f2f2;
    }

    .transaction-label {
      display: block;
      text-align: center;
      margin-bottom: 10px;
    }

    .transaction-input {
      display: block;
      margin: 0 auto;
      width: 100%;
      padding: 5px;
    }

    .submit-button {
      display: block;
      margin: 10px auto 0;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }

    /* Pop-up styles */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      text-align: center;
      z-index: 9999;
    }

    .popup-content img {
      width: 200px;
      height: 200px;
      margin-bottom: 20px;
    }

    .popup-content p {
      margin: 0;
    }
  </style>
  <script>
    function showPopup() {
      document.getElementById("payment-form").innerHTML="";
      var transactionId = document.getElementById('transaction-id').value;
      var popup = document.getElementById('popup');
      var gifSource = '';

      if (transactionId.endsWith('@paytm') || transactionId.endsWith('@phonepay') || transactionId.endsWith('@googlepay')) {
        gifSource = 'payment_success.gif';
      } else {
        gifSource = 'payment_failure.gif';
      }

      var popupContent = document.getElementById('popup-content');
      popupContent.innerHTML = `
        <img src="${gifSource}" alt="Payment Status">
        <p>Thank you</p>
        <p>Your order will be placed in 2-3 working days after the payment verification process is completed.</p>
      `;

      popup.style.display = 'block';
    }
  </script>
</head>
<body>
  <?php 
  if(isset($_POST['pay'])){
    $amount=$_POST['transaction_id'];
    $sql=mysqli_query($conn,"INSERT INTO payment SET username='$username',transaction_id='$amount',status='Pending'");
    header("location:index.php");
  }
  ?>
  <form class="payment-form" action="/process_payment" method="POST" onsubmit="event.preventDefault(); showPopup()">
    <div class="payment-icons">
      <i class="fab fa-google-pay"></i>
      <i class="fab fa-phonepe"></i>
      <i class="fab fa-paytm"></i>
    </div>

    <div class="qr-code" ><img style="width: 100%;height:150px;" src="img/qr.png">

    <label class="transaction-label" for="transaction-id">Submit your transaction ID:</label>
    <input class="transaction-input" type="text" id="transaction-id" name="transaction_id" placeholder="Enter transaction ID">

    <button  name="pay"class="submit-button" type="submit">Submit</button>
    </div>
  </form>

  <!-- Pop-up -->
  <div id="popup" class="popup">
    <div id="popup-content" class="popup-content"></div>
  </div>
</body>
</html>
