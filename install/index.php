<link rel='stylesheet' href='style.css' />

<?php  // create form
    $servername = "<input class='input' type='text' name='dbhost' placeholder='Enter Host Name' />";
    $username = "<input class='input' type='text' name='dbuser' placeholder='Enter DB User Name' />";
    $password = "<input class='input' type='password' name='dbpass' placeholder='***********' />";
    $db_name = "<input class='input' type='text' name='dbname' placeholder='Enter DB Name' />";
    $sitename = "<input class='input' type='text' name='sitename' placeholder='Company Name' />";
    $domain = "<input class='input' type='text' name='domain' placeholder='https://domainname.co.zw/admin' />";
    echo "<div class='box' >
            <form class='ins' method='post' action='installing.php' >
                    <p>Enter Host Name:<p>
                    $servername
                    <p>Enter DB User Name:<p>
                    $username
                    <p>Enter DB PassWord:<p>
                    $password
                    <p>Enter DB Name:<p>
                    $db_name
                    <p>Enter Company Name:<p>
                    $sitename
                    <p>Enter url to where your billing system files will be:<p>
                    $domain
                    <input class='submit' type='submit' name='install' value='next' />
            </form>
        </div>";
        
?>