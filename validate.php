<?php
session_start();

$con = mysqli_connect('localhost', 'root');
if ($con) {
    echo "connection successful";
} else {
    echo "no connection";
}

$db = mysqli_select_db($con, 'bytewave');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = " select * from  users where email='$email' and password='$password' ";
    $query = mysqli_query($con, $sql);

    $row = mysqli_num_rows($query);
    if ($row == 1) {
        while ($enreg = mysqli_fetch_array($query)) {
            
        }

        header('location:./admin/dashboard.php');
        $_SESSION['user'] = $email;
     
    } else {
        
      
        header('location:./login.php?error=1');
    }

}

?>  