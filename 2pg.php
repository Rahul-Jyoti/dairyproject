<?php
    require 'connect.inc.php';
    $host="localhost";
    $user="root";
    $pass="";
    $db="dairy";
    $Id="";
        
    $name="";
    $contactno="";
    $output='';
    $conn=new mysqli($mysql_host,$mysql_user,$mysql_pass,$db);
    if(isset($_GET['search'])){
    if(isset($_GET['name']) && isset($_GET['contactno']))
    {
        $searchq=$_GET['name'];
        $query=mysqli_query($conn,"Select * from data where name='$searchq'");
        echo ''.mysqli_error($conn);
        $count=mysqli_num_rows($query);
            if($count==0){
                $output='THere was no search result'; 
            }
            else{
                while($row=mysqli_fetch_array($query)){
                    $name=$row['name'];
                    $contactno=$row['contactno'];
                    $Id=$row['Id'];
                    $output="Found";
                }
            }
    }
    }

    if(isset($_GET['update'])){
        
    if(isset($_GET['name']) && isset($_GET['contactno']) && isset($_GET['Id']))
    {
        $name=$_GET['name'];
        $contactno=$_GET['contactno'];
        $Id=$_GET['Id'];
        $sql="update `data` set Id='$Id',name='$name',contactno='$contactno' where Id='$Id'";
        $query=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($query);
        echo " ".$count;
            if($count==0){
                $output='THere was no such data '; 
            }
            else{
                while($row=mysqli_fetch_array($query)){
                    $name=$row['name'];
                    $contactno=$row['contactno'];
                    $output="Edited";
                }
            }
    }   
    }
    if(isset($_GET['insert']))
    {    
    if(isset($_GET['name']) && isset($_GET['contactno']))
    {
        $name=$_GET['name'];
        $contactno=$_GET['contactno'];
        $Id=$_GET['Id'];
        $query=mysqli_query($conn,"INSERT INTO `data`(`Id`,`name`,`contactno`) VALUES ('$Id','$name','$contactno')");
        echo ''.mysqli_error($conn);
        echo " ".$name;
        echo " ".$contactno;
        echo " ".$Id;
    }
    }
    //name='$name' AND contactno='$contactno' AND
    if(isset($_GET['delete']))
    {    
    if(isset($_GET['name']) && isset($_GET['contactno']))
    {
        $name=$_GET['name'];
        $contactno=$_GET['contactno'];
        $Id=$_GET['Id'];
        $query=mysqli_query($conn,"DELETE from `data` where id='$Id'");
        echo " ".$name;
        echo " ".$contactno;
    }
    }
    
    
    echo $output;
?>
<form action="2pg.php" method="get">
Id:<input type="number" name="Id" value"<?php echo $Id;?>">
Name:<input type="text" name="name" value"<?php echo $name;?>">
Contact Number:<input type="text" name="contactno" value="<?php echo $contactno;?>">
    <div>
        <input type="submit" name="insert" value="Create new user">
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">
        <input type="submit" name="search" value="Search">
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Contact No</th>
        </tr>
    </table>
</form>

