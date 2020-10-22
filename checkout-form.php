<?php
include('header.html');
echo "<h1>Checkout page</h1>";
?>
<html>
    <head>
    <link href="sticky-footer-navbar.css" rel="stylesheet">
    </head>
<body id ="checkout">
<form action="checkout.php" method="POST">
	<p><lable>Firstname:</lable> <input type="text" name="firstname"></p>
	<p><lable>Lastname:</lable> <input type="text" name="lastname"></p>
    <p>Please select your Payment method:</p>
      <input type="radio"  name="payment" value="Debit">
      <label for="debit">Debit Card</label><br>
      <input type="radio" name="payment" value="Credit">
      <label for="credit">Credit Card</label><br>
    <p><lable>Card Holder Name:</lable> <input type="text" name="cardholdername"></p>
    <p><lable>Card Number:</lable> <input type="number" name="cardnumber"></p>
    <p><lable>Expiry Date</lable> <input type="date" name="expirydate"></p>
    <p><lable>CVV Code: </lable> <input type="password" name="cvvcode" minlength="3" maxlength="3"></p>
	<input type="submit" id ="btn1" value="Submit ">
</form>
</body>
</html>
<?php
include('footer.html');
?>