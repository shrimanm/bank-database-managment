<?php
$usert = false;
$validaccount = false;
$alreadyexists = false;
$inserted = false;
if (isset($_POST['username'])) {
    include("config.php");

    if (!$con) {
        die("connection failed!!!!" . mysqli_connect_error());
    }
    //dbms connected successfully

    //collect post variables
    $accno = $_POST['accno'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    if ($usertype == "customer") {
        $usert = true;
        // $sql = "INSERT INTO bank.user (accno,username, password, usertype) VALUES ($accno',$username', '$password', '$usertype');";
        $sql = "SELECT * FROM bank.caccount WHERE accno='" . $accno . "' ";
        $result = mysqli_query($con, $sql);

        if ($row = mysqli_fetch_array($result)) {
            $validaccount = true;
            $sql2 = "SELECT * FROM bank.user WHERE accno='" . $accno . "' ";
            $result2 = mysqli_query($con, $sql2);
            if ($row2 = mysqli_fetch_array($result2)) {
                $alreadyexists = true;
            } else {
                $sql1 = "INSERT INTO `bank`.`user` (`accno`,`username`, `password`, `usertype`) VALUES ('$accno','$username', '$password', '$usertype');";
                $result1 = mysqli_query($con, $sql1);
                $inserted = true;
            }
        }
    }
    if ($usert == false) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Invalid user type....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if ($validaccount == false) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Invalid account number....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if ($alreadyexists == true) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        User already exists....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else if ($inserted == false) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        something went wrong...try again....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    //close database
    $con->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</head>

<body>

    <nav>
        <ul>
            <i class="fas fa-university"></i><br><br>
            <li class="h6"><a href="employeehome.php">Home</a></li>
            <li class="h6"><a href="EcreateCA.php">create Caccount</a></li>
            <li class="h6"><a href="EremoveC.php">remove Caccount</a></li>
            <li class="h6"><a href="EcustomerD.php">customer details</a></li>
            <li class="home h6"><a href="Eaddlogins.php">Addlogins</a></li>
            <li class="h6"><a href="Etransactions.php">Transactions</a></li>
            <li class="h6"><a href="index.php">logout</a></li>
        </ul>
    </nav>
    <?php
    if ($inserted == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        $accno added successfully!!!!!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }

    ?>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-secondary">
        <h3>Create Employee/Customer Login Details</h3>
        <div class="col-md-17 p-lg-5 mx-auto my-5">
            <form action="" method="post">
                <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Account number</button><input class="btn btn-light btn-lg p-1 m-3" type="text" name="accno" placeholder=" Enter Acc no."><br>
                <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Username</button><input class="btn btn-light btn-lg p-1 m-3" type="text" name="username" placeholder="Enter username"><br>
                <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Password</button><input class="btn btn-light btn-lg p-1 m-3" type="password" name="password" placeholder="Enter password"><br>
                <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Usertype</button><input class="btn btn-light btn-lg p-1 m-3" type="text" name="usertype" placeholder="Enter  usertype"><br>
                <input type="submit" class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" value="submit" name="submit">
            </form>

            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>


</body>

</html>