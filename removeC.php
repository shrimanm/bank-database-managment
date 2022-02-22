<?php
$deleted = false;
include("config.php");
if (!$con) {
    die("connection failed!!!!" . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accno = $_POST["accno"];
    $sql = "SELECT * FROM bank.caccount WHERE accno='" . $accno . "' ";
    $result = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_array($result)) {
        $sql1 = "DELETE FROM bank.caccount WHERE accno = $accno";
        $result1 = mysqli_query($con, $sql1);
        $deleted = true;
    } else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Enter correct account number!!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}
$con->close();

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
            <li class="h6"><a href="managerhome.php">Home</a></li>
            <li class="h6"><a href="createEA.php">create Eaccount</a></li>
            <li class="h6"><a href="createCA.php">create Caccount</a></li>
            <li class="h6"><a href="removeE.php">remove Eaccount</a></li>
            <li class="home h6"><a href="removeC.php">remove Caccount</a></li>
            <li class="h6"><a href="employeeD.php">employee details</a></li>
            <li class="h6"><a href="customerD.php">customer details</a></li>
            <li class="h6"><a href="addlogins.php">Addlogins</a></li>
            <li class="h6"><a href="transactions.php">Transaction</a></li>
            <li class="h6"><a href="index.php">logout</a></li>
        </ul>
    </nav>
    <?php
    if ($deleted == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Account deleted successfullly!!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-secondary">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <form action="" method="post">
                <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Customer Account Number</button><input class="btn btn-light btn-lg p-1 m-3" type="number" name="accno" placeholder=" Enter Acc no."><br>
                <input type="submit" class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" value="Remove Account" name="submit">
            </form>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>
</body>

</html>