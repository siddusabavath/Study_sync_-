<?php
include 'database.php';
if(isset($_POST['sub']))
{
    $name=$_POST['uname'];
    $pass=$_POST['pass'];
    $sql="insert into login(name,password) values('$name','$pass')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>alert('$name is inserted sucessfully')</script>";
    }
    else
    echo "Error:".mysqli_error($con);
    mysqli_close($con);
}
?>