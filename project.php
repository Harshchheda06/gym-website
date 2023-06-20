<?php

// echo $_POST['name'];

// $servername="localhost";
// $username="root";
// $password="";

// $conn=mysqli_connect($servername,$username,$password);

// if(!$conn)
// die("connection failed:".mysqli_connect_error());
// echo "successful<br>";

// $sql="CREATE DATABASE myprojj";
// if(mysqli_query($conn,$sql)){
//     echo 'databse created ';}
// else 
//     echo 'error';


// myqli_close($conn);

$func = $_POST['function'];

if ($func == 'signin') {

    signin();
} else {

    loginch();
}




function signin()
{

    $servername = "lsql12.freesqldatabase.com";
    $username = "sql12627472";
    $password = "DEfDdZD7rf";
    $database = "sql12627472";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful<br>";

    $fn = $_POST['fname'];
    $pass = $_POST['pass'];
    $ln = $_POST['lname'];
    $dob = $_POST['date'];
    $email = $_POST['email'];
    $ph = $_POST['ph'];
    // $gen=$_POST['gender'];
    $qual = $_POST['qual'];

    $sql = "INSERT INTO users (fname,lname,pass,dob,email,ph,gender,qual) values('$fn','$ln','$pass','$dob','$email','$ph','male','$qual')";


    if (mysqli_query($conn, $sql))
        echo "data inserted";
    else
        echo "" . mysqli_error($conn);
}

// $sql="CREATE TABLE users
// (fname varchar(5),lname varchar(10), pass varchar(20),dob date,email varchar(20),ph varchar(15),gender varchar(10),qual varchar(30))";

//    if(mysqli_query($conn,$sql))
//    echo "table created ";
//    else
//    echo 'error';

//    mysqli_close($conn);
// $sql="select * from users"


function loginch()
{
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12627472";
    $password = "DEfDdZD7rf";
    $database = "sql12627472";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn)
        die("connection failed:" . mysqli_connect_error());
    echo "successful<br>";

    $emailadd = $_POST['emailadd'];
    $p = $_POST['password'];

    $sqll = "SELECT pass FROM users WHERE email='$emailadd' ";
    if (mysqli_query($conn, $sqll))
        echo "data inserted";
    else
        echo "" . mysqli_error($conn);

    $result = mysqli_query($conn, $sqll);
    $row = mysqli_fetch_assoc($result);
    $storedpw = $row['pass'];
    // echo $storedpw;
    if ($p == $storedpw){
        header("Location: website - copy (1).html");
        exit(); 

    }
    else
        echo "password incorrect";

}
?>