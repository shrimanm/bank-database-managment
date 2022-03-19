<?php
$valid = false;
$edit = false;
$updated = false;
if (isset($_POST['details'])) {
    include("config.php");

    if (!$con) {
        die("connection failed!!!!" . mysqli_connect_error());
    }
    $accno = $_POST["accno"];

    $sql = "SELECT * FROM bank.caccount WHERE accno='" . $accno . "' ";

    $result = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_array($result)) {
        $valid = true;
    }
    if ($valid == false) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        enter correct account number
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    $con->close();
}

if (isset($_POST['editdetails'])) {
    include("config.php");

    if (!$con) {
        die("connection failed!!!!" . mysqli_connect_error());
    }
    $accno = $_POST["accno"];

    $sql = "SELECT * FROM bank.caccount WHERE accno='" . $accno . "' ";

    $result = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_array($result)) {
        $edit = true;
    } else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
         enter correct account number!!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}

if (isset($_POST['edited'])) {
    include("config.php");

    if (!$con) {
        die("connection failed!!!!" . mysqli_connect_error());
    }
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $martial = $_POST['martial'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $nationality = $_POST['nationality'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $accno = $_POST['accno'];
    $adharid = $_POST['adharid'];
    $panid = $_POST['panid'];

    $sql = "UPDATE `bank`.`caccount` SET `fname`='$fname', `mname`='$mname', `lname`='$lname', `dob`='$dob', `age`='$age', `gender`='$gender', `phoneno`='$phoneno', `email`='$email', `martial`='$martial', `address`='$address', `city`='$city', `district`='$district', `state`='$state', `pincode`='$pincode', `nationality`='$nationality', `fathername`='$fathername', `mothername`='$mothername' WHERE `bank`.`caccount`.`accno`='$accno';";

    if ($con->query($sql) == true) {
        //inserted successfully
        $updated = true;
    } else {
    }
    if ($updated == false) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
         your account Not updated
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

    <style>
        form table td {
            text-align: center;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <i class="fas fa-university"></i><br><br>
            <li class="h6"><a href="managerhome.php">Home</a></li>
            <li class="h6"><a href="createEA.php">create Eaccount</a></li>
            <li class="h6"><a href="createCA.php">create Caccount</a></li>
            <li class="h6"><a href="removeE.php">remove Eaccount</a></li>
            <li class="h6"><a href="removeC.php">remove Caccount</a></li>
            <li class="h6"><a href="employeeD.php">employee details</a></li>
            <li class="h6 home"><a href="customerD.php">customer details</a></li>
            <li class="h6"><a href="addlogins.php">Addlogins</a></li>
            <li class="h6"><a href="transactions.php">Transaction</a></li>
            <li class="h6"><a href="index.html">logout</a></li>
        </ul>
    </nav>
    <?php
    if ($updated == true) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
         your account updated successfullly!!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-secondary">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <form action="" method="post">
                <button class="btn btn-warning btn-lg p-2 m-2" onclick="">Enter Customer Account Number</button><input class="btn btn-light btn-lg p-1 m-3" type="number" name="accno" placeholder=" Enter Acc no."><br>
                <input type="submit" class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" value="Get Details" name="details">
                <input type="submit" class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" value="Edit Details" name="editdetails">
            </form>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
    </div>


    <?php
    if ($valid == true) {
    ?>
        <div class="detail">
            <table class="table p-0">
                <thead>

                    <tr>
                        <th class="table-success h4 text-center p-3" scope="col">Photo</th>
                        <th class="table-success h4 text-center p-3" scope="col">Adhar Number</th>
                        <th class="table-success h4 text-center p-3" scope="col">Pan Number</th>
                        <th class="table-success h4 text-center p-3" scope="col">Account Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo '<img src="data:image;base64,' . base64_encode($row['photo']) . '" class="rounded mx-auto d-block" alt="photo" style="width: 150px; height: 150px; "> ' ?>
                        </td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['adharid']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['panid']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['balance'];
                                                                    ?></td>
                    </tr>
                </tbody>

            </table>

            <table class="table p-0">
                <thead>
                    <tr>
                        <th class="table-success h4 text-center p-3" scope="col">account no.</th>
                        <th class="table-success h4 text-center p-3" scope="col">First name</th>
                        <th class="table-success h4 text-center p-3" scope="col">middle name</th>
                        <th class="table-success h4 text-center p-3" scope="col">last name</th>
                        <th class="table-success h4 text-center p-3" scope="col">date of birth</th>
                        <th class="table-success h4 text-center p-3" scope="col">age</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-info h5 text-center p-3"><?php echo $row['accno']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['fname']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['mname']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['lname']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['dob']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['age']; ?></td>
                    </tr>

                    <thead>
                        <tr>
                            <th class="table-success h4 text-center p-3" scope="col">gender</th>
                            <th class="table-success h4 text-center p-3" scope="col">phone no.</th>
                            <th class="table-success h4 text-center p-3" scope="col">email</th>
                            <th class="table-success h4 text-center p-3" scope="col">martial</th>
                            <th class="table-success h4 text-center p-3" scope="col">father name</th>
                            <th class="table-success h4 text-center p-3" scope="col">mother name</th>

                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td class="table-info h5 text-center p-3"><?php echo $row['gender']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['phoneno']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['email']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['martial']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['fathername']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['mothername']; ?></td>
                    </tr>


                    <thead>
                        <tr>
                            <th class="table-success h4 text-center p-3" scope="col">address</th>
                            <th class="table-success h4 text-center p-3" scope="col">city</th>
                            <th class="table-success h4 text-center p-3" scope="col">district</th>
                            <th class="table-success h4 text-center p-3" scope="col">state</th>
                            <th class="table-success h4 text-center p-3" scope="col">pincode</th>
                            <th class="table-success h4 text-center p-3" scope="col">nationality</th>

                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td class="table-info h5 text-center p-3"><?php echo $row['address']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['city']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['district']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['state']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['pincode']; ?></td>
                        <td class="table-info h5 text-center p-3"><?php echo $row['nationality']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>


    <!--===============================================-->

    <?php
    if ($edit == true) {
    ?>
        <form action="" method="post">
            <table class="table p-0">
                <thead>
                    <tr>
                        <th class="table-success h4 text-center p-3" scope="col">Photo</th>
                        <th class="table-success h4 text-center p-3" scope="col">Adhar Number</th>
                        <th class="table-success h4 text-center p-3" scope="col">Pan Number</th>
                        <th class="table-success h4 text-center p-3" scope="col">Account Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo '<img src="data:image;base64,' . base64_encode($row['photo']) . '" class="rounded mx-auto d-block" alt="photo" style="width: 150px; height: 150px; "> ' ?>

                        </td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="number" name="adharid" value="<?php echo $row['adharid']; ?>" readonly></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="panid" value="<?php echo $row['panid']; ?>" readonly></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="number" name="balance" value="<?php echo $row['balance']; ?>" readonly></td>
                    </tr>
                </tbody>
            </table>

            <table class="table p-0">
                <thead>
                    <tr>
                        <th class="table-success h4 text-center p-3" scope="col">account no.</th>
                        <th class="table-success h4 text-center p-3" scope="col">First name</th>
                        <th class="table-success h4 text-center p-3" scope="col">middle name</th>
                        <th class="table-success h4 text-center p-3" scope="col">last name</th>
                        <th class="table-success h4 text-center p-3" scope="col">date of birth</th>
                        <th class="table-success h4 text-center p-3" scope="col">age</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="number" name="accno" value="<?php echo $row['accno']; ?>" readonly></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="fname" value="<?php echo $row['fname']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="mname" value="<?php echo $row['mname']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="lname" value="<?php echo $row['lname']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="dob" value="<?php echo $row['dob']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="number" name="age" value="<?php echo $row['age']; ?>"></td>


                    </tr>

                    <thead>
                        <tr>
                            <th class="table-success h4 text-center p-3" scope="col">gender</th>
                            <th class="table-success h4 text-center p-3" scope="col">phone no.</th>
                            <th class="table-success h4 text-center p-3" scope="col">email</th>
                            <th class="table-success h4 text-center p-3" scope="col">martial</th>
                            <th class="table-success h4 text-center p-3" scope="col">father name</th>
                            <th class="table-success h4 text-center p-3" scope="col">mother name</th>

                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="gender" value="<?php echo $row['gender']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="number" name="phoneno" value="<?php echo $row['phoneno']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="martial" value="<?php echo $row['martial']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="fathername" value="<?php echo $row['fathername']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="mothername" value="<?php echo $row['mothername']; ?>"></td>

                    </tr>


                    <thead>
                        <tr>
                            <th class="table-success h4 text-center p-3" scope="col">address</th>
                            <th class="table-success h4 text-center p-3" scope="col">city</th>
                            <th class="table-success h4 text-center p-3" scope="col">district</th>
                            <th class="table-success h4 text-center p-3" scope="col">state</th>
                            <th class="table-success h4 text-center p-3" scope="col">pincode</th>
                            <th class="table-success h4 text-center p-3" scope="col">nationality</th>

                        </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="address" value="<?php echo $row['address']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="city" value="<?php echo $row['city']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="district" value="<?php echo $row['district']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="state" value="<?php echo $row['state']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="number" name="pincode" value="<?php echo $row['pincode']; ?>"></td>
                        <td><input class="btn btn-light btn-lg p-1 m-3" type="text" name="nationality" value="<?php echo $row['nationality']; ?>"></td>

                    </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-secondary btn-lg btn-outline-warning pt-3 pb-3 ps-5 pe-5 m-3" value="Update" name="edited">
        </form>
    <?php
    }
    ?>

</html>