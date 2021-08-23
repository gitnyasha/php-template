<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class="row mt-5 justify-content-md-center">
    <div class="col col-lg-6">
    <?php
    echo "<h1>Dublicate User</h1>";
    echo "<form id='add_user_form' action='check_user.php' method='POST'>";
    echo "<div class='form-group'>";
    echo "<label for='username'>Username</label>";
    echo "<input type='text' name='username' id='username' class='form-control'>";
    echo "</div>";
    echo "<div class='form-group'>";
    echo "<label for='password'>Password</label>";
    echo "<input type='password' name='password' class='form-control'>";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Submit</button>";
    echo "</form>"
    ?>
    </div>
  </div>
</div>
</body>
</html>