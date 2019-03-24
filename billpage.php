<?php
    require 'connect.inc.php';
    $host="localhost";
    $user="root";
    $pass="";
    $db="dairy";
    
    $Id="";
    $name="";
    $contactno="";
    $amount="";
    $quantity="";
    $output='';
    
    $conn=new mysqli($mysql_host,$mysql_user,$mysql_pass,$db);
    
    if(isset($_GET['submit']))
    {    
    if(isset($_GET['Id']))
    {
        $Id=$_GET['Id'];
        $query=mysqli_query($conn,"Select * from data where Id='$Id'");
        echo ''.mysqli_error($conn);
        $count=mysqli_num_rows($query);
        if($count==0){
            echo 'Record not found';
        }
        else{
            while($row=mysqli_fetch_array($query)){
                $output="found";
                $name=$row['name'];
                $contactno=$row['contactno'];
                $quantity=$row['quantity'];
                $amount=$row['amount'];
                echo "Name ".$name;
                echo "Contact No ".$contactno;
                echo "Quantity ".$quantity;
                echo "Total Amount ".$amount;
                
            }
        }/*
        */
    }
    }
?>
<form method="get">
Id:<input type="number" name="Id" value"<?php echo $Id;?>">
    <div>
        <input type="submit" name="submit" value="submit">
    </div>
</form>

    