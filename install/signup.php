<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

<?php
    require_once "../app/config/config.php";
    $servername = DB_HOST;
    $db_name = DB_NAME;
    $username = DB_USER;
    $password = DB_PASSWORD;

    try{
        $connect = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(isset($_POST["signup"])){
            $companyname = $_POST["companyname"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $bank = $_POST["bank"];

            $target_dir = "../public/img/";
            $file_name = $_FILES["file"]["name"];
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["file"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO `company`(name, address, phone, email, bank, image_path)  VALUES ('$companyname', '$address', '$phone', '$email', '$bank', '$file_name')";
                    if ($connect->exec($sql)) {
                        echo "<div class='container'>";
                        echo "<div class='row mt-5 justify-content-md-center'>";
                        echo "<div class='col col-lg-6'>";
                        echo "<h1>Sign Up</h1>";
                        echo "<form action='check_user.php' method='POST'>";
                        echo "<div class='form-group'>";
                        echo "<label for='username'>Username</label>";
                        echo "<input type='text' name='username' class='form-control'>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='email'>Email</label>";
                        echo "<input type='email' name='email' class='form-control'>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='password'>Password</label>";
                        echo "<input type='password' name='password' class='form-control'>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='confirm'>Confirm Password</label>";
                        echo "<input type='password' name='confirm' class='form-control'>";
                        echo "</div>";
                        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "not moved";
                }
            }

        } else {
            echo "Not inserting";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>