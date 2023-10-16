<!doctype html>
<?php
session_start();
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Site</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  
</head>
<body class="font-weight-bolder">
  
  <main style="margin: auto; text-align: center;">

<?php
  if(!isset($_SESSION["id"])) {
?>
      <div class="container my-4">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg bg-light">
          <div class="col-lg-12 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-5 fw-bold lh-1">Nejsi přihlášen!</h1>
            <br>
            <p class="lead">Pro zobrazení veškerého kontextu se musíš nejprve přihlásit!</p>
            <p class="lead">Pokud ještě u nás nemáš účet tak se musíš zaregistrovat ;)</p>
            <br>
            <br>
            <div class="d-grid gap-2 d-md-flex justify-content-center mb-4 mb-lg-3">
              <a href="login.php" type="button" class="btn btn-primary btn-lg px-3 me-md-2 fw-bold">Přihlásit se</a>
              <a href="register.php" type="button" class="btn btn-secondary btn-lg px-3 me-md-2 fw-bold">Zaregistrovat se</a>
            </div>
          </div>
        </div>
      </div>

    </main>
<?php

  include_once 'footer.php';

  } else {

?>

    <div class="container my-4">
      <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg bg-light">
        <div class="col-lg-12 p-3 p-lg-5 pt-lg-3">
          <h1 class="display-5 fw-bold lh-1">Úspěšně jste se přihlásili!!</h1>
        </div>
      </div>
    </div>

  </main>

<br>
<br>


<?php
  }
    include_once 'footer.php';
  ?>
</body>
</html>