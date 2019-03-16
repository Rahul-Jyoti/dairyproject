<?php
    require 'connect.inc.php';
    $host="localhost";
    $user="root";
    $pass="";
    $db="dairy";
    $Id="";
        
    $quantity="";
    $amount="";
    $output='';
    $name="";
    $contactno="";

    $conn=new mysqli($host,$user,$pass,$db);
        echo ''.mysqli_error($conn);
    if(isset($_GET['update']))
    {    
    if(isset($_GET['Id']) && isset($_GET['quantity']) && isset($_GET['amount']))
    {
        $quantity=$_GET['quantity'];
        $amount=$_GET['amount'];
        $Id=$_GET['Id'];
        $query=mysqli_query($conn,"update `data` set quantity=quantity+'$quantity',amount=amount+'$amount' where Id='$Id'");
        
        //$query2=mysqli_query($conn,"Insert into 'final' (`Id`,`name`,`contactno`,'quantity','amount') VALUES ('$Id','$name','$contactno','$quantity','$amount')");
        if($query){
            echo "Successfully Added";
            echo " ".$quantity;
            echo " ".$amount;
            echo " ".$Id;
        }
        else{
            echo "Not";
        }
        }
    }
    ?>
<form action="3pg.php" method="get">
Id:<input type="number" name="Id">
Amount:<input type="text" name="amount">
Quantity:<input type="text" name="quantity">
<br>
    <div>
        <input type="submit" name="update" value="Add">
</div>
</form>