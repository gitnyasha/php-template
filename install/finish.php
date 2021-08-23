<?php
    require_once "../app/config/config.php";

    $writer = '
    <IfModule mod_rewrite.c> '.'
    RewriteEngine on '.'
    RewriteRule ^$ public/ [L] '.'
    RewriteRule (.*) public/$1 [L] '.'
    </IfModule>
    ';

    $write = fopen('../.htaccess' , 'w');
    $path = PATH;

    if(isset($_POST['finish']))
    {
        if (fwrite($write, $writer)) {
            fclose($write);
            header("location: $path");
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finish Setup</title>
    <link rel='stylesheet' href='style.css' />
</head>
<body>
<div class="se-pre-con"></div>
    <div class='box'>
        <form class='ins' method='post'>
            <h2 align=center color=red>Finish setup and delete the install folder<h2>
            <input class='submit' type='submit' value='FINISH' name='finish'/>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
</body>
</html>