<?php
$usert = false;
$validaccount = false;
$inserted = false;

if (isset($_POST["transfer"])) {
    include("config.php");

    if (!$con) {
        die("connection failed!!!!" . mysqli_connect_error());
    }

    $fromusertype = "customer";
    $tousertype = $_POST["tousertype"];
    $no = $_GET["accno"];
    $fromaccno = (int)$no;
    $toaccno = $_POST["toaccno"];
    $amount = $_POST["amount"];

    if ($fromusertype == "customer") {
        // $sql = "INSERT INTO bank.user (accno,username, password, usertype) VALUES ($accno',$username', '$password', '$usertype');";
        $sql = "SELECT * FROM bank.caccount WHERE accno='" . $fromaccno . "' ";
        $result = mysqli_query($con, $sql);

        if ($row = mysqli_fetch_array($result)) {
            if ($tousertype == "employee" || $tousertype == "manager") {
                $usert = true;
                // $sql = "INSERT INTO bank.user (accno,username, password, usertype) VALUES ($accno',$username', '$password', '$usertype');";
                $sql = "SELECT * FROM bank.eaccount WHERE accno='" . $toaccno . "' ";
                $result = mysqli_query($con, $sql);

                if ($row = mysqli_fetch_array($result)) {
                    $validaccount = true;
                    $sql1 = "UPDATE `bank`.`caccount` SET `balance` = `balance`-'$amount' WHERE `bank`.`caccount`.`accno` = '$fromaccno';";
                    $sql2 = "UPDATE `bank`.`eaccount` SET `balance` = `balance`+'$amount' WHERE `bank`.`eaccount`.`accno` = '$toaccno';";
                    if ($con->query($sql1) == true && $con->query($sql2) == true) {
                        //inserted successfully
                        $inserted = true;
                    }
                }
            } else if ($tousertype == "customer") {
                $usert = true;
                // $sql = "INSERT INTO bank.user (accno,username, password, usertype) VALUES ($accno',$username', '$password', '$usertype');";
                $sql = "SELECT * FROM bank.caccount WHERE accno='" . $toaccno . "' ";
                $result = mysqli_query($con, $sql);

                if ($row = mysqli_fetch_array($result)) {
                    $validaccount = true;
                    $sql1 = "UPDATE `bank`.`caccount` SET `balance` = `balance`-'$amount' WHERE `bank`.`caccount`.`accno` = '$fromaccno';";
                    $sql2 = "UPDATE `bank`.`caccount` SET `balance` = `balance`+'$amount' WHERE `bank`.`caccount`.`accno` = '$toaccno';";
                    if ($con->query($sql1) == true && $con->query($sql2) == true) {
                        //inserted successfully
                        $inserted = true;
                    }
                }
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
    } else if ($inserted == false) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    something went wrong...try again....
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    }
}

//close database




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css" />
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav>
        <ul>
            <i class="fas fa-university"></i><br><br>
            <li class="h6"><a href="customerhome.php">Home</a></li>
            <li class="home h6 "><a href="Ctransactions.php">Transfer</a></li>
            <li class="h6"><a href="index.html">logout</a></li>
        </ul>
    </nav>
    <?php
    if ($inserted == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    sussessfull!!!!!!!!
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
    } ?>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-secondary ">
        <button type="button" class="btn btn-warning btn-lg pt-3 pb-3 ps-5 pe-5 m-5 ">Transactions</button>
        <div class="col-md-8 p-lg-5 mx-auto my-5">
            <button class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" onclick="opentransfer()">Transfer</button>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>

    <div class="transfer d-none">
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-secondary">
            <div class="col-md-8 p-lg-5 mx-auto my-5">
                <form action="" method="post">
                    <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Select To Usertype</button>
                    <select class="btn btn-light btn-m ps-5 pe-5 m-2" name="tousertype" id="usertype">
                        <option value="manager">Manager</option>
                        <option value="employee">Employee</option>
                        <option value="customer">Customer</option>
                    </select><br>
                    <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter To Account Number</button>
                    <input type="number" name="toaccno" class="btn btn-light btn-m ps-5 pe-5 m-2" placeholder="enter account number"><br>
                    <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Amount</button>
                    <input type="number" name="amount" class="btn btn-light btn-m ps-4 pe-4 m-2" placeholder="enter amount"><br>
                    <input type="submit" class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" value="Transfer" name="transfer">
                </form>
                <div class="product-device shadow-sm d-none d-md-block"></div>
                <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
            </div>
        </div>
    </div>



    <script>
        function opentransfer() {
            document.querySelector(".transfer").classList.toggle("d-none");

        }
    </script>
</body>

</html>