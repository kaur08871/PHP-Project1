<?php
include('header.html');
session_start();


if($_SERVER['REQUEST_METHOD']=='POST') {
    
    require('mysqli_connect.php');
    
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $payment = $_POST['payment'];
        $cardholdername = $_POST['cardholdername'];
        $cardnumber = $_POST['cardnumber'];
        $expirydate = $_POST['expirydate'];
        $cvvcode = $_POST['cvvcode'];
    
    
     $book_id= $_SESSION['bookID'];
     $quantity= $_SESSION['quantity'];

    
        if((empty($firstname))){
             echo "<p>Enter your firstname</p> ";
        }
        else{
             $firstname = mysqli_real_escape_string($dbc,$_POST['firstname']);
        }
        if((empty($lastname))){
                 echo "<p>Enter your lastname</p> ";
            }
            else{
                 $lastname = mysqli_real_escape_string($dbc,$_POST['lastname']);
            }
        if((!isset($payment))){
                 echo "<p>Enter your payment mode </p>";
            }
            else{
                 $payment = mysqli_real_escape_string($dbc,$_POST['payment']);
            }
            if((empty($cardholdername))){
                         echo "<p>Enter  cardholdername </p>";
                    }
                    else{
                         $cardholdername = mysqli_real_escape_string($dbc,$_POST['cardholdername']);
                    }
            if((empty($cardnumber))){
                         echo "<p>Enter  cardnumber </p>";
                    }
                    else{
                         $cardnumber = mysqli_real_escape_string($dbc,$_POST['cardnumber']);
                    }
             if((empty($expirydate))){
                         echo "<p>Enter  expirydate </p>";
                    }
                    else{
                         $expirydate = mysqli_real_escape_string($dbc,$_POST['expirydate']);
                    }
            if((empty($cvvcode))){
                             echo " <p>Enter  cvvcode </p>";
                        }
                        else{
                             $cvvcode = mysqli_real_escape_string($dbc,$_POST['cvvcode']);
                        }
    // customer details
     $q1 = "INSERT INTO customer (firstname,lastname) VALUES ('$firstname','$lastname')";
    
            $result = @mysqli_query($dbc,$q1);   
            $custid = mysqli_insert_id($dbc);
    
    //order details
    $q3 = "INSERT INTO orders (bookid, quantity, customer_id) 
		   VALUES ('$book_id','$quantity','$custid')";
    
		  $result3 = @mysqli_query($dbc,$q3);
          $orderid = mysqli_insert_id($dbc);
    
    //update inventory
    $q4 = "update bookinventory set quantity= ((select quantity from bookinventory where bookid= ".$book_id.") - ".$quantity.")
            where bookid = ".$book_id.";";
   
    $result4 = @mysqli_query($dbc,$q4);
    
    //payment
    $q2 = "INSERT INTO payment (cardholdername,cardnumber,expirydate,cvv,order_id) VALUES ('$cardholdername','$cardnumber','$expirydate','$cvvcode', '$orderid')";
    
    $result1 = @mysqli_query($dbc,$q2);
    
     
       
    
    
            if($result){
                echo "<p><strong>Thank you $firstname </strong></p>";
            }
            else{
                echo "<p><strong>Error at data insertion</strong></p>";
            }

            if($result1){
                echo "<p><strong>Order Placed!! Your payment is successful!!</strong></p> ";
            }
            else{
                echo "<p><strong>Error in payment</strong></p>";
            }

       
}
?>