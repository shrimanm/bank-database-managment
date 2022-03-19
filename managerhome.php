<?php
$valid = false;
if (isset($_POST['submit'])) {
  include("config.php");

  if (!$con) {
    die("connection failed!!!!" . mysqli_connect_error());
  }
  $no = $_GET["accno"];
  $accno = (int)$no;
  $sql = "SELECT * FROM bank.eaccount WHERE accno='" . $accno . "'";
  $result = mysqli_query($con, $sql);

  if ($row = mysqli_fetch_array($result)) {
    $valid = true;
  }
  $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="managerhome.css" />
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</head>

<body>
  <nav>
    <ul>
      <i class="fas fa-university"></i><br><br>
      <li class="home h6"><a href="managerhome.php">Home</a></li>
      <li class="h6"><a href="createEA.php">create Eaccount</a></li>
      <li class="h6"><a href="createCA.php">create Caccount</a></li>
      <li class="h6"><a href="removeE.php">remove Eaccount</a></li>
      <li class="h6"><a href="removeC.php">remove Caccount</a></li>
      <li class="h6"><a href="employeeD.php">employee details</a></li>
      <li class="h6"><a href="customerD.php">customer details</a></li>
      <li class="h6"><a href="addlogins.php">Addlogins</a></li>
      <li class="h6"><a href="transactions.php">Transaction</a></li>
      <li class="h6"><a href="index.html">logout</a></li>
    </ul>
  </nav>

  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-secondary">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">Welcome Manager</h1>
      <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apples marketing pages.</p>
      <form action="" method="post">
        <input type="submit" name="submit" value="show My account details" class="btn btn-outline-warning"><br><br>
        <button class="btn btn-outline-warning" onclick="show()"> hide details</button>
      </form>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
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

  <script>
    function show() {
      document.querySelector(".maintable").style.display = "none";
    }
  </script>
</body>

</html>