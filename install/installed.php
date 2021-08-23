<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<?php
    require_once "../app/config/config.php";
    $servername = DB_HOST;
    $db_name = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    try {
        $connect = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

    if(isset($_POST['next'])){
        $query = file_get_contents("invoice.sql");

        $stmt = $connect->prepare($query);

        if ($stmt->execute()){
            echo "<div class='container'>";
            echo "<div class='row mt-5 justify-content-md-center'>";
            echo "<div class='col col-lg-6'>";
            echo "<h1>Sign Up</h1>";
            echo "<form action='signup.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='form-group'>";
            echo "<label for='companyname'>Company Name</label>";
            echo "<input type='text' name='companyname' id='companyname' required='required' class='form-control'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='address'>Address</label>";
            echo "<input type='text' name='address' required='required' class='form-control'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='email'>Email</label>";
            echo "<input type='email' name='email' required='required' class='form-control'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='phone'>Phone</label>";
            echo "<input type='text' name='phone' required='required' class='form-control'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='bank'>Bank Details</label>";
            echo "<textarea name='bank' class='form-control' id='bank' rows='3'></textarea>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label>Upload here</label>";
            echo "<input name='file' type='file' required='required' class='form-control'/>";
            echo "</div>";
            echo "<input type='submit' name='signup' class='btn btn-primary' value='Submit'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }else{ 
            echo "<h2 align=center >Failed</h2>";
        }
    }else{
        echo"<h2 align=center >Error</h2>";
    }
?>