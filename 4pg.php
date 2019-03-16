 <?php
 include ('connect.php');
 $sqlget="select * from data";
 $sqldata=mysqli_query($conn,$sqlget) or die('error etting');
 echo '<table style="border-collapse:collapse;padding:50%;width: 100%;text-align: center;">';
 echo '<tr><th style="background-color: black;color: white;font-size: 25px;  text-align: center;padding: 8px;border-bottom: 1px solid #ddd;
">Id</th><th style="background-color: black;color: white;font-size: 25px;text-align: center;padding: 8px;border-bottom: 1px solid #ddd;">Name</th><th style="background-color: black;color: white;font-size: 25px;  text-align: center;padding: 8px;border-bottom: 1px solid #ddd;">ContactNumber</th></tr>';
  
while($row=mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
     echo '<tr style="background-color: #ffdb4d;"><td style="font-size:20px;">';
     echo $row['Id'];
     echo '</td><td style="font-size:20px;">';
     echo $row['name'];
     echo '</td><td style="font-size:20px;">';
     echo $row['contactno'];
     echo '</td></tr>';
 }
echo "</table>";
 
 ?>

/*

$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"registration");
    if(!$conn)
    {
        echo "error";
    }
 $sqlget="select * from trial order by Col2 desc ";*/