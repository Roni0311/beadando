<?php

    $db_password = 'Vuh.hVeN7AFi!.ci';

    $db_name = 'oltopont';

    if ( isset($_POST['name']) && isset($_POST['birthday']) && isset($_POST['taj']) && isset($_POST['pnumber']) && 
         isset($_POST['postcode']) && isset($_POST['cityname']) && isset($_POST['streetname']) && isset($_POST['housenumber']) &&
         isset($_POST['phone']) && isset($_POST['email']) ) {
        $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_password);

        $sql = "INSERT INTO data (Name, Birthdate , TAJ, PersonalID, Postalcode, City, Street, House, Phone, Email) 
            VALUES 
            ('{$_POST['name']}', '{$_POST['birthday']}', '{$_POST['taj']}', '{$_POST['pnumber']}', '{$_POST['postcode']}', '{$_POST['cityname']}',
            '{$_POST['streetname']}', '{$_POST['housenumber']}', '{$_POST['phone']}', '{$_POST['email']}')
        ";

        $dbh->query($sql); 
    }
?>

<!DOCTYPE HTML>   
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php include_once('navigation.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<?php
$nameErr = $emailErr = $birthdayErr = $postcodeErr = $citynameErr = $streetnameErr = $housenumberErr = $phoneErr = $tajErr = 
$pnumberErr = "";
$name = $email = $birthday = $postcode = $cityname = $streetname = $housenumber = $phone = $taj = $pnumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Név szükséges";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["birthday"])) {
    $birthdayErr = "Születési dátum szükséges";
  } else {
    $birthday = test_input($_POST["birthday"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email szükséges";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["postcode"])) {
    $postcodeErr = "Irányítószám szükséges";
  } else {
    $postcode = test_input($_POST["postcode"]);
  }
  
  if (empty($_POST["cityname"])) {
    $citynameErr = "Település szükséges";
  } else {
    $cityname = test_input($_POST["cityname"]);
  }
  
  if (empty($_POST["streetname"])) {
    $streetnameErr = "Utca név szükséges";
  } else {
    $streetname = test_input($_POST["streetname"]);
  }
  
  if (empty($_POST["housenumber"])) {
    $housenumberErr = "Házszám szükséges";
  } else {
    $housenumber = test_input($_POST["housenumber"]);
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Telefon szükséges";
  } else {
    $phone = test_input($_POST["housenumber"]);
  }
  
  if (empty($_POST["taj"])) {
    $tajErr = "TAJ szám szükséges";
  } else {
    $taj = test_input($_POST["taj"]);
  }
  if (empty($_POST["pnumber"])) {
    $pnumberErr = "Személyi szám szükséges";
  } else {
    $pnumber = test_input($_POST["pnumber"]);
  }
}

function test_input($data) {
  $data = trim($data); // levágja a felesleges space-t, új sort, tab-ot
  $data = stripslashes($data);  // levágja a backslasht
  $data = htmlspecialchars($data); // át alakítja a speciális karaktereket
  return $data;
}
?>

<h1>Jelentkezési lap</h1>
<p><span class="error">* kötelező mező</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2>Személyes adatok</h2>  
  Név: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Születési idő: <input type="date" name="birthday" value="<?php echo $birthday;?>">
  <span class="error">* <?php echo $birthdayErr;?></span>
  <br><br>
  TAJ szám: <input type="number" name="taj" value="<?php echo $taj;?>">
  <span class="error">* <?php echo $tajErr;?></span>
  <br><br>
  Személyi igazolvány szám: <input type="text" name="pnumber" value="<?php echo $pnumber;?>">
  <span class="error">* <?php echo $pnumberErr;?></span>
  <br><br>
  <h2>Lakcím adatok</h2>
  Irányítószám:
  <input type="number" name="postcode" value="<?php echo $postcode?>">
  <span class="error">* <?php echo $postcodeErr; ?></span>
  <br><br>
  Település:
  <input type="text" name="cityname" value="<?php echo $cityname?>">
  <span class="error">* <?php echo $citynameErr; ?></span>
  <br><br>
  Utca:
  <input type="text" name="streetname" value="<?php echo $streetname?>">
  <span class="error">* <?php echo $streetnameErr; ?></span>
  <br><br>
  Házszám:
  <input type="number" name="housenumber" value="<?php echo $housenumber?>">
  <span class="error">* <?php echo $housenumberErr; ?></span>
  <br><br>
  <h2>Elérhetőségek</h2>
  Telefon:
  <input type="tel" name="phone" value="<?php echo $phone?>">
  <span class="error">* <?php echo $phoneErr; ?></span>
  <br><br>  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <input type="submit" value="Küldés">
  
</form>

<?php
echo "<h2>Bevitt adatok:</h2>";
echo $name;
echo "<br>";
echo $birthday;
echo "<br>";
echo $taj;
echo "<br>";
echo $pnumber;
echo "<br>";
echo $postcode;
echo "<br>";
echo $cityname;
echo "<br>";
echo $streetname;
echo "<br>";
echo $housenumber;
echo "<br>";
echo $phone;
echo "<br>";
echo $email;
echo "<br>";
?>

</body>
</html>