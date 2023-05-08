<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nameErr = $emailErr = $genderErr = $birthdayErr = "";
$name = $email = $gender = $birthday = "";

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
    
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data); // levágja a felesleges space-t, új sort, tab-ot
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Jelentkezési lap</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Birthday: <input type="date" name="birthday" value="<?php echo $birthday;?>">
  <span class="error">* <?php echo $birthdayErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>   
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <button class="btn btn-primary mt-3">
                Save
            </button>
   
</form>


</body>
</html>