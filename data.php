<?php

    $db_password = 'Yfisu87l8RuxPno6';

    $db_name = 'oltopont';

    if ( isset($_POST['name']) && isset($_POST['birthday']) && isset($_POST['taj']) && isset($_POST['pnumber']) && 
         isset($_POST['postcode']) && isset($_POST['cityname']) && isset($_POST['streetname']) && isset($_POST['housenumber']) &&
         isset($_POST['phone']) && isset($_POST['email']) ) {
        $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_password);

        $sql = "INSERT INTO users (Név, Születésnap , TAJ, Személyi, Irányítószám, Település, Utca, Házszám, Telefon, E-mail) 
            VALUES 
            ('{$_POST['name']}', '{$_POST['birthday']}', '{$_POST['taj']}, '{$_POST['pnumber']}, '{$_POST['postcode']}, '{$_POST['cityname']},
            '{$_POST['streetname']}, '{$_POST['housenumber']}, '{$_POST['phone']}, '{$_POST['email']}')
        ";

        $dbh->query($sql); 
    }
?>

<!DOCTYPE HTML>   
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.error {color: red;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $birthdayErr = $postcodeErr = $citynameErr = $streetnameErr = $housenumberErr = $phoneErr = $tajErr = $pnumberErr = "";
$name = $email = $birthday = $postcode = $cityname = $streetname = $housenumber = $phone = $taj = $pnumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["birthday"])) {
    $birthdayErr = "Birthday is required";
  } else {
    $birthday = test_input($_POST["birthday"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["postcode"])) {
    $postcodeErr = "Postcode is required";
  } else {
    $postcode = test_input($_POST["postcode"]);
  }
  
  if (empty($_POST["cityname"])) {
    $citynameErr = "City name is required";
  } else {
    $cityname = test_input($_POST["cityname"]);
  }
  
  if (empty($_POST["streetname"])) {
    $streetnameErr = "Üres mező";
  } else {
    $streetname = test_input($_POST["streetname"]);
  }
  
  if (empty($_POST["housenumber"])) {
    $housenumberErr = "Üres mező";
  } else {
    $housenumber = test_input($_POST["housenumber"]);
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Üres mező";
  } else {
    $phone = test_input($_POST["housenumber"]);
  }
  
  if (empty($_POST["taj"])) {
    $tajErr = "Üres mező";
  } else {
    $taj = test_input($_POST["taj"]);
  }
  if (empty($_POST["pnumber"])) {
    $pnumberErr = "Üres mező";
  } else {
    $pnumber = test_input($_POST["pnumber"]);
  }
}

function test_input($data) {
  $data = trim($data); // levágja a felesleges space-t, új sort, tab-ot
  $data = stripslashes($data);  // levágja a backslasht
  $data = htmlspecialchars($data); // át alakítja a speciális karaktereket, hogy a html is olvasni tudja
  return $data;
}
?>

<h1>Jelentkezési lap</h1>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2>Személyes adatok</h2>  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Birthday: <input type="date" name="birthday" value="<?php echo $birthday;?>">
  <span class="error">* <?php echo $birthdayErr;?></span>
  <br><br>
  TAJ szám: <input type="number" name="taj" value="<?php echo $taj;?>">
  <span class="error">* <?php echo $tajErr;?></span>
  <br><br>
  Személyi igazolvány szám: <input type="text" name="pnumber" value="<?php echo $pnumber;?>">
  <span class="error">* <?php echo $pnumberErr;?></span>
  <br><br>
  <h2>Lakcím adatok</h2>
  Postalcode:
  <input type="number" name="postcode" value="<?php echo $postcode?>">
  <span class="error">* <?php echo $postcodeErr; ?></span>
  <br><br>
  City name:
  <input type="text" name="cityname" value="<?php echo $cityname?>">
  <span class="error">* <?php echo $citynameErr; ?></span>
  <br><br>
  Street name:
  <input type="text" name="streetname" value="<?php echo $streetname?>">
  <span class="error">* <?php echo $streetnameErr; ?></span>
  <br><br>
  House number:
  <input type="number" name="housenumber" value="<?php echo $housenumber?>">
  <span class="error">* <?php echo $housenumberErr; ?></span>
  <br><br>
  <h2>Elérhetőségek</h2>
  Phonenumber:
  <input type="tel" name="phone" value="<?php echo $phone?>">
  <span class="error">* <?php echo $phoneErr; ?></span>
  <br><br>  
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <button class="btn btn-primary mt-3">
                Save
            </button>
   
</form>
<?php       
      $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_password);
      $result = $dbh->query("SELECT * FROM data");
      $users = $result->fetchAll(PDO::FETCH_ASSOC);
?>

</body>
</html>