<?php
session_start();
include "db_conn.php";

if(isset($_post['uname']) && isset($_post['password'])) {
    
    function validate($date) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return data;   
    }
}

$uname = validate($_post['uname']);
$pass = validate($_post['password']);

if(empty($uname)) {
    header ("location: index.php?erro=user name is required");
    exit();
}
else if(empty($pass)) {
    header("location: index.php?error=password is required");
    exit();
}

$sql = "SELECT * FROM  users where user_name='$uname' AND password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $rows = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && row['password'] === $pass) {
        echo "Logged In!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("location: home.php");
        exit();
    }
    else{
        header("Lcation: index.php?error=Incorrect user Name or password");
        exit();
    }
}
else{
    header("Location: index.php");
    exit();
}
