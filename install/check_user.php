<?php
  require_once "../app/config/config.php";
  $servername = DB_HOST;
  $db_name = DB_NAME;
  $username = DB_USER;
  $password = DB_PASSWORD;
  if(!empty($_POST["username"]) && !empty($_POST["password"]))
  {
    $conn = new mysqli($servername, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed". $conn->connect_error);
    }

    $user = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];
    $confirm = $_POST["confirm"];

    $statement = "SELECT * FROM users WHERE username=?";
    $state = $conn->prepare($statement);
    $state->bind_param("s", $user);
    $state->execute();

    $state->store_result();
    
    if ($state->num_rows >= 1) {
        header("Location: dublicate_user.php");
    } 
    else {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      $confirm = password_hash($confirm, PASSWORD_DEFAULT);
      $statement = "INSERT INTO users (username, email, password, confirm_password) VALUES('$user', '$email', '$pass', '$confirm')";
      $state = $conn->prepare($statement);
      $state->execute();
      session_start();
      $_SESSION["username"] = $_POST["username"];
      $path = PATH;
      header("Location: finish.php");
      $conn->close();
    }
  }
?>