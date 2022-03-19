<?php
$valid = false;
include("config.php");
if (!$con) {
    die("connection failed!!!!" . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM bank.user WHERE username='" . $username . "' AND password='" . $password . "'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "employee") {
        $valid = true;
        $accno = $row["accno"];
        header("location:employeehome.php?accno= $accno");
    }
    if ($valid == false) {
        echo "<script>alert('incorrect username or password');</script>";
    }
}
$con->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>employee Login</title>
    <link rel="stylesheet" type="text/css" href="managerlogin.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

</head>

<body>
    <div class="loginbox">
        <h1>Employee Login</h1>
        <form action="" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter password" required>
            <input type="submit" name="submit" value="Login" id="submit" style="padding: 10px; font-weight:bold;background: linear-gradient(45deg,rgb(233, 233, 11)0%,rgb(218, 114, 17) 100%);   border-radius: 20px; cursor:pointer; ">

            <a href="index.html"><i class="fas fa-arrow-alt-circle-left"></i> back to login</a>
        </form>

    </div>
</body>

</html>