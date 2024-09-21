<?php
$servername="localhost";
$username="root";
$password="";
$database="student";
$con=mysqli_connect($servername,$username,$password,$database);
if(!$con)
{
    die("error detected".mysqli_error($con));
}
if(isset($_POST['sub']))
{
    $name=$_POST['uname'];
    $pass=$_POST['pass'];
    $query= mysqli_query($con, "select *from login where name='$name'");
    $no= mysqli_num_rows($query);
    if($no>0)
    {
        $data= mysqli_fetch_assoc($query);
        if($data['password']==$pass)
        {
            echo "Login sucessfully";
            header("Location: study_sync.html");
        }
        else
        {
            echo '<h1 style="color: red;">Invalid password<h1>';
        }
    }
    else
    {
        echo '<h1 style="color:red;">Invalid username<h1>';
    }
}
?>

<html>
    <head>
        <title>login into Study Sync</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <center>
            <form method="POST" class='form' action="login.php">
                <h1>LOGIN</h1>
                <input type="text" name="uname" class="box" placeholder="Enter Username">
                <input type="password" name="pass" class="box" placeholder="Enter Password">
                <div class="button-container">
                    <input type="submit" name="sub" value="Login" class="sub">
                    <input type="reset" name="reset" value="Reset" class="res">
                </div>
            </form>
        </center>
    </body>
</html>