<link rel='stylesheet' href='style.css' />
<?php  
    $writer = "<?php".'
    '.'define("DB_HOST", "'.$_POST['dbhost'].'")'.';
    '.'define("DB_USER", "'.$_POST['dbuser'].'")'.';
    '.'define("DB_PASSWORD", "'.$_POST['dbpass'].'")'.';
    '.'define("DB_NAME", "'.$_POST['dbname'].'")'.';
    '.'define("ROOT", dirname(dirname(__FILE__)))'.';
    '.'define("MYROOT", dirname(dirname(dirname(__FILE__))))'.';
    '.'define("PATH", "'.$_POST['domain'].'")'.';
    '.'define("SITE", "'.$_POST['sitename'].'")'.';
    '."?>";

    $write = fopen('../app/config/config.php' , 'w');
    if(empty($_POST['dbhost']&&
             $_POST['dbname']&&
             $_POST['dbuser']&&
             $_POST['sitename']&&
             $_POST['domain']&&
             $_POST['dbpass'])){
            echo"<h2 align=center >All Fields are required! Please Re-enter</h2>";

    }else{
        if(isset($_POST['install']))
        {
            fwrite($write, $writer);
            fclose($write);
            echo "<div class='box'>
                    <form class='ins' action='installed.php' method='post'>
                        <h2 align=center color=red>Database Info Succecfully Entered<h2>
                        <input class='submit' type='submit' value='NEXT' name='next'/>
                    </form>
                 </div>";
        }
        else{ 
            echo "<h2 align=center >Error<h2>"; 
        }
    }
?>