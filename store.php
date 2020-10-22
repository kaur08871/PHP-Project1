<?php
include('header.html');

require('mysqli_connect.php');

$query = "select * from bookinventory";

$result = @mysqli_query($dbc,$query);

 echo "<h1><strong>Books<strong></h1>";


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    echo "
    <div style ='padding:20px;'>
  <label>Name: " . $row['book_name'] ." </label><br>  
   <label>Writer: " . $row['writer_name'] ." </label><br>  
<label>Price: " . $row['price'] ." </label> <br>
<form action='store.php' method='POST'>

<input type='number' name='quantity'>
<input type='hidden' name='bookid' value='".$row['bookid']."'>
<input type='submit'>
</form><br></div>";
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
	if (!empty($_POST['bookid'])){ 
		$id = $_POST['bookid'];
        $quantity = $_POST['quantity'];
        
        session_start();
             $_SESSION['bookID'] = $id;
         $_SESSION['quantity'] = $quantity;
        header('location:checkout-form.php');
        
		
	}
}
	
?>
<html>
    <head>
    <link href="sticky-footer-navbar.css" rel="stylesheet"></head>
<body>
    </body>
</html>
<?php
include('footer.html');
?>
