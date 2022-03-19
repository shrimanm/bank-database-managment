<?php
$inserted = false;
if (isset($_POST['fname'])) {
    include("config.php");

    if (!$con) {
        die("connection failed!!!!" . mysqli_connect_error());
    }
    //dbms connected successfully

    //collect post variables
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $martial = $_POST['martial'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $nationality = $_POST['nationality'];
    $adharid = $_POST['adharid'];
    $panid = $_POST['panid'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $accno = rand(1111111111111, 9999999999999);
    $balance = 500;
    $photo = $_POST["photo"];

    $sql = "INSERT INTO `bank`.`caccount` (`photo`,`accno`,`fname`, `mname`, `lname`, `dob`, `age`, `gender`, `phoneno`, `email`, `martial`, `address`, `city`, `district`, `state`, `pincode`, `nationality`, `adharid`, `panid`, `fathername`, `mothername`, `date`,`balance`) VALUES ('$photo','$accno','$fname', '$mname', '$lname', '$dob', '$age', '$gender', '$phno', '$email', '$martial', '$address', '$city', '$district', '$state', '$pincode', '$nationality', '$adharid', '$panid', '$fathername', '$mothername', current_timestamp(),'$balance');";


    if ($con->query($sql) == true) {
        //inserted successfully
        $inserted = true;
    } else {
    }

    if ($inserted == false) {
        echo "<script>alert('account not created please try again');</script>";
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
    <link rel="stylesheet" href="createCA.css">
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
            <li class="home h6"><a href="EcreateCA.php">create Caccount</a></li>
            <li class="h6"><a href="EremoveC.php">remove Caccount</a></li>
            <li class="h6"><a href="EcustomerD.php">customer details</a></li>
            <li class="h6"><a href="Eaddlogins.php">Addlogins</a></li>
            <li class="h6"><a href="Etransactions.php">Transactions</a></li>
            <li class="h6"><a href="index.html">logout</a></li>
        </ul>
    </nav>
    <section class="h6">
        <h2>Create Account</h2>
        <?php
        if ($inserted == true) {
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$fname</strong> your account created successfullly!!! you Account number : $accno
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
        }
        ?>
        <form action="" method="post">
            <div class="1">
                <div class="a"><label for="Fname">First Name : </label><input type="text" name="fname" placeholder=" Enter First Name"></div>
                <div class="b"><label for="Mname">Middle name : </label><input type="text" name="mname" placeholder="Enter Middle Name"></div>
                <div class="c"><label for="">Last Name : </label><input type="text" name="lname" placeholder="Enter Last Name"></div>
            </div>
            <hr>
            <div class="2">
                <div class="a"><label for="DOB">Date Of Birth : </label><input type="text" name="dob" placeholder="dd/mm/yyyy"></div>
                <div class="b"><label for="age">Age : </label><input type="number" name="age" placeholder="Enter Age"></div>
                <div class="c"><label for="">Gender : </label><input type="text" name="gender" value="" placeholder="male/female/other" id="gender"></div>
            </div>
            <hr>
            <div class="3">
                <div class="a"><label for="number">Phone Number : </label><input type="number" name="phno" placeholder="Enter Phone Number"></div>
                <div class="b"><label for="email">Email : </label><input type="email" name="email" placeholder="Enter Your Email"></div>
                <div class="c"><label for="maritalstatus">Married? : </label><input type="text" name="martial" value="" id="martial" placeholder="Yes/No"></div>
            </div>
            <hr>
            <div class="4">
                <div class="a"><label for="address">Address : </label><input type="text" name="address" placeholder="Enter Address" id="address"></div>
                <div class="b"><label for="city">City : </label><input type="text" name="city" placeholder="Enter City"></div>
                <div class="c"><label for="district">District : </label><input type="text" placeholder="district" name="district"></div>
            </div>
            <hr>
            <div class="5">
                <div class="a"><label for="state">State : </label><input type="text" name="state" placeholder="Enter State"></div>
                <div class="b"><label for="pincode">PinCode : </label><input type="number" name="pincode" placeholder="Enter PinCode"></div>
                <div class="c"><label for="nationality">Nationality : </label><input type="text" placeholder="Nationality" name="nationality"></div>
            </div>
            <hr>
            <div class="6">
                <div class="a"><label for="adharid">Adhar Id : </label><input type="number" placeholder="Enter Adhar Number" name="adharid"></div>
                <div class="b"><label for="panid">Pan Id : </label><input type="text" placeholder="Enter Pan Number" name="panid"></div>
            </div>
            <hr>
            <div class="7">
                <div class="a"><label for="fathername">Father Name : </label><input type="text" name="fathername" placeholder="Enter Father Name"></div>
                <div class="b"><label for="mothername">Mother Name : </label><input type="text" name="mothername" placeholder="Enter Mother Name"></div>
            </div>
            <hr>
            <div class="8">
                <div class="a"><label for="photo">Upload Photo : <?php echo "<=1MB"; ?></label>
                    <input type="file" class="btn btn-secondary" placeholder="Upload Photo" name="photo">
                    <hr>
                    <div class="a"><input type="submit" value="Submit" name="submit" onclick="created()"></div>
                </div>



        </form>
    </section>

    <script>
        function created() {
            alert("account created successfully");
        }
    </script>
</body>

</html>