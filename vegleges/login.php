<?php

require_once('config.inc.php');

session_start();

if (isset($_POST['email']) && isset($_POST['taj'])) {
    $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_password);
    $sql = "SELECT * FROM data WHERE email = ? AND taj = SHA1(?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([$_POST['email'], $_POST['taj']]);
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) === 1) {
        $_SESSION['authenticated'] = true;
        // Redirect to your secure location
        header('Location: users.php');
        return;
    } else {
        $error = 'Incorrect username or password';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php include_once('navigation.php') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./assets/img/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <?php if ( isset($error) ) { ?>  
                <div class="alert alert-danger">
                    E-mail or TAJ is wrong!
                </div>
            <?php } ?>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input 
                name="email"
                type="Text" 
                id="form3Example3" 
                class="form-control form-control-lg"
                placeholder="Enter Email">
            <label class="form-label" for="form3Example3">Email</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input 
                name="taj"
                type="number" 
                id="form3Example4" 
                class="form-control form-control-lg"
                placeholder="Enter Taj">
            <label class="form-label" for="form3Example4">TAJ</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Ha még nem jelentkezett, erre a gombra kattintva megteheti. <a href="data.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="fixed-bottom d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2023. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>
</body>
</html>